<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom" id="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="profile-user"
                            class="rounded-circle me-2 thumb-sm" />
                        <div>
                            <small class="d-none d-md-block font-11">{{ $authUser->name }}</small>
                            <span class="d-none d-md-block fw-semibold font-12">{{ $authUser->email }} <i
                                    class="mdi mdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i
                            class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                    <a class="dropdown-item" href="crypto-settings.html"><i
                            class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a>
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="hidden">@csrf</form>
                </div>
            </li><!--end topbar-profile-->
        </ul><!--end topbar-nav-->
    </nav>
    <!-- end navbar-->
</div>
