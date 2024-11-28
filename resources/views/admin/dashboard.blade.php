<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Guru</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>


    <!-- Layout Wrapper -->
    <div class="flex min-h-screen">

        @include('sidebar.header_admin')

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-4 mb-8">
                <h1 class="text-3xl font-bold">Dashborad</h1>

                <div class="flex items-center">
                    <!-- Text "Hello, {{ Auth::user()->name }}!" di pinggir kiri -->
                    <span class="text-gray-600 mr-2">
                        Hello, {{ Auth::user()->name }}!
                    </span>


                    <!-- Link untuk dropdown dengan gambar profil di sampingnya -->
                    <div class="relative">
                        <button id="profileButton" class="flex items-center text-blue-600 hover:text-blue-800">
                            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('path/images/pp_kosong.jpg') }}"
                                alt="Profile Picture" class="h-8 w-8 rounded-full mr-2">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                            <ul class="text-sm">
                                <!-- Link ke profile -->
                                <li>
                                    <a href="{{ route('profile_admin') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
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
            <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
            </a>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Stats Cards -->
                @foreach([
                ['Total Admin', $admins->count(), route('manage_admin')],
                ['Total Buku', $bukus->count(), route('daftar_perpus')],
                ['Total Agenda', $agenda->count(), route('admin2.daftar_agenda')],
                ['Total Gallery', $galleries->count(), route('admin2.daftar_gallery')],
                ['Total Lowongan', $jobs->count(), route('daftar_program')],
                ['Total Berita', $beritas->count(), route('daftar_berita')],
                ['Jumlah Guru', $gurus->count(), route('admin.daftar_guruadmin')],
                ['Jumlah Informasi', $informasiTerkini->count(), route('informasi.daftar_informasi_terkini')],
                ['Ekstrakurikuler', $eskuls->count(), route('daftar_eskul')]
                ] as [$title, $count, $url])
                <a href="{{ $url }}" class="block stats-card bg-white shadow rounded-lg p-6 hover:bg-gray-100 transition">
                    <h2 class="text-gray-600 font-semibold stats-card-title">{{ $title }}</h2>
                    <p class="text-2xl font-bold stats-card-count">{{ $count }}</p>
                </a>
                @endforeach
            </div>

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
    @if (session('success'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('success') }}");
        });
    </script>
    @endif



</body>

</html>