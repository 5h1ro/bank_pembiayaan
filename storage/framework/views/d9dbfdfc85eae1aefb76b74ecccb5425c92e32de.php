<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="mb-3 w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid"
                        src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="onhover-dropdown">
                    <div class="notification-box"><i data-feather="bell"> </i><span
                            class="badge rounded-pill badge-secondary"><?php echo e($notification); ?></span></div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <i data-feather="bell"></i>
                            <h6 class="f-18 mb-0">Notitications</h6>
                        </li>
                        <li>
                            <p><i class="fa fa-circle-o me-3 font-primary"> </i>Anda mempunyai <?php echo e($notification); ?>

                                baru
                            </p>
                        </li>
                        <li><a class="btn btn-primary" href="<?php echo e(route('home')); ?>">Cek Data Baru</a></li>
                    </ul>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!"
                        onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <img class="b-r-10" src="<?php echo e(asset('assets/images/dashboard/profile.jpg')); ?>" alt="">
                        <div class="media-body">
                            <span><?php echo e(Auth::user()->name); ?></span>
                            <p class="mb-0 font-roboto"><?php echo e(Auth::user()->role); ?> <i
                                    class="middle fa fa-angle-down"></i>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="<?php echo e(route('logout')); ?>"><i data-feather="log-out"> </i><span>Log out</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Github\bank_pembiayaan\resources\views/layouts/simple/header.blade.php ENDPATH**/ ?>