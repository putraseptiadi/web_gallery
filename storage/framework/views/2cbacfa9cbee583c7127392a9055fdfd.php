<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/informasi_home/osis.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
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

    <section class="program-info-section container my-5">
        <div class="row">
            <!-- Logo Sekolah -->
            <div class="col-md-4 text-center d-flex flex-column align-items-center program-logo">
                <img src="<?php echo e(asset('path/logo/osis.png')); ?>" alt="Logo OSIS SMK NEGERI 4 BOGOR" class="img-fluid logo-img mb-4" style="max-width: 100%; height: auto;">
            </div>

            <!-- Deskripsi Jurusan dan Ketua Program Keahlian -->
            <div class="col-md-8 program-description">
                <h2 class="program-title">Organisasi Siswa Intra Sekolah</h2>
                <p class="program-text">OSIS (Organisasi Siswa Intra Sekolah) adalah organisasi resmi di lingkungan sekolah yang menjadi wadah bagi siswa untuk mengembangkan bakat, minat, dan keterampilan mereka.
                    OSIS bertujuan untuk membangun jiwa kepemimpinan, tanggung jawab, dan kerjasama melalui berbagai program kegiatan yang bermanfaat bagi siswa dan sekolah. Sebagai perwakilan siswa,
                    OSIS juga berperan aktif dalam menjembatani komunikasi antara siswa, guru, dan pihak sekolah. </p>
                <hr class="program-divider my-4">
                <div class="row align-items-center program-leaders">
                    <?php $__currentLoopData = $ketuaOsis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ketua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 text-center leader-photo">
                        <div class="img-container">
                            <img src="<?php echo e(asset('storage/' . $ketua->foto)); ?>" alt="Foto Ketua OSIS" class="img-fluid ketua-img">
                        </div>
                    </div>
                    <div class="col-md-9 leader-info">
                        <h3 class="leader-title">Ketua OSIS SMKN 4 BOGOR</h3>
                        <p class="leader-details">
                            <strong>Nama:</strong> <?php echo e($ketua->nama); ?><br>
                            <strong>Periode:</strong> <?php echo e($ketua->periode); ?><br>
                            <strong>Deskripsi:</strong> <?php echo e($ketua->deskripsi); ?>

                        </p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>



    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/informasi/osis.blade.php ENDPATH**/ ?>