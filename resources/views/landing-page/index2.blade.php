<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WEB - Kos Matoangin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/landing-page.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: #ffffff;">
            <div class="container">
                <a class="navbar-brand" href="#page-top" style="color: #000000; font-weight: bold;">Matoangin</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded text-dark" href="#portfolio">About</a>
                        </li>

                        <!-- WhatsApp Button -->
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded btn-whatsapp d-flex align-items-center" href="#whatsapp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                </svg>
                                WhatsApp
                            </a>
                        </li>

                        <!-- Login button -->
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded btn-login" href="#login">
                                LOGIN <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead text-white text-center" style="background: url('{{ asset('images/products/rumah-kost.png') }}') no-repeat center center; background-size: cover;">
            <div class="container d-flex align-items-center flex-column" style="background-color: rgba(0, 0, 0, 0.5); padding: 50px;">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('images/products/avataaars.svg') }}" alt="..." />

                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Kos Matoangin</h1>

                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0 small-text">
                    Tinggal di tempat nyaman dengan fasilitas lengkap dan lokasi strategis, hanya di kos kami!
                    Nikmati suasana tenang, kamar yang bersih, dan akses mudah ke berbagai tempat penting.
                    Tempat ideal untuk kamu yang butuh kenyamanan dan kemudahan, siap untuk menjadi rumah kedua!
                </p>
            </div>
        </header>

        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Preview Ruangan</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/koridor.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/kamar2.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/kamar3.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 4-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/dapur.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 5-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/parkiran.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 6-->
                    <div class="col-md-6 col-lg-4">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/products/dapur.png') }}" alt="..." />
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </section>



        <!-- About Section-->
        <section class="page-section bg-light text-dark" id="about">
            <div class="container">
                <!-- Heading dan Deskripsi Utama -->
                <div class="row">
                    <div class="col-lg-8">
                        <p class="lead">
                            Mamikos memanfaatkan teknologi untuk berkembang dari aplikasi cari kos menjadi aplikasi yang memudahkan calon anak kos untuk booking properti kos dan juga melakukan pembayaran kos. Saat ini kami memiliki lebih dari 2 juta kamar kos yang tersebar di lebih dari 140 kota di seluruh Indonesia...
                        </p>
                    </div>
                    <div class="col-lg-4 text-end">
                        <h2 class="fw-bold">Mamikos - Aplikasi Anak Kos No. 1 di Indonesia</h2>
                    </div>
                </div>

                <!-- Tombol untuk Dropdown Fitur -->
                <div class="text-center mt-4">
                    <button class="btn btn-link fw-bold text-dark" onclick="toggleFeatures()" style="text-decoration: none;">
                        Fitur yang dapat dimanfaatkan di Mamikos <span id="featureToggleIcon">&#9660;</span>
                    </button>
                </div>

                <!-- Daftar Fitur -->
                <div id="featureList" class="mt-3" style="display: none;">
                    <ol type="a">
                        <li><strong>Fitur Pencarian</strong><br>Di kolom pencarian, kamu bisa cari kos di sekitarmu atau kos di seluruh daerah di Indonesia...</li>
                        <li><strong>Filter Pencarian</strong><br>Cari kos berdasarkan fasilitas kos yang kamu mau...</li>
                        <li><strong>Chat dengan Penyewa</strong><br>Terhubung langsung dengan pemilik kos...</li>
                        <li><strong>Sewa Langsung via Mamikos</strong><br>Bisa langsung mengajukan sewa kos di aplikasi atau website Mamikos...</li>
                        <li><strong>Virtual Tour</strong><br>Virtual Tour Mamikos adalah media foto lingkungan kos dalam 360°...</li>
                        <li><strong>Pembayaran via Mamikos</strong><br>Bayar kosan anti ribet, cashless, dan jaminan aman...</li>
                        <li><strong>MamiPoin</strong><br>Sebagai wujud terima kasih, Mamikos menghadirkan program loyalti melalui MamiPoin...</li>
                    </ol>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                            Jl. Bunga Widara No. 15
                            <br />
                            Kecamatan Lowokwaru, Malang
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Tentang Pemilik Website</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Matoangin Website 2024</small></div>
        </div>
        <!-- Portfolio Modals-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>

    <script>
        function toggleFeatures() {
            const featureList = document.getElementById("featureList");
            const icon = document.getElementById("featureToggleIcon");

            if (featureList.style.display === "none") {
                featureList.style.display = "block";
                icon.innerHTML = "&#9650;"; // Ubah ikon panah ke atas
            } else {
                featureList.style.display = "none";
                icon.innerHTML = "&#9660;"; // Ubah ikon panah ke bawah
            }
        }
    </script>

</html>
