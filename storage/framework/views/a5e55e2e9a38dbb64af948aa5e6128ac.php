<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin2/daftar_perpustakaan.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>


    <!-- Layout Wrapper -->
    <div class="flex min-h-screen">

        <?php echo $__env->make('sidebar.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-4 mb-8">
                <h1 class="text-3xl font-bold">Daftar Perpustakaan</h1>

                <div class="flex items-center">
                    <!-- Text "Hello, <?php echo e(Auth::user()->name); ?>!" di pinggir kiri -->
                    <span class="text-gray-600 mr-2">
                        Hello, <?php echo e(Auth::user()->name); ?>!
                    </span>


                    <!-- Link untuk dropdown dengan gambar profil di sampingnya -->
                    <div class="relative">
                        <button id="profileButton" class="flex items-center text-blue-600 hover:text-blue-800">
                            <img src="<?php echo e(Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('path/images/pp_kosong.jpg')); ?>"
                                alt="Profile Picture" class="h-8 w-8 rounded-full mr-2">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                            <ul class="text-sm">
                                <!-- Link ke profile -->
                                <li>
                                    <a href="<?php echo e(route('profile_admin')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                </li>
                                <!-- Logout Link -->
                                <li>
                                    <button onclick="handleLogout()" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <a href="<?php echo e(route('manage_perpus')); ?>" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>


            <table class="custom-table">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($buku->judul); ?></td>
                    <td><?php echo e($buku->penulis); ?></td>
                    <td><?php echo e($buku->penerbit); ?></td>
                    <td><?php echo e($buku->tahun_terbit); ?></td>
                    <td>
                        <?php if($buku->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $buku->foto)); ?>" width="100">
                        <?php else: ?>
                        Tidak ada foto
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($buku->status); ?></td>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" style="text-decoration: none;">Edit</a>
                        <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>






        </div>
    </div>



    <script>
        // Menangani klik pada tombol profil untuk menampilkan atau menyembunyikan dropdown
        document.getElementById('profileButton').addEventListener('click', function() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden'); // Menyembunyikan atau menampilkan dropdown
        });

        // Fungsi untuk logout
        async function handleLogout() {
            await fetch('/api/logout', {
                method: 'POST'
            });
            window.location.href = '/login';
        }
    </script>
    <!-- Success message from session -->
    <?php if(session('success')): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.success("<?php echo e(session('success')); ?>");
        });
    </script>
    <?php endif; ?>



</body>

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/admin2/daftar_perpus.blade.php ENDPATH**/ ?>