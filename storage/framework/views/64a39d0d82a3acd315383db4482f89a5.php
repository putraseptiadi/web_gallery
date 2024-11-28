<div class="guru-section">
    <h2 class="guru-title">Guru dan Tenaga Pendidikan</h2>
    <div class="carousel-container">
        <div class="guru-grid">
            <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="guru-card">
                <img src="<?php echo e(asset('storage/uploads/' . $guru->profile_picture)); ?>" alt="<?php echo e($guru->name); ?>">
                <div class="name-container">
                    <h3><?php echo e($guru->name); ?></h3>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <a href="<?php echo e(url('profile/guru_karyawan')); ?>" class="guru-btn">Tampilkan Lainnya</a>
</div><?php /**PATH C:\SMKN4\bismillah\resources\views/home/guru.blade.php ENDPATH**/ ?>