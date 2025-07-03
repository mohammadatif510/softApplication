<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
        </a>
    </div>
    <div class="sidebar-user-pro media border-end">
        <div class="position-relative mx-auto">
            <img src=" {{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle thumb-md">
            <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
        </div>
        <div class="media-body ms-2 user-detail align-self-center">
            <h5 class="font-14 m-0 fw-bold">{{ $authUser->name }} </h5>
            <p class="opacity-50 mb-0">{{ $authUser->email }}</p>
        </div>
    </div>
    <!-- Tab panes -->

    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav tab-panel" id="Main" role="tabpanel">
                    <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span></li>

                    <!-- user management -->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarUserManagemen" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarUserManagemen">
                            <i class="fas fa-users menu-icon"></i>
                            <span>User Management</span>
                        </a>
                        <div class="collapse " id="sidebarUserManagemen">
                            <ul class="nav flex-column">

                                @can('create.role.category')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('role.category.index') }}">
                                        Role Categories
                                    </a>
                                </li>
                                @endcan

                                @can('permission.index')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('permission.index') }}">
                                        Permissions
                                    </a>
                                </li>
                                @endcan
                                @can('role.index')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('role.index') }}">
                                        Roles
                                    </a>
                                </li>
                                @endcan

                                @can('user.index')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                                </li>
                                @endcan
                            </ul>
                            <!--end nav-->
                        </div>
                        <!--end sidebarProjects-->
                    </li>
                    <!--end nav-item-->

                    <!-- projects -->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarProjects" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarProjects">
                            <i class="ti ti-brand-asana menu-icon"></i>
                            <span>Projects</span>
                        </a>
                        <div class="collapse " id="sidebarProjects">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project.index') }}">Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project.create') }}">Project Create</a>
                                </li>
                                <!--end nav-item-->
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.index') }}">Clients</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('team.index') }}">Team</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project.list') }}">Project List</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="projects-task.html">Task</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="projects-kanban-board.html">Kanban Board</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="projects-chat.html">Chat</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="projects-users.html">Users</a>
                                </li>
                                <!--end nav-item-->
                            </ul>
                            <!--end nav-->
                        </div>
                        <!--end sidebarProjects-->
                    </li>
                    <!--end nav-item-->

                    <li class="menu-label mt-0 text-primary font-12 fw-semibold">A<span>pps</span></li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarEmail" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarEmail">
                            <i class="ti ti-mail menu-icon"></i>
                            <span>Email</span>
                        </a>
                        <div class="collapse " id="sidebarEmail">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="apps-email-inbox.html">Inbox</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="apps-email-read.html">Read Email</a>
                                </li>
                                <!--end nav-item-->
                            </ul>
                            <!--end nav-->
                        </div>
                        <!--end sidebarEmail-->
                    </li>
                    <!--end nav-item-->

                    <li class="nav-item">
                        <a class="nav-link" href="apps-chat.html"><i
                                class="ti ti-brand-hipchat menu-icon"></i><span>Chat</span></a>
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="apps-contact-list.html"><i
                                class="ti ti-headphones menu-icon"></i><span>Contact List</span></a>
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="apps-calendar.html"><i
                                class="ti ti-calendar menu-icon"></i><span>Calendar</span></a>
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="apps-invoice.html"><i
                                class="ti ti-file-invoice menu-icon"></i><span>Invoice</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarEmailTemplates">
                            <i class="ti ti-target menu-icon"></i>
                            <span>Email Templates</span>
                        </a>
                        <div class="collapse " id="sidebarEmailTemplates">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-basic.html">Basic Action Email</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-alert.html">Alert Email</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-billing.html">Billing Email</a>
                                </li>
                                <!--end nav-item-->
                            </ul>
                            <!--end nav-->
                        </div>
                        <!--end sidebarEmailTemplates-->
                    </li>
                    <!--end nav-item-->
                    <li class="menu-label mt-0 text-primary font-12 fw-semibold">C<span>rafted</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuthentication">
                            <i class="ti ti-shield-lock menu-icon"></i>
                            <span>Authentication</span>
                        </a>
                        <div class="collapse " id="sidebarAuthentication">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-login.html">Log in</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-register.html">Register</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-recover-pw.html">Re-Password</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-404.html">Error 404</a>
                                </li>
                                <!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-500.html">Error 500</a>
                                </li>
                                <!--end nav-item-->
                            </ul>
                            <!--end nav-->
                        </div>
                        <!--end sidebarAuthentication-->
                    </li>
                    <!--end nav-item-->
                </ul>

                <!--end navbar-nav--->
            </div>
            <!--end sidebarCollapse-->
        </div>
    </div>
</div>