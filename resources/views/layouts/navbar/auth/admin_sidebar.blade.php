<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ !Request::is('admin/dashboard*') ? 'collapsed' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (auth()->user()->hasPermissionTo('dashboard-dealer-view'))
            <li class="nav-item">
                <a class="nav-link {{ !Request::is('admin/dealership*') ? 'collapsed' : '' }}"
                    href="{{ route('admin.dealership') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dealers</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif

        @if (auth()->user()->hasPermissionTo('dashboard-candidate-view'))
            <li class="nav-item">
                <a class="nav-link {{ !Request::is('admin/candidates*') ? 'collapsed' : '' }}"
                    href="{{ route('admin.candidates') }}">
                    <i class="bi bi-people"></i>
                    <span>Candidates</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif

        @if (auth()->user()->hasAnyPermission(['dashboard-user-view', 'dashboard-role-view', 'dashboard-permission-view']))
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/users*') || Request::is('admin/roles*') || Request::is('admin/permissions*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#userDropdown" aria-expanded="false">
                <i class="bi bi-people-fill"></i>
                <span style="margin-right: 15px;"> Manage User</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div id="userDropdown"
                class="collapse {{ Request::is('admin/users*') || Request::is('admin/roles*') || Request::is('admin/permissions*') ? 'show' : '' }}">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user()->hasPermissionTo('dashboard-user-view'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/users*') ? 'active' : 'collapsed' }}"
                                href="{{ route('admin.users.index') }}">
                                <span>Users</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermissionTo('dashboard-role-view'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/roles*') ? 'active' : 'collapsed' }}"
                                href="{{ route('admin.roles.index') }}">
                                <span>Roles</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermissionTo('dashboard-permission-view'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/permissions*') ? 'active' : 'collapsed' }}"
                                href="{{ route('admin.permissions.index') }}">
                                <span>Permissions</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </li>
    @endif
    


        @if (auth()->user()->hasPermissionTo('dashboard-groupe-view'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.groups') }}">
                    <i class="bi bi-building"></i>
                    <span>Groups</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif
    </ul>
</aside><!-- End Sidebar-->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.nav-link[data-bs-toggle="collapse"]').click(function() {
            // Toggle the chevron icon
            $(this).find('.bi-chevron-down');
        });
    });
</script>
