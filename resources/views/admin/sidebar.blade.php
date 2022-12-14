      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Admin</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            @role('admin')
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Adminstratsiya</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a class="nav-link" href="{{ route('admin.roles.index') }}">Roles</a></li>
                <li><a class="nav-link" href="widget-data.html">Permissions</a></li>
              </ul>
            </li>
            @endrole
            <li class="dropdown">
              <a href="{{ route('admin.dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin.categories.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Categories</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin.posts.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Posts</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin.tags.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Tags</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin.ads.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Ads</span></a>
            </li>
          </ul>
        </aside>
      </div>
