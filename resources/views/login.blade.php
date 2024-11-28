<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SMK Negeri 4 Bogor</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <!-- Error message from session -->
    @if (session('error'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('error') }}");
        });
    </script>
    @endif



    <div class="login-container">
        <div class="left-section">
            <div class="logo-container">
                <a href="/" class="logo-link">
                    <img src="{{ asset('path/logo/smkn4.png') }}" alt="Logo Sekolah" class="logo">
                    <h2>SMK Negeri 4 Bogor</h2>
                </a>
            </div>
            <img src="{{ asset('path/images/maskot-remove.png') }}" alt="Illustration" class="illustration">
        </div>

        <div class="right-section">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <!-- Email Input -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me Option -->
                <div class="options">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-button">Kirim</button>
            </form>


        </div>
    </div>

</body>

</html>