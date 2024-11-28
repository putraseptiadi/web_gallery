<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/informasi_home/agenda_guest.css')); ?>">
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

    <h2 class="agenda-title">Daftar Agenda</h2>

    <section class="agendaa">
        <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="agenda-item">
            <div class="agenda-date"><?php echo e(\Carbon\Carbon::parse($item->date)->format('d F Y')); ?></div>
            <div class="agenda-details">
                <strong><?php echo e($item->title); ?></strong>
                <p><?php echo e($item->description); ?></p>
                <p><?php echo e($item->location); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>


    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/informasi/agenda.blade.php ENDPATH**/ ?>