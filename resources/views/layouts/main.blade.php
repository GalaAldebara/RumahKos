<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RumahKos</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pemesanan-kamar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detail-kamar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/update-profil.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pembayaran-kamar.css') }}">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
            <div class="logo-container" style="display: flex; justify-content: center; align-items: center; height: 150px;">
                <a href="./index.html" class="text-nowrap logo-img">
                    <img src="{{ asset('images/logos/matoangin2.png') }}" alt="Kos Matoangin Logo" style="width: 100px; height: 100px; border-radius: 50%;">
                </a>
            </div>
        </div>


        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         @include('layouts.sidebar')
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
       @include('layouts.navbar')
      </header>
      <!--  Header End -->
      <div class="container-fluid">

        @yield('container')

        @include('layouts.footer')
      </div>
    </div>
  </div>
  <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>
