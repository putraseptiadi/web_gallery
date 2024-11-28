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

                <h1 class="text-3xl font-bold">Edit Admin</h1>
                <div class="flex items-center">
                    <!-- Text "Hello, {{ Auth::user()->name }}!" di pinggir kiri -->
                    <span class="text-gray-600 mr-2">
                        Hello, {{ Auth::user()->name }}!
                    </span>

                    <!-- Link ke halaman Profile dengan gambar/foto di sampingnya -->
                    <a href="{{ route('profile_admin') }}" class="ml-4 flex items-center text-blue-600 hover:text-blue-800">
                        <!-- Menampilkan foto profil pengguna -->
                        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('path/images/pp_kosong.jpg') }}"
                            alt="Profile Picture" class="h-12 w-12 rounded-full mr-3 transition-transform transform hover:scale-105">
                    </a>
                </div>
            </div>


            <div class="admin-form-container">
                <h1 class="text-3xl font-bold">Edit Admin</h1>
                <form action="{{ route('update_admin', $admin->id) }}" method="POST" class="admin-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" value="{{ $admin->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $admin->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (Opsional):</label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </div>

                    <button type="submit" class="submit-btn">Perbarui Admin</button>
                </form>
            </div>

        </div>
    </div>



    <script>
        // Dropdown Menu Toggle
        document.querySelectorAll('.relative > button').forEach(button => {
            button.addEventListener('click', () => {
                const menu = button.nextElementSibling;
                menu.classList.toggle('hidden');
            });
        });
    </script>




</body>

</html>