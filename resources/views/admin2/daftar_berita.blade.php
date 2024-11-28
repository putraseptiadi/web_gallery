<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin2/daftar_berita.css') }}">
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
                <h1 class="text-3xl font-bold">Daftar Berita</h1>

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
            <a href="{{ route('manage_berita') }}" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
            <div class="berita-container">
                <div class="berita-grid berita-grid-cols-1 md:berita-grid-cols-3 gap-6">
                    @foreach ($beritas as $berita)
                    <div class="berita-border p-4 rounded-lg">
                        <img src="{{ $berita->foto_url }}"
                            alt="{{ $berita->judul }}"
                            class="berita-img h-55 w-full object-cover rounded-lg mb-2">
                        <h2 class="berita-title text-lg font-semibold">{{ $berita->judul }}</h2>
                        <p class="berita-text text-gray-600">{{ Str::limit($berita->konten, 100) }}</p>
                        <a href="{{ $berita->link }}" class="berita-link text-blue-500 hover:underline" target="_blank">Baca Selengkapnya</a>
                        <div class="mt-4">
                            <a href="{{ route('berita.edit', $berita->id) }}" class="berita-btn berita-btn-warning">Edit</a>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="berita-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="berita-btn berita-btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
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