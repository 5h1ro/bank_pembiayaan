<?php $__env->startSection('title', 'Reset-password'); ?>

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
                                <form class="theme-form" method="POST" action="<?php echo e(route('password.update')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
                                    <h4>Buat Akun Anda</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Email Anda</label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="xyz@email.com" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Kata Sandi Baru</label>
                                        <input class="form-control" id="password" type="password" name="password"
                                            id="password" required placeholder="*********">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Ulangi Kata Sandi</label>
                                        <input class="form-control" id="password_confirmation" type="password"
                                            name="password_confirmation" required placeholder="*********">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit">Selesai </button>
                                    </div>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/authentication/reset.blade.php ENDPATH**/ ?>