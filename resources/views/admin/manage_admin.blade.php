<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin/manage_Admin.css') }}">
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
                <h1 class="text-3xl font-bold">Manage Admin</h1>

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

            @if(session('success'))
            <div id="toast-success" class="toast toast-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if(session('error'))
            <div id="toast-error" class="toast toast-error">
                <p>{{ session('error') }}</p>
            </div>
            @endif


            <!-- Form untuk menambah admin baru -->
            <div class="admin-form-container">
                <h1 class="text-3xl font-bold">Tambah Admin Baru</h1>
                <form action="{{ route('store_admin') }}" method="POST" class="admin-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>

                    <button type="submit" class="submit-btn">Tambah Admin</button>
                </form>
            </div>


            <h2 class="admin-title">Daftar Admin</h2>
            <ul class="admin-list">
                @foreach ($admins as $admin)
                <li class="admin-item">
                    <span class="admin-name">{{ $admin->name }}</span>
                    <span class="admin-email">({{ $admin->email }})</span>
                    <div class="admin-actions">
                        <!-- Tombol Edit -->
                        <a href="{{ route('edit_admin', $admin->id) }}" class="edit-btn">Edit</a>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('delete_admin', $admin->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus admin ini?')" class="delete-btn">Hapus</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>


        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek jika ada toast sukses atau error
            const toastSuccess = document.getElementById('toast-success');
            const toastError = document.getElementById('toast-error');

            if (toastSuccess) {
                toastSuccess.classList.add('show');
                setTimeout(function() {
                    toastSuccess.classList.remove('show');
                }, 3000); // 3 detik
            }

            if (toastError) {
                toastError.classList.add('show');
                setTimeout(function() {
                    toastError.classList.remove('show');
                }, 3000); // 3 detik
            }
        });
    </script>
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




</body>

</html>