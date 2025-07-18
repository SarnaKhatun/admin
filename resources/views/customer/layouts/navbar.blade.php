<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">


        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                   aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{  asset('backend/images/customer/'.Auth()->user()->image) }}" alt="..."
                             class="avatar-img rounded-circle"/>
                    </div>
                    <span class="profile-username">
                                        <span class="op-7 ps-3">Hi,</span>
                                        <br>
                                        <span class="fw-bold">{{ Auth()->user()->name }}</span>
                                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="{{ asset('backend/images/customer/'.Auth::user()->image ?? '') }}"
                                         alt="image"
                                         class="avatar-img rounded"/>
                                </div>
                                <div class="u-text">
                                    <h4>{{auth()->user()->name ?? ''}}</h4>
                                    <p class="text-muted">{{auth()->user()->email ?? ''}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('customer.profile.edit')  }}">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('customer.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('customer.logout') }}" id="logout-form" method="post"
                                  class="d-none">@csrf</form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
