<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/visi.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <h1>SMK NEGERI 4 BOGOR</h1>
    </section>

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="visi">
                    <div class="card-body">
                        <h2 class="text-center">Visi</h2>
                        <p class="text-center">Terwujudnya SMK Pusat Keunggulan melalui terciptanya pelajar Pancasila yang berbasis teknologi, berwawasan lingkungan, dan berkewirausahaan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="misi">
                    <div class="card-body">
                        <h2 class="text-center">Misi</h2>
                        <ul>
                            <li>Mewujudkan karakter pelajar Pancasila beriman dan bertaqwa kepada Tuhan Yang Maha Esa serta berakhlak mulia, berkebhinekaan global, gotong royong, mandiri, kreatif, dan bernalar kritis.</li>
                            <li>Mengembangkan pembelajaran dan pengelolaan sekolah berbasis Teknologi Informasi dan Komunikasi.</li>
                            <li>Mengembangkan sekolah yang berwawasan Adiwiyata Mandiri.</li>
                            <li>Mengembangkan usaha dalam berbagai bidang secara optimal sehingga memiliki kemandirian dan daya saing tinggi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/profile/visi.blade.php ENDPATH**/ ?>