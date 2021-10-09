<?php $__env->startSection('title', 'Sign-up'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="<?php echo e(route('login')); ?>"><img class="img-fluid for-light"
                                    src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img
                                    class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="<?php echo e(route('registerpost')); ?>">
                                <?php echo csrf_field(); ?>
                                <h4>Buat Akun Baru</h4>
                                <p>Masukkan Data Diri Anda</p>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Nama</label>
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <input class="form-control" type="text" id="nickname" name="nickname"
                                                required="" placeholder="Nama Pangilan">
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="text" id="name" name="name" required=""
                                                placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Alamat Email</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="xyz@mail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block mt-2" type="submit">Buat Akun</button>
                                </div>
                                <p class="mt-4 mb-0">Sudah Punya Akun?<a class="ms-2"
                                        href="<?php echo e(route('login')); ?>">Masuk</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiro/Code/PSB/resources/views/authentication/register.blade.php ENDPATH**/ ?>