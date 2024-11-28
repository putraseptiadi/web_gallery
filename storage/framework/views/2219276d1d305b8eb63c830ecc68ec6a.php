<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin2/manage_agenda.css')); ?>">
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
                <h1 class="text-3xl font-bold">Manage Agenda</h1>

                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">
                        Hello, <?php echo e(Auth::user()->name); ?>!
                    </span>

                    <div class="relative">
                        <button id="profileButton" class="flex items-center text-blue-600 hover:text-blue-800">
                            <img src="<?php echo e(Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('path/images/pp_kosong.jpg')); ?>"
                                alt="Profile Picture" class="h-8 w-8 rounded-full mr-2">
                        </button>

                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                            <ul class="text-sm">
                                <li>
                                    <a href="<?php echo e(route('profile_admin')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                </li>
                                <li>
                                    <button onclick="handleLogout()" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Menuju Daftar Guru dengan panah ke kanan -->
            <a href="<?php echo e(route('admin2.daftar_agenda')); ?>" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                Lihat Daftar Agenda
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <form action="<?php echo e(route('agenda_admin.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                        <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-lg" required></textarea>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700">Date</label>
                        <input type="date" id="date" name="date" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700">Location</label>
                        <input type="text" id="location" name="location" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg">Save Agenda</button>
                    </div>
                </div>
            </form>



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

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/admin/agenda_admin.blade.php ENDPATH**/ ?>