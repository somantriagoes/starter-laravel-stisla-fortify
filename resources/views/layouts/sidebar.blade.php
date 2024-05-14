<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">APP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('home') }}">APP</a>
    </div>
    <ul class="sidebar-menu">
        @section('sidebar')
        <li class="menu-header">Dashboard</li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Manage Account</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Manage Account</span></a>
          <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="{{ route('users.index') }}">User</a>
            </li>
          </ul>
        </li>
        @show
    </ul>
  </aside>
