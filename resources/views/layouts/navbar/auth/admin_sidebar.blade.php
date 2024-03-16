<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    {{-- @if(auth()->user()->hasPermissionTo('dashboard-view')) --}}
    <li class="nav-item">
      <a class="nav-link {{(!Request::is('admin/dashboard*') ? 'collapsed' : '')}}" href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    {{-- @endif --}}

    @if(auth()->user()->hasPermissionTo('dashboard-dealer-view'))
    <li class="nav-item">
      <a class="nav-link {{(!Request::is('admin/dealership*') ? 'collapsed' : '')}}" href="{{route('admin.dealership')}}">
        <i class="bi bi-grid"></i>
        <span>Dealers</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

    @if(auth()->user()->hasPermissionTo('dashboard-candidate-view'))
    <li class="nav-item">
      <a class="nav-link {{(!Request::is('admin/candidates*') ? 'collapsed' : '')}}" href="{{route('admin.candidates')}}">
        <i class="bi bi-people"></i>
        <span>Candidates</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

    @if(auth()->user()->hasPermissionTo('dashboard-user-view'))
    <li class="nav-item">
      <a class="nav-link  {{!Request::is('admin/users*') ? 'collapsed' : '' }}" href="{{ route('admin.users.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Users</span>
      </a>
  </li><!-- End Dashboard Nav -->
    @endif 

    @if(auth()->user()->hasPermissionTo('dashboard-role-view'))
    <li class="nav-item">
      <a class="nav-link {{!Request::is('admin/roles*') ? 'collapsed' : '' }}" href="{{ route('admin.roles.index') }}">
        <i class="bi bi-people-fill"></i>
        <span>Roles</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

    @if(auth()->user()->hasPermissionTo('dashboard-permission-view'))
    <li class="nav-item">
      <a class="nav-link {{!Request::is('admin/permissions*') ? 'collapsed' : '' }}" href="{{ route('admin.permissions.index') }}">
        <i class="bi bi-people-fill"></i>
        <span>Permissions</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

    @if(auth()->user()->hasPermissionTo('dashboard-groupe-view'))
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('admin.groups')}}">
        <i class="bi bi-building"></i>
        <span>Groups</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

  </ul>

</aside><!-- End Sidebar-->