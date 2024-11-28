<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/jurusan/tjkt.css')); ?>">
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

    <section class="program-info container my-5">
        <div class="row">
            <!-- Logo Sekolah -->
            <div class="col-md-4 text-center d-flex flex-column align-items-center">
                <img src="<?php echo e(asset('path/images/TJKT.png')); ?>" alt="Logo SMK NEGERI 4 BOGOR" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
            </div>

            <!-- Deskripsi Jurusan dan Ketua Program Keahlian -->
            <div class="col-md-8">
                <!-- Deskripsi Jurusan -->
                <h2>Teknik Jaringan Komputer & Telekomunikasi</h2>
                <p>Kompetensi keahlian Teknik Jaringan Komputer dan Telekomunikasi di SMK Negeri 4 Bogor meliputi pembelajaran jaringan komputer, administrasi server, pemrograman jaringan, dan instalasi perangkat telekomunikasi. Kompetensi ini bertujuan agar siswa memiliki keterampilan dalam merancang, membangun, dan mengelola jaringan komputer serta memahami teknologi telekomunikasi modern.</p>
                <p>Siswa diharapkan mampu mengelola infrastruktur jaringan, menangani troubleshooting, dan mengembangkan solusi berbasis teknologi informasi untuk kebutuhan industri maupun wirausaha.</p>

                <hr class="my-4">

                <!-- Ketua Program Keahlian -->
                <div class="row align-items-center">
                    <?php $__currentLoopData = $KetuaTjkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $KetuaTjkt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 text-center">
                        <img src="<?php echo e(asset('storage/' . ($KetuaTjkt->foto ?? 'path/images/pp_kosong.jpg'))); ?>"
                            alt="Ketua Program" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-md-9">
                        <h3>Ketua Program Keahlian</h3>
                        <p><strong>Nama:</strong> <?php echo e($KetuaTjkt->nama); ?><br>
                            <strong>Bidang Keahlian:</strong> <?php echo e($KetuaTjkt->bidang_keahlian); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <section class="program-info container my-5">
        <div class="row">
            <div class="col-md-6">
                <h3><i class="bi bi-trophy"></i> Prestasi</h3>
                <ul>
                    <?php $__currentLoopData = $PrestasiTjkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($prestasi->judul); ?> (<?php echo e($prestasi->tahun); ?>)
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h3><i class="bi bi-building"></i> Profesi / Bidang Kerja</h3>
                <ul>
                    <?php $__currentLoopData = $ProfesiTjkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $profesi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($profesi->judul); ?>

                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </section>


    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/jurusan/tjkt.blade.php ENDPATH**/ ?>