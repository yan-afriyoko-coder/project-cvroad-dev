 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{(!Request::is('admin/dashboard*') ? 'collapsed' : '')}}" href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @canany('dashboard-dealer-view')
      <li class="nav-item">
        <a class="nav-link {{(!Request::is('admin/dealership*') ? 'collapsed' : '')}}" href="{{route('admin.dealership')}}">
          <i class="bi bi-grid"></i>
          <span>Dealers</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

      @canany('dashboard-candidate-view')
      <li class="nav-item">
        <a class="nav-link {{(!Request::is('admin/candidates*') ? 'collapsed' : '')}}" href="{{route('admin.candidates')}}">
          <i class="bi bi-people"></i>
          <span>Candidates</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

      @canany('dashboard-user-view')
      <li class="nav-item">
        <a class="nav-link  {{!Request::is('admin/users*') ? 'collapsed' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="bi bi-people-fill"></i>
            <span>Users</span>
        </a>
    </li><!-- End Dashboard Nav -->
      @endcan 
    
      @canany('dashboard-role-view')
      <li class="nav-item">
        <a class="nav-link {{!Request::is('admin/roles*') ? 'collapsed' : '' }}" href="{{ route('admin.roles.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Roles</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

      @canany('dashboard-permission-view')
      <li class="nav-item">
        <a class="nav-link {{!Request::is('admin/permissions*') ? 'collapsed' : '' }}" href="{{ route('admin.permissions.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Permissions</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

      @canany('dashboard-groupe-view')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.groups')}}">
          <i class="bi bi-building"></i>
          <span>Groups</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

    </ul>

  </aside><!-- End Sidebar-->