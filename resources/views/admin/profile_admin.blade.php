<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/admin/profile_admin.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- Layout Wrapper -->
    <div class="flex min-h-screen">
        @include('sidebar.header_admin')

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-4 mb-8">
                <h1 class="text-3xl font-bold">Profile</h1>
                <div class="flex items-center">

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

            <!-- Foto Profil Versi Besar -->
            <div class="profile-container">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('path/images/pp_kosong.jpg') }}"
                    alt="Large Profile Picture" class="profile-img">

                <div class="profile-info">
                    <div class="profile-item">
                        <span class="label">Email:</span>
                        <span class="profile-text">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="profile-item">
                        <span class="label">Username:</span>
                        <span class="profile-text">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>


            <!-- Formulir untuk Upload Foto Profil -->
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="mt-6 profile-upload-form">
                @csrf
                <label class="label-upload">Upload Foto Profil</label>
                <input type="file" name="profile_picture" class="input-file-upload">
                <button type="submit" class="upload-btn">Upload</button>
            </form>


            @if(session('success'))
            <div id="toast" class="toast bg-green-600 text-white p-4 rounded-lg shadow-lg fixed bottom-5 right-5 flex items-center opacity-0 transform transition-all duration-500 ease-out">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <div class="message">{{ session('success') }}</div>
            </div>
            @endif


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const toast = document.getElementById("toast");

                    if (toast) {
                        toast.classList.add("show");

                        // Toast akan hilang setelah 5 detik
                        setTimeout(() => {
                            toast.classList.remove("show");
                        }, 5000);
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


        </div>
    </div>
</body>

</html>