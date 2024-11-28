<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin/propres_pplg.css') }}">
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
                <h1 class="text-3xl font-bold">Profesi & Prestasi PPLG</h1>

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
            <a href="/admin/pplg_admin" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>

            <section class="program-info container my-5">
                <div class="row">
                    {{-- Form Tambah Prestasi --}}
                    <div class="col-md-6">
                        <h3><i class="bi bi-trophy"></i> Prestasi</h3>
                        <form action="{{ route('prestasi.store') }}" method="POST" class="form-bg">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="judul" class="form-control" placeholder="Judul Prestasi" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                            </div>
                            <button type="submit" class="prestasi_btn">Tambah Prestasi</button>
                        </form>

                        {{-- Daftar Prestasi --}}
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestasis as $index => $prestasi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $prestasi->judul }}</td>
                                    <td>{{ $prestasi->tahun }}</td>
                                    <td>
                                        <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Form Tambah Profesi --}}
                    <div class="col-md-6">
                        <h3><i class="bi bi-building"></i> Profesi / Bidang Kerja</h3>
                        <form action="{{ route('profesi.store') }}" method="POST" class="form-bg">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="judul" class="form-control" placeholder="Judul Profesi" required>
                            </div>
                            <button type="submit" class="profesi_btn">Tambah Profesi</button>
                        </form>


                        {{-- Daftar Profesi --}}
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($profesis as $index => $profesi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $profesi->judul }}</td>
                                    <td>
                                        <a href="{{ route('profesi.edit', $profesi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('profesi.destroy', $profesi->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>



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