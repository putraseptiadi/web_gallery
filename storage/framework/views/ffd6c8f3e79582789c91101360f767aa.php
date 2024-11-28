<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/guru_karyawan.css')); ?>">
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

    <h2 class="guru-title">Guru dan Tenaga Pendidikan</h2>

    <div class="guru-card-grid">
        <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="guru-card-item">
            <img src="<?php echo e(asset('storage/uploads/' . $guru->profile_picture)); ?>" alt="<?php echo e($guru->name); ?>" class="guru-card-image">
            <div class="guru-name-container">
                <h3 class="guru-name-text"><?php echo e($guru->name); ?></h3>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination Links -->
    <div class="pagination-container">
        <?php if($gurus->hasPages()): ?>
        <ul class="pagination">
            
            <?php if($gurus->onFirstPage()): ?>
            <li class="disabled"><span>&laquo; Previous</span></li>
            <?php else: ?>
            <li><a href="<?php echo e($gurus->previousPageUrl()); ?>" rel="prev">&laquo; Previous</a></li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $gurus->getUrlRange(1, $gurus->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($page == $gurus->currentPage()): ?>
            <li class="active"><span><?php echo e($page); ?></span></li>
            <?php else: ?>
            <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($gurus->hasMorePages()): ?>
            <li><a href="<?php echo e($gurus->nextPageUrl()); ?>" rel="next">Next &raquo;</a></li>
            <?php else: ?>
            <li class="disabled"><span>Next &raquo;</span></li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>




    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/profile/guru_karyawan.blade.php ENDPATH**/ ?>