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
        <a class="sidebar-link" href="/income" aria-expanded="false">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="black" stroke-width="0.8" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
          </span>
          <span class="hide-menu">Cek Transaksi</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="/perpanjangan-kontrak" aria-expanded="false">
          <span>
            <i class="ti ti-file"></i>
          </span>
          <span class="hide-menu">Perpanjangan Kontrak</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="/pengunduran-diri" aria-expanded="false">
          <span>
            <i class="ti ti-user-x"></i>
          </span>
          <span class="hide-menu">Pengunduran Diri</span>
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
