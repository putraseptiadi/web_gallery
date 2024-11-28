<section class="informasi-agenda">
    <div class="agenda">
        <div class="row align-items-stretch">
            <div class="col-md-6">
                <h2 class="agenda-title">Informasi Terkini</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <img src="<?php echo e(asset('path/images/informasi1.jpg')); ?>" class="agenda-img" alt="Deskripsi Foto informasi 1">
                            </td>
                            <td>
                                <a href="https://www.instagram.com/p/DBSWs15y7KV/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="agenda-link">Kegiatan Pembukaan Transforkr4b 2024 SMK Negeri 4 Bogor. Kegiatan ini dilaksanankan di lapangan pada hari Rabu, 16 Oktober 2024</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo e(asset('path/images/informasi2.jpg')); ?>" class="agenda-img" alt="Deskripsi Foto informasi 2">
                            </td>
                            <td>
                                <a href="https://www.instagram.com/p/DBSX5v7S636/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="agenda-link">Kegiatan Transforkr4b SMK Negeri 4 Bogor Day 1 dalam rangka mencapai kompetensi dan karakter yang sesuai dengan projek penguatan profil pelajar pancasila yang dilaksanakan di lapangan SMK Negeri 4 Bogor pada hari Rabu, 17 Oktober 2024</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo e(asset('path/images/informasi3.jpg')); ?>" class="agenda-img" alt="Deskripsi Foto informasi 3">
                            </td>
                            <td>
                                <a href="https://www.instagram.com/p/DBSYR7uS2x6/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="agenda-link">Kegiatan Transforkr4b SMK Negeri 4 Bogor Day 2 dalam rangka mencapai kompetensi dan karakter yang sesuai dengan projek penguatan profil pelajar pancasila yang dilaksanakan di lapangan SMK Negeri 4 Bogor pada hari Kamis, 18 Oktober 2024</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?php echo e(url('informasi/informasi')); ?>" class="agenda-btn">Informasi Lainnya</a>
            </div>

            <div class="col-md-6">
                <h2 class="agenda-title">Agenda</h2>
                <div class="agenda-card">
                    <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="agenda-item">
                        <div class="agenda-date"><?php echo e(\Carbon\Carbon::parse($item->date)->format('d M')); ?></div>
                        <div class="agenda-details">
                            <strong><?php echo e($item->title); ?></strong>
                            <p><?php echo e($item->description); ?></p>
                            <p><?php echo e($item->location); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <a href="<?php echo e(url('informasi/agenda')); ?>" class="agenda-btn" style="margin-top: 1.3rem;">Agenda Lainnya</a>
            </div>

        </div>
    </div>
</section><?php /**PATH C:\SMKN4\bismillah\resources\views/home/agenda_infor.blade.php ENDPATH**/ ?>