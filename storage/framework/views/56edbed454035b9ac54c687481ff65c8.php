<!-- Sidebar -->
<div class="w-64 bg-white text-gray-800 p-6 space-y-4">
    <!-- Logo Section -->
    <a class="navbar-brand flex items-center space-x-2" href="#" style="margin-left: 0px;">
        <img src="<?php echo e(asset('path/logo/smkn4.png')); ?>" alt="Logo SMKN 4" class="logo-smkn4">
        <span class="separator"></span>
        <img src="<?php echo e(asset('path/logo/SMK BISA.png')); ?>" alt="SMK BISA" class="logo-smk-bisa">
    </a>

    <!-- Sidebar Menu -->
    <ul class="space-y-2">
        <!-- Dashboard Dropdown -->
        <li class="relative">
            <button class="menu-item w-full flex justify-between items-center py-2 px-4 text-sm font-semibold rounded <?php echo e(Request::routeIs('admin.dashboard*') || Request::routeIs('profile_admin') ? 'bg-blue-500 text-white' : 'hover:bg-gray-300'); ?>">
                Dashboard
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <ul class="dropdown-menu pl-4 space-y-2 mt-2 hidden text-sm">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(Request::routeIs('admin.dashboard') ? 'text-blue-500 font-bold' : ''); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(route('profile_admin')); ?>" class="<?php echo e(Request::routeIs('profile_admin') ? 'text-blue-500 font-bold' : ''); ?>">Profile</a></li>
            </ul>
        </li>

        <!-- Manage Admin -->
        <li class="menu-item w-full flex justify-between items-center py-3 px-4 text-sm font-semibold rounded-lg transition duration-300 transform hover:bg-blue-500 hover:text-white hover:translate-x-2 hover:shadow-lg <?php echo e(Request::routeIs('manage_admin') ? 'bg-blue-500 text-white' : ''); ?>">
            <a href="<?php echo e(route('manage_admin')); ?>" class="menu-text">Manage Admin </a>
        </li>

        <!-- Manage Home -->
        <li class="menu-item w-full flex justify-between items-center py-3 px-4 text-sm font-semibold rounded-lg transition duration-300 transform hover:bg-blue-500 hover:text-white hover:translate-x-2 hover:shadow-lg <?php echo e(Request::routeIs('manage_home') ? 'bg-blue-500 text-white' : ''); ?>">
            <a href="<?php echo e(route('manage_home')); ?>" class="menu-text">Manage Home </a>
        </li>

        <!-- Manage Profile Dropdown -->
        <li class="relative">
            <button class="menu-item w-full flex justify-between items-center py-2 px-4 text-sm font-semibold rounded <?php echo e(Request::routeIs('guru_admin*') || Request::routeIs('sarpras_admin') || Request::routeIs('galery_admin') ? 'bg-blue-500 text-white' : 'hover:bg-gray-300'); ?>">
                Manage Profile
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul class="dropdown-menu pl-4 space-y-2 mt-2 hidden text-sm font-semibold">
                <li><a href="<?php echo e(route('guru_admin')); ?>" class="<?php echo e(Request::routeIs('guru_admin') ? 'text-blue-500 font-bold' : ''); ?>"> Manage Guru</a></li>
                <li><a href="<?php echo e(route('sarpras_admin')); ?>" class="<?php echo e(Request::routeIs('sarpras_admin') ? 'text-blue-500 font-bold' : ''); ?>">Manage Sarpras</a></li>
                <li><a href="<?php echo e(route('galery_admin')); ?>" class="<?php echo e(Request::routeIs('galery_admin') ? 'text-blue-500 font-bold' : ''); ?>">Manage Gallery</a></li>
            </ul>
        </li>


        <!-- Manage Informasi Dropdown -->
        <li class="relative">
            <button class="menu-item w-full flex justify-between items-center py-2 px-4 text-sm font-semibold rounded hover:bg-gray-300 <?php echo e(Request::routeIs('pplg_admin*') || Request::routeIs('tjkt_admin') || Request::routeIs('tflm_admin')|| Request::routeIs('tkro_admin')? 'bg-blue-500 text-white' : ''); ?>">
                Manage Jurusan
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul class="dropdown-menu pl-4 space-y-2 mt-2 hidden text-sm font-semibold">
                <li><a href="pplg_admin" class="<?php echo e(Request::routeIs('pplg_admin') ? 'text-blue-500 font-bold' : ''); ?>">PPLG</a></li>
                <li><a href="tjkt_admin" class="<?php echo e(Request::routeIs('tjkt_admin') ? 'text-blue-500 font-bold' : ''); ?>">TJKT</a></li>
                <li><a href="tkro_admin" class="<?php echo e(Request::routeIs('tkro_admin') ? 'text-blue-500 font-bold' : ''); ?>">TKRO</a></li>
                <li><a href="tflm_admin" class="<?php echo e(Request::routeIs('tflm_admin') ? 'text-blue-500 font-bold' : ''); ?>">TFLM</a></li>
            </ul>
        </li>

        <!-- Manage Informasi Dropdown -->
        <li class="relative">
            <button class="menu-item w-full flex justify-between items-center py-2 px-4 text-sm font-semibold rounded hover:bg-gray-300 <?php echo e(Request::routeIs('informasi_admin*') || Request::routeIs('agenda_admin') || Request::routeIs('osis_admin')|| Request::routeIs('eskul_admin')? 'bg-blue-500 text-white' : ''); ?>">
                Manage Informasi
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul class="dropdown-menu pl-4 space-y-2 mt-2 hidden text-sm font-semibold">
                <li><a href="informasi_admin" class="<?php echo e(Request::routeIs('informasi_admin') ? 'text-blue-500 font-bold' : ''); ?>">Informasi Terkini</a></li>
                <li><a href="agenda_admin" class="<?php echo e(Request::routeIs('agenda_admin') ? 'text-blue-500 font-bold' : ''); ?>">Agenda</a></li>
                <li><a href="osis_admin" class="<?php echo e(Request::routeIs('osis_admin') ? 'text-blue-500 font-bold' : ''); ?>">Osis</a></li>
                <li><a href="eskul_admin" class="<?php echo e(Request::routeIs('eskul_admin') ? 'text-blue-500 font-bold' : ''); ?>">Ekstrakulikuler</a></li>

            </ul>
        </li>

        <!-- Manage Berita -->
        <li class="menu-item w-full flex justify-between items-center py-3 px-4 text-sm font-semibold rounded-lg transition duration-300 transform hover:bg-blue-500 hover:text-white hover:translate-x-2 hover:shadow-lg <?php echo e(Request::routeIs('manage_berita') ? 'bg-blue-500 text-white' : ''); ?>">
            <a href="manage_berita" class="menu-text">Manage Berita </a>
        </li>
        <!-- Manage Perpus -->
        <li class="menu-item w-full flex justify-between items-center py-3 px-4 text-sm font-semibold rounded-lg transition duration-300 transform hover:bg-blue-500 hover:text-white hover:translate-x-2 hover:shadow-lg <?php echo e(Request::routeIs('manage_perpus') ? 'bg-blue-500 text-white' : ''); ?>">
            <a href="manage_perpus" class="menu-text">Manage Perpustakaan </a>
        </li>
        <!-- Manage Program -->
        <li class="menu-item w-full flex justify-between items-center py-3 px-4 text-sm font-semibold rounded-lg transition duration-300 transform hover:bg-blue-500 hover:text-white hover:translate-x-2 hover:shadow-lg <?php echo e(Request::routeIs('manage_program') ? 'bg-blue-500 text-white' : ''); ?>">
            <a href="manage_program" class="menu-text">Manage Program </a>
        </li>
    </ul>
</div><?php /**PATH C:\SMKN4\bismillah\resources\views/sidebar/header_admin.blade.php ENDPATH**/ ?>