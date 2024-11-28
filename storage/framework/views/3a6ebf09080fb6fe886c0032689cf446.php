<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/informasi_home/eskul_guest.css')); ?>">
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


    <h1 class="eskul-title">Informasi Ekstrakurikuler</h1>

    <div class="ekskul-container mt-8 px-4">
        <?php if($eskuls->isEmpty()): ?>
        <p class="ekskul-no-info text-center">Belum ada informasi ekstrakurikuler yang tersedia.</p>
        <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $eskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="ekskul-card">
                    <!-- Logo -->
                    <?php if($eskul->logo): ?>
                    <div class="ekskul-logo-container">
                        <img src="<?php echo e(asset('storage/' . $eskul->logo)); ?>"
                            alt="<?php echo e($eskul->name); ?>"
                            class="ekskul-img">
                    </div>
                    <?php else: ?>
                    <div class="ekskul-no-logo">
                        <span class="ekskul-no-logo-text">Tidak ada logo</span>
                    </div>
                    <?php endif; ?>

                    <div class="ekskul-card-body">
                        <!-- Nama Ekskul -->
                        <h5 class="ekskul-title text-center"><?php echo e($eskul->name); ?></h5>

                        <!-- Deskripsi -->
                        <p class="ekskul-description">
                            <?php echo e(\Illuminate\Support\Str::limit($eskul->description, 100, '...')); ?>

                        </p>

                        <!-- Jadwal -->
                        <div class="ekskul-schedule text-center">
                            <span class="ekskul-badge">Jadwal: <?php echo e($eskul->schedule); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>



    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/informasi/eskul.blade.php ENDPATH**/ ?>