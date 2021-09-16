<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('/') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">{{ trans('lang.General') }} </h6>
                            <p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p>
                        </div>
                    </li>

                    @if (auth()->user()->role == 'admin')
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/admin'
    ? 'active'
    : '' }}
                            href="{{ route('admin') }}">
                            <i data-feather="server"></i><span>Data Baru</span>
                        </li>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/newcustomer'
    ? 'active'
    : '' }}
                            href="{{ route('admin.newcustomer') }}">
                            <i data-feather="server"></i><span>Data Peminjam Baru</span>
                        </li>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/archieve'
    ? 'active'
    : '' }}
                            href="{{ route('admin.archieve') }}">
                            <i data-feather="server"></i><span>Data Arsip</span>
                        </li>
                        <li class="">
                        <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/user'
    ? 'active'
    : '' }}
                            href="{{ route('admin.user') }}">
                            <i data-feather="server"></i><span>Data User</span>
                        </li>
                    @else
                        <li class="">
                    <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/admin'
    ? 'active'
    : '' }}
                            href="{{ route('user') }}">
                            <i data-feather="server"></i><span>Data Baru</span>
                        </li>
                        <li class="">
                    <a class=" sidebar-link sidebar-title"
                            {{ request()->route()->getPrefix() == '/newcustomer'
    ? 'active'
    : '' }}
                            href="{{ route('user.newcustomer') }}">
                            <i data-feather="server"></i><span>Data Peminjam Baru</span>
                        </li>
                        <li class="">
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
