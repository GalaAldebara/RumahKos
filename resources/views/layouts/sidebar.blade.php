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
    @can('is-admin')

    <li class="sidebar-item">
        <a class="sidebar-link" href="/kamar" aria-expanded="false">
          <span>
            <i class="ti ti-home"></i>
          </span>
          <span class="hide-menu">Kamar</span>
        </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/penghuni" aria-expanded="false">
        <span>
          <i class="ti ti-home"></i>
        </span>
        <span class="hide-menu">Penghuni</span>
      </a>
    </li>
  <li class="sidebar-item">
      <a class="sidebar-link" href="/income" aria-expanded="false">
        <span>
          <i class="ti ti-home"></i>
        </span>
        <span class="hide-menu">Pemasukan</span>
      </a>
    </li>
    @endcan

    @if(Gate::allows('is-user'))
    <li class="sidebar-item">
      <a class="sidebar-link" href="/pemesanan-kamar" aria-expanded="false">
        <span>
          <i class="ti ti-home"></i>
        </span>
        <span class="hide-menu">Pemesanan Kamar</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/pembayaran-kamar" aria-expanded="false">
        <span>
          <i class="ti ti-wallet"></i>
        </span>
        <span class="hide-menu">Pembayaran Kamar</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="/detail-kamar" aria-expanded="false">
        <span>
          <i class="ti ti-file"></i>
        </span>
        <span class="hide-menu">Kamar Anda</span>
      </a>
    </li>
    @endif
      <li class="sidebar-item">
        <a class="sidebar-link" href="/detail-kamar" aria-expanded="false">
          <span>
            <i class="ti ti-file"></i>
          </span>
          <span class="hide-menu">Detail Kamar</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="/update-profil" aria-expanded="false">
          <span class="icon-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM1 13s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm11-8.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg>
          </span>
          <span class="hide-menu">Update Profil</span>
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
