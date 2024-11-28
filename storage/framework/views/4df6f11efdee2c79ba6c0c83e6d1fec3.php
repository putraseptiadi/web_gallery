<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/jurusan/tkro.css')); ?>">
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
                <img src="<?php echo e(asset('path/images/TO.png')); ?>" alt="Logo SMK NEGERI 4 BOGOR" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
            </div>

            <!-- Deskripsi Jurusan dan Ketua Program Keahlian -->
            <div class="col-md-8">
                <!-- Deskripsi Jurusan -->
                <h2>Teknik Kendaraan Ringan & Otomotif</h2>
                <p>Kompetensi keahlian Teknik Kendaraan Ringan & Otomotif di SMK Negeri 4 Bogor meliputi pembelajaran tentang mesin otomotif, kelistrikan kendaraan, dan sistem transmisi. Kompetensi ini bertujuan agar siswa memiliki keterampilan dalam perawatan, perbaikan, dan pengembangan teknologi kendaraan bermotor.</p>
                <p>Siswa diharapkan mampu mendiagnosis dan memperbaiki kerusakan kendaraan dengan teknologi terkini, serta memahami prinsip-prinsip mekanika kendaraan bermotor yang dapat diterapkan di dunia industri.</p>

                <hr class="my-4">

                <!-- Ketua Program Keahlian -->
                <div class="row align-items-center">
                    <?php $__currentLoopData = $KetuaTkro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $KetuaTkro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 text-center">
                        <img src="<?php echo e(asset('storage/' . ($KetuaTkro->foto ?? 'path/images/pp_kosong.jpg'))); ?>"
                            alt="Ketua Program" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-md-9">
                        <h3>Ketua Program Keahlian</h3>
                        <p><strong>Nama:</strong> <?php echo e($KetuaTkro->nama); ?><br>
                            <strong>Bidang Keahlian:</strong> <?php echo e($KetuaTkro->bidang_keahlian); ?>

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
                    <?php $__currentLoopData = $PrestasiTkro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($prestasi->judul); ?> (<?php echo e($prestasi->tahun); ?>)
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h3><i class="bi bi-building"></i> Profesi / Bidang Kerja</h3>
                <ul>
                    <?php $__currentLoopData = $ProfesiTkro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $profesi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/jurusan/tkro.blade.php ENDPATH**/ ?>