
<?php $__env->startSection('title', 'Forget-password'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <div>
                            <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light"
                                        src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img
                                        class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                                        alt="looginpage"></a></div>
                            <div class="login-main">
                                <form class="theme-form" method="POST" action="<?php echo e(route('password.email')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <h4>Reset Kata Sandi Anda</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Masukkan Email</label>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <input class="form-control mb-1" type="email" id="email" name="email"
                                                    :value="old('email')" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit">Selesai </button>
                                    </div>
                                    <p class="mt-4 mb-0">Sudah Punya akun?<a class="ms-2"
                                            href="<?php echo e(route('login')); ?>">Sign In</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/authentication/forgot.blade.php ENDPATH**/ ?>