<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Guru</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/guru_admin.css')); ?>">
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
                <h1 class="text-3xl font-bold">Manage Guru</h1>

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


            <!-- Tombol Menuju Daftar Guru dengan panah ke kanan -->
            <a href="<?php echo e(route('admin.daftar_guruadmin')); ?>" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                Lihat Daftar Guru
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>





            <!-- Form Upload Foto -->

            <form action="<?php echo e(route('upload_foto')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="block text-lg font-semibold text-blue-800 mb-2">Nama Guru:</label>
                    <input type="text" name="name" class="border-2 border-blue-800 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
                </div>
                <div class="form-group">
                    <label class="block text-lg font-semibold text-blue-800 mb-2">Pilih Foto:</label>
                    <input type="file" name="foto" accept="image/*" class="border-2 border-blue-800 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 cursor-pointer bg-gray-50" required>
                </div>
                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 hover:scale-105 transition duration-300 mt-4">
                    Upload
                </button>
            </form>




        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php if(session('success')): ?>
    <script>
        toastr.success("<?php echo e(session('success')); ?>");
    </script>
    <?php endif; ?>


</html><?php /**PATH C:\SMKN4\bismillah\resources\views/admin/guru_admin.blade.php ENDPATH**/ ?>