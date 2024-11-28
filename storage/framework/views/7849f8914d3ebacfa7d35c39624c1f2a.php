<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar_footer/navbar_footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/border.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bepropus/perpus_guest.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <h1 class="buku-title">Daftar Buku Perpustakaan</h1>

    <div class="buku-container mt-5">
        <div class="row mt-3">
            <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="buku-card">
                    <img src="<?php echo e($buku->foto ? asset('storage/' . $buku->foto) : 'https://via.placeholder.com/150'); ?>" class="buku-card-img-top" alt="Foto Buku">
                    <div class="buku-card-body">
                        <h5 class="buku-card-title"><?php echo e($buku->judul); ?></h5>
                        <p class="buku-card-text">
                            <strong>Penulis:</strong> <?php echo e($buku->penulis); ?><br>
                            <strong>Penerbit:</strong> <?php echo e($buku->penerbit); ?><br>
                            <strong>Tahun Terbit:</strong> <?php echo e($buku->tahun_terbit); ?><br>
                            <strong>Status:</strong>
                            <span class="badge <?php if($buku->status == 'tersedia'): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                                <?php echo e(ucfirst($buku->status)); ?>

                            </span>
                        </p>
                        <!-- Tombol untuk memicu modal -->
                        <?php if($buku->status == 'tersedia'): ?>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#statusModal<?php echo e($buku->id); ?>">
                            <?php echo e($buku->status); ?>

                        </a>
                        <?php else: ?>
                        <button class="btn btn-secondary" disabled>Buku Tidak Tersedia</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Modal untuk masing-masing buku -->
            <div class="modal fade" id="statusModal<?php echo e($buku->id); ?>" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel<?php echo e($buku->id); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel<?php echo e($buku->id); ?>">Status Buku: <?php echo e($buku->judul); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if($buku->status == 'tersedia'): ?>
                            <p>Buku ini tersedia untuk dipinjam.</p>
                            <?php else: ?>
                            <p>Maaf, buku ini tidak tersedia untuk dipinjam saat ini.</p>
                            <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>


    <!-- Bagian Peta dan footer -->
    <footer>
        <?php echo $__env->make('home.peta_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/berita_program_perpus/perpustakaan.blade.php ENDPATH**/ ?>