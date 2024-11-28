<!-- resources/views/home_view/profile_berita.blade.php -->
<div class="profile">
    <div class="row align-items-stretch">
        <div class="col-md-6">
            <h2 class="profile-title">Profil SMK Negeri 4 Bogor</h2>
            <div class="profile-custom-video">
                <iframe src="https://www.youtube.com/embed/Pu0WDr4H3-w" title="YouTube video" allowfullscreen></iframe>
            </div>
            <p class="profile-description">
                SMK Negeri 4 Kota Bogor berkomitmen untuk mendidik siswa-siswi yang siap menghadapi tantangan dunia industri dan berwirausaha. Dengan berbagai program unggulan dan pengembangan soft skills, kami percaya bahwa siswa kami akan siap berkontribusi positif di masyarakat.
            </p>
        </div>
        <div class="col-md-6">
            <h2 class="profile-title">Berita</h2>
            <table class="table">
                <tbody>
                    <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src="<?php echo e($berita->foto_url ?? asset('path/images/placeholder.jpg')); ?>" class="profile-img" alt="<?php echo e($berita->judul); ?>">
                        </td>
                        <td>
                            <a href="<?php echo e($berita->link); ?>" class="profile-link" target="_blank"><?php echo e(Str::limit($berita->konten, 120)); ?></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(url('berita')); ?>" class="profile-btn">Berita Lainnya</a>
        </div>


    </div>
</div><?php /**PATH C:\SMKN4\bismillah\resources\views/home/profile_berita.blade.php ENDPATH**/ ?>