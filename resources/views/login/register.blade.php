<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="/images/logos/favicon.png" />
  <link rel="stylesheet" href="/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>

                <!-- Tambahkan kode untuk menampilkan error di sini -->
                @if ($errors->has('registration_error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('registration_error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" value="{{ old('nama') }}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('username') }}">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="/">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/libs/jquery/dist/jquery.min.js"></script>
  <script src="/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Tambahkan kode JavaScript di sini -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mainWrapper = document.querySelector('#main-wrapper');

      // Jika ada error pada sign-up, tetap berada di halaman sign-up
      if ({{ $errors->has('registration_error') ? 'true' : 'false' }}) {
          mainWrapper.classList.add('active');
      }
    });
  </script>
</body>

</html>
