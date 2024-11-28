<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin/manage_tjkt.css') }}">
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
                <h1 class="text-3xl font-bold"> Manage TJKT</h1>

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

            <a href="{{ route('jurusan_admin.manage_propres_tjkt') }}" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
                Lihat Manage propres tjkt
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>


            <div class="container">
                <form action="{{ route('tjkt_program.store') }}" method="POST" enctype="multipart/form-data" class="form-ketua-program">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bidang_keahlian">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                </form>
            </div>


            <section class="ketua-program-section">
                @foreach($KetuaTjkt as $KetuaTjkt)
                <div class="ketua-program-card mb-3">
                    <div class="ketua-program-row">
                        <div class="ketua-program-image">
                            <img src="{{ asset('storage/' . ($KetuaTjkt->foto ?? 'path/images/pp_kosong.jpg')) }}"
                                alt="Ketua Program" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                        </div>
                        <div class="ketua-program-content">
                            <div class="ketua-program-body">
                                <h5 class="ketua-program-title"><strong>Nama:</strong> {{ $KetuaTjkt->nama }}</h5>
                                <p class="ketua-program-title"><strong>Bidang Keahlian:</strong> {{ $KetuaTjkt->bidang_keahlian }}</p>
                                <div class="ketua-program-buttons">
                                    <a href="{{ route('tjkt_program.edit', $KetuaTjkt->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('tjkt_program.destroy', $KetuaTjkt->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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