<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('backend/assets/img/dfl-cs-logo1.png') ?? '' }}" alt="navbar brand" class="navbar-brand"
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
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    @role('super_admin')
                    <a data-bs-toggle="xcollapse" href="{{ url('/') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                    @else
                        @can('dashboard.view')
                            <a data-bs-toggle="xcollapse" href="{{ url('/') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        @endcan
                        @endrole
                </li>


                <li class="nav-item {{ request()->is('/about-us/edit') ? 'active' : '' }}">
                    @role('super_admin')
                    <a data-bs-toggle="xcollapse" href="{{ url('/about-us/edit') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>About Us</p>
                    </a>
                    @else
                        @can('dashboard.view')
                            <a data-bs-toggle="xcollapse" href="{{ url('/about-us/edit') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>About Us</p>
                            </a>
                        @endcan
                        @endrole
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item {{ request()->is('slider*') ? 'active' : '' }}">
                    @role('super_admin')
                    <a data-bs-toggle="collapse" href="#slider"
                       aria-expanded="{{ request()->is('slider*') ? 'true' : 'false' }}">
                        <i class="fas fa-address-book"></i>
                        <p>Sliders</p>
                        <span class="caret"></span>
                    </a>
                    @else
                        @canany(['slider.list', 'slider.create'])
                            <a data-bs-toggle="collapse" href="#slider"
                               aria-expanded="{{ request()->is('slider*') ? 'true' : 'false' }}">
                                <i class="fas fa-address-book"></i>
                                <p>Sliders</p>
                                <span class="caret"></span>
                            </a>
                        @endcanany
                        @endrole

                        {{-- Ensure the collapse is open if any slider-related route is active --}}
                        <div class="collapse {{ request()->is('slider*') ? 'show' : '' }}" id="slider">
                            <ul class="nav nav-collapse">
                                @role('super_admin')
                                <li>
                                    <a href="{{ route('slider.index') }}"
                                       class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                                @else
                                    @can('slider.list')
                                        <li>
                                            <a href="{{ route('slider.index') }}"
                                               class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                                <span class="sub-item">List</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @endrole

                                        @role('super_admin')
                                        <li>
                                            <a href="{{ route('slider.create') }}"
                                               class="nav-link {{ request()->routeIs('slider.create') ? 'active' : '' }}">
                                                <span class="sub-item">Create</span>
                                            </a>
                                        </li>
                                        @else
                                            @can('slider.list')
                                                <li>
                                                    <a href="{{ route('slider.create') }}"
                                                       class="nav-link {{ request()->routeIs('slider.create') ? 'active' : '' }}">
                                                        <span class="sub-item">Create</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @endrole
                            </ul>
                        </div>
                </li>

                <li class="nav-item {{ request()->is('clients*') ? 'active' : '' }}">
                    @role('super_admin')
                    <a data-bs-toggle="collapse" href="#base"
                       aria-expanded="{{ request()->is('clients*') ? 'true' : 'false' }}">
                        <i class="fas fa-address-book"></i>
                        <p>Clients</p>
                        <span class="caret"></span>
                    </a>
                    @else
                        @canany(['client.list', 'client.create', 'client.statement'])
                            <a data-bs-toggle="collapse" href="#base"
                               aria-expanded="{{ request()->is('clients*') ? 'true' : 'false' }}">
                                <i class="fas fa-address-book"></i>
                                <p>Clients</p>
                                <span class="caret"></span>
                            </a>
                        @endcanany
                        @endrole

                        {{-- Ensure the collapse is open if any clients-related route is active --}}
                        <div class="collapse {{ request()->is('clients*') ? 'show' : '' }}" id="base">
                            <ul class="nav nav-collapse">
                                @role('super_admin')
                                <li>
                                    <a href="{{ route('clients.index') }}"
                                       class="nav-link {{ request()->routeIs('clients.index') ? 'active' : '' }}">
                                        <span class="sub-item">Client List</span>
                                    </a>
                                </li>
                                @else
                                    @can('client.list')
                                        <li>
                                            <a href="{{ route('clients.index') }}"
                                               class="nav-link {{ request()->routeIs('clients.index') ? 'active' : '' }}">
                                                <span class="sub-item">Client List</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @endrole

                                    @role('super_admin')
                                    <li>
                                        <a href="{{ route('clients.create') }}"
                                           class="nav-link {{ request()->routeIs('clients.create') ? 'active' : '' }}">
                                            <span class="sub-item">Add Client</span>
                                        </a>
                                    </li>
                                    @else
                                        @can('client.create')
                                            <li>
                                                <a href="{{ route('clients.create') }}"
                                                   class="nav-link {{ request()->routeIs('clients.create') ? 'active' : '' }}">
                                                    <span class="sub-item">Add Client</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @endrole

                                            @role('super_admin')
                                            <li>
                                                <a href="{{ route('clients.statement-all') }}"
                                                   class="nav-link {{ request()->routeIs('clients.statement-all') ? 'active' : '' }}">
                                                    <span class="sub-item">Client Statement</span>
                                                </a>
                                            </li>
                                            @else
                                                @can('client.statement')
                                                    <li>
                                                        <a href="{{ route('clients.statement-all') }}"
                                                           class="nav-link {{ request()->routeIs('clients.statement-all') ? 'active' : '' }}">
                                                            <span class="sub-item">Client Statement</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @endrole
                            </ul>
                        </div>
                </li>


                <li class="nav-item">
                    @role('super_admin')
                    <a data-bs-toggle="collapse" href="#access_control"
                       aria-expanded="{{ request()->is('roles*') || request()->is('permissions*') || request()->is('permission-modules*') || request()->is('users*') ? 'true' : 'false' }}">
                        <i class="fas fa-pencil-alt"></i>
                        <p>Access Control</p>
                        <span class="caret"></span>
                    </a>
                    @else
                        @canany(['role.list', 'permission.list', 'module.list', 'user.list'])
                            <a data-bs-toggle="collapse" href="#access_control"
                               aria-expanded="{{ request()->is('roles*') || request()->is('permissions*') || request()->is('permission-modules*') || request()->is('users*') ? 'true' : 'false' }}">
                                <i class="fas fa-pencil-alt"></i>
                                <p>Access Control</p>
                                <span class="caret"></span>
                            </a>
                        @endcanany
                        @endrole

                        <div class="collapse {{ request()->is('roles*') || request()->is('permissions*') || request()->is('permission-modules*') || request()->is('users*') ? 'show' : '' }}" id="access_control">
                            <ul class="nav nav-collapse">
                                @role('super_admin')
                                <li>
                                    <a href="{{ route('roles.index') }}"
                                       class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                        <span class="sub-item">Role List</span>
                                    </a>
                                </li>
                                @else
                                    @can('role.list')
                                        <li>
                                            <a href="{{ route('roles.index') }}"
                                               class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                                <span class="sub-item">Role List</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @endrole

                                    @role('super_admin')
                                    <li>
                                        <a href="{{ route('permissions.index') }}"
                                           class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                                            <span class="sub-item">Permission List</span>
                                        </a>
                                    </li>
                                    @else
                                        @can('permission.list')
                                            <li>
                                                <a href="{{ route('permissions.index') }}"
                                                   class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                                                    <span class="sub-item">Permission List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @endrole

                                        @role('super_admin')
                                        <li>
                                            <a href="{{ route('permission-modules.index') }}"
                                               class="nav-link {{ request()->routeIs('permission-modules.index') ? 'active' : '' }}">
                                                <span class="sub-item">Permission Module List</span>
                                            </a>
                                        </li>
                                        @else
                                            @can('module.list')
                                                <li>
                                                    <a href="{{ route('permission-modules.index') }}"
                                                       class="nav-link {{ request()->routeIs('permission-modules.index') ? 'active' : '' }}">
                                                        <span class="sub-item">Permission Module List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @endrole

                                            @role('super_admin')
                                            <li>
                                                <a href="{{ route('users.index') }}"
                                                   class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                                    <span class="sub-item">User List</span>
                                                </a>
                                            </li>
                                            @else
                                                @can('user.list')
                                                    <li>
                                                        <a href="{{ route('users.index') }}"
                                                           class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                                            <span class="sub-item">User List</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @endrole
                            </ul>
                        </div>
                </li>

            </ul>
        </div>
    </div>
</div>
