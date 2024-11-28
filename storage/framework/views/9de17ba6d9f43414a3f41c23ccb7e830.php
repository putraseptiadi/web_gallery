<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bepropus/program_guest.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- JS Links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</head>

<body>

    <!-- Header -->
    <header>
        <?php echo $__env->make('navbar.header_index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <!-- Visi dan Misi Section -->
    <section class="text-center mb-4 section-title">
        <h1>Selamat Datang di Bursa Kerja</h1>
    </section>
    <h1 class="lowongan-judul">Temukan Lowongan Pekerjaan Terbaik untukmu!</h1>

    <!-- Job Filter Section -->
    <section class="job-filter">
        <div class="search-filter">
            <input type="text" placeholder="Cari pekerjaan..." id="searchInput" class="search-bar">
            <select id="locationFilter" class="filter-select">
                <option value="">Filter Berdasarkan Lokasi</option>
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($job->location); ?>"><?php echo e($job->location); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </section>

    <!-- Job List Section -->
    <section class="job-list">
        <h2>Daftar Lowongan</h2>
        <div class="job-cards" id="jobCards">
            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="job-card">
                <div class="card-header">
                    <h3 class="job-title"><?php echo e($job->title); ?></h3>
                    <p class="company-name"><?php echo e($job->company); ?></p>
                </div>
                <div class="card-body">
                    <p class="job-description"><?php echo e(\Illuminate\Support\Str::limit($job->description, 120)); ?></p>
                    <p class="job-location"><strong>Lokasi:</strong> <?php echo e($job->location); ?></p>
                    <p class="job-deadline"><strong>Deadline:</strong> <?php echo e(\Carbon\Carbon::parse($job->deadline)->format('d F Y')); ?></p>
                </div>
                <div class="card-footer">
                    <button class="apply-btn" data-id="<?php echo e($job->id); ?>" onclick="showModal(this)">View</button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <!-- Modal -->
    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Informasi untuk Pelamar</h2>
            <p id="modalDescription">Halo pelamar, berikut adalah informasi penting terkait lowongan:</p>
            <ul>
                <li id="modalDetails"></li>
            </ul>
            <p>Silakan melengkapi dokumen yang diperlukan dan ikuti proses selanjutnya.</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Data Lowongan
        const jobsData = <?php echo json_encode($jobs, 15, 512) ?>;

        // Show Modal with Specific Data
        function showModal(button) {
            const jobId = button.getAttribute("data-id");
            const job = jobsData.find(item => item.id == jobId);

            if (job) {
                document.getElementById("modalDescription").innerText = `Informasi tentang ${job.title} di ${job.company}:`;
                document.getElementById("modalDetails").innerText = job.description;
                document.getElementById("infoModal").style.display = "block";
            }
        }

        // Close Modal
        function closeModal() {
            document.getElementById("infoModal").style.display = "none";
        }

        // Close Modal When Clicking Outside
        window.onclick = function(event) {
            let modal = document.getElementById("infoModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        // Filter by Location
        document.getElementById("locationFilter").addEventListener("change", function() {
            let selectedLocation = this.value.toLowerCase();
            let jobCards = document.querySelectorAll(".job-card");

            jobCards.forEach(function(card) {
                let location = card.querySelector(".job-location").textContent.toLowerCase();
                card.style.display = selectedLocation === "" || location.includes(selectedLocation) ? "block" : "none";
            });
        });

        // Search by Job Title
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let searchValue = this.value.toLowerCase();
            let jobCards = document.querySelectorAll(".job-card");

            jobCards.forEach(function(card) {
                let title = card.querySelector(".job-title").textContent.toLowerCase();
                card.style.display = title.includes(searchValue) ? "block" : "none";
            });
        });
    </script>


    <!-- Footer Section -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/berita_program_perpus/program.blade.php ENDPATH**/ ?>