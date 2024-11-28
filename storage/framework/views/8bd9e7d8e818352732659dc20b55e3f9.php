<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/gallery_guest.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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

    <h2 class="gallery-title">Gallery Photos</h2>
    <section class="gallery mt-4">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2-4 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img src="<?php echo e(asset('storage/' . $gallery->photo_path)); ?>" class="card-img-top" alt="<?php echo e($gallery->description); ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($gallery->title); ?></h5>
                            <p class="card-text"><?php echo e($gallery->description); ?></p>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#galleryModal<?php echo e($gallery->id); ?>">View More</a>
                        </div>
                    </div>
                </div>


                <!-- Modal untuk setiap galeri -->
                <div class="modal fade" id="galleryModal<?php echo e($gallery->id); ?>" tabindex="-1" aria-labelledby="galleryModalLabel<?php echo e($gallery->id); ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="galleryModalLabel<?php echo e($gallery->id); ?>"><?php echo e($gallery->title ?? 'Gallery Item'); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="<?php echo e(asset('storage/' . $gallery->photo_path)); ?>" alt="<?php echo e($gallery->description); ?>" class="img-fluid mb-3">
                                <p><?php echo e($gallery->description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>



    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/profile/galeri.blade.php ENDPATH**/ ?>