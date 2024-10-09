<ul id="sidebarnav">
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/dashboard" aria-expanded="false">
        <span>
          <i class="ti ti-layout-dashboard"></i>
        </span>
        <span class="hide-menu">Dashboard</span>
      </a>
    </li>
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Menu</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/income" aria-expanded="false">
        <span>
          <i class="ti ti-article"></i>
        </span>
        <span class="hide-menu">Income</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/contract" aria-expanded="false">
        <span>
          <i class="ti ti-article"></i>
        </span>
        <span class="hide-menu">Contract</span>
      </a>
    </li>
    
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">AUTH</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="/login" aria-expanded="false">
            <span>
                <i class="ti ti-user-plus"></i>
            </span>
            <span class="hide-menu">Login</span>
        </a>
    </li>
    <li class="sidebar-item">
      {{-- <a class="sidebar-link" href="/logout" aria-expanded="false">
        <span>
          <i class="ti ti-login"></i>
        </span>
        <span class="hide-menu">Logout</span>
      </a> --}}
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="sidebar-link" style="background: none; border: none; font: inherit; color: inherit; cursor: pointer;">
            <span>
                <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Logout</span>
        </button>
    </form>
    
    </li>
   
  </ul>