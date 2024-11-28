<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SMK Negeri 4 Bogor</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/login.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <!-- Error message from session -->
    <?php if(session('error')): ?>
    <script>
        $(document).ready(function() {
            toastr.error("<?php echo e(session('error')); ?>");
        });
    </script>
    <?php endif; ?>



    <div class="login-container">
        <div class="left-section">
            <div class="logo-container">
                <a href="/" class="logo-link">
                    <img src="<?php echo e(asset('path/logo/smkn4.png')); ?>" alt="Logo Sekolah" class="logo">
                    <h2>SMK Negeri 4 Bogor</h2>
                </a>
            </div>
            <img src="<?php echo e(asset('path/images/maskot-remove.png')); ?>" alt="Illustration" class="illustration">
        </div>

        <div class="right-section">
            <h2>Login</h2>
            <form method="POST" action="<?php echo e(route('login.submit')); ?>">
                <?php echo csrf_field(); ?>
                <!-- Email Input -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password Input -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

</html><?php /**PATH C:\SMKN4\bismillah\resources\views/login.blade.php ENDPATH**/ ?>