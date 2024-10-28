<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
   <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
   <script type="text/javascript"
   src="{{ config('midtrans.snap_url') }}"
 data-client-key="{{ config('midtrans.client_key') }}"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  <title>RumahKos</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pemesanan-kamar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detail-kamar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/update-profil.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pembayaran-kamar.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@stack('scripts')
</body>

</html>
