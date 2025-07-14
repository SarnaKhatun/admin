<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('director/dashboard') }}" class="logo">
                <img src="{{ asset('backend/assets/img/dfl-cs-logo.png') }}" alt="navbar brand" class="navbar-brand"
                     height="20"/>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('director/dashboard') ? 'active' : '' }}">
                    <a data-bs-toggle="xcollapse" href="{{ url('director/dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item {{ Request::is('director/membership-account*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#base333" aria-expanded="{{ Request::is('director/membership-account*') ? 'true' : 'false' }}">
                        <i class="fas fa-address-book"></i>
                        <p>Membership Account</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('director/membership-account*') ? 'show' : '' }}" id="base333">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('director.membership-account')}}" class="{{ Request::is('director/membership-account') ? 'active' : '' }}">
                                    <span class="sub-item">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('director/monthly-subscription-fees/index*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#base112" aria-expanded="{{ Request::is('director/monthly-subscription-fees/index*') ? 'true' : 'false' }}">
                        <i class="fas fa-chart-bar"></i>
                        <p>Monthly Collection</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('director/monthly-subscription-fees/index*') ? 'show' : '' }}" id="base112">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('director.monthly-subscription-fees.index') }}" class="{{ Request::is('director/monthly-subscription-fees/index') ? 'active' : '' }}">
                                    <span class="sub-item">Collection</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
    </div>
</div>
