<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    Dashboard
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>Manajemen Pengguna</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>Hak Akses</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>Peran</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>Pengguna</span>

                                </a>
                            </li>
                        @endcan
                        @can('setting_access')
                            <li class="{{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                                <a href="{{ route("admin.settings.index") }}">
                                    <i class="fa-fw fas fa-users-cog">

                                    </i>
                                    <span>Pengaturan</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('barber_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-address-card">

                        </i>
                        <span>Manajemen Barbershop </span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('barbershop_access')
                            <li class="{{ request()->is("admin/barbershops") || request()->is("admin/barbershops/*") ? "active" : "" }}">
                                <a href="{{ route("admin.barbershops.index") }}">
                                    <i class="fa-fw fas fa-cut">

                                    </i>
                                    <span>Barbershop</span>

                                </a>
                            </li>
                        @endcan
                        @can('service_access')
                            <li class="{{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                                <a href="{{ route("admin.services.index") }}">
                                    <i class="fa-fw fas fa-align-justify">

                                    </i>
                                    <span>Jasa-Jasa</span>

                                </a>
                            </li>
                        @endcan
                        @can('stylist_access')
                            <li class="{{ request()->is("admin/stylists") || request()->is("admin/stylists/*") ? "active" : "" }}">
                                <a href="{{ route("admin.stylists.index") }}">
                                    <i class="fa-fw fas fa-user-check">

                                    </i>
                                    <span>Tukang Cukur</span>

                                </a>
                            </li>
                        @endcan
                        @can('service_booking_access')
                            <li class="{{ request()->is("admin/service-bookings") || request()->is("admin/service-bookings/*") ? "active" : "" }}">
                                <a href="{{ route("admin.service-bookings.index") }}">
                                    <i class="fa-fw fas fa-mobile-alt">

                                    </i>
                                    <span>Order Detail</span>

                                </a>
                            </li>
                        @endcan
</ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            Ganti Password
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                   Keluar
                </a>
            </li>
        </ul>
    </section>
</aside>