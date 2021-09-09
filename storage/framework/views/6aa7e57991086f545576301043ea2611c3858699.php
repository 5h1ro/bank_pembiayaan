<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light"
                    src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""><img class="img-fluid for-dark"
                    src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid"
                    src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1"><?php echo e(trans('lang.General')); ?> </h6>
                            <p class="lan-2"><?php echo e(trans('lang.Dashboards,widgets & layout.')); ?></p>
                        </div>
                    </li>

                    <?php if(auth()->user()->role == 'admin'): ?>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            <?php echo e(request()->route()->getPrefix() == '/admin'
    ? 'active'
    : ''); ?>

                            href="<?php echo e(route('admin')); ?>">
                            <i data-feather="server"></i><span>Data Baru</span>
                        </li>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            <?php echo e(request()->route()->getPrefix() == '/newcustomer'
    ? 'active'
    : ''); ?>

                            href="<?php echo e(route('admin.newcustomer')); ?>">
                            <i data-feather="server"></i><span>Data New Customer</span>
                        </li>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            <?php echo e(request()->route()->getPrefix() == '/archieve'
    ? 'active'
    : ''); ?>

                            href="<?php echo e(route('admin.archieve')); ?>">
                            <i data-feather="server"></i><span>Data Archieve</span>
                        </li>
                    <?php else: ?>
                        <li class="">
                    <a class=" sidebar-link sidebar-title"
                            <?php echo e(request()->route()->getPrefix() == '/admin'
    ? 'active'
    : ''); ?>

                            href="<?php echo e(route('user')); ?>">
                            <i data-feather="server"></i><span>Data Baru</span>
                        </li>
                        <li class="">
                    <a class=" sidebar-link sidebar-title"
                            <?php echo e(request()->route()->getPrefix() == '/newcustomer'
    ? 'active'
    : ''); ?>

                            href="<?php echo e(route('user.newcustomer')); ?>">
                            <i data-feather="server"></i><span>Data New Customer</span>
                        </li>
                        <li class="">
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>