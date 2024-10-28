<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website - Kos Matoangin</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/landing-page.css" rel="stylesheet" />
    </head>
    <body>
        <img class="bg-image" src="{{ asset('images/backgrounds/bg-mobile-fallback.jpg') }}" alt="Background Image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -2;">

             <div   div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #6786fd; opacity: 0.2; z-index: -1;"></div>
                <div class="masthead">
                    <div class="masthead-content text-white">
                        <div class="container-fluid px-4 px-lg-0 text-center">
                            <img src="{{ asset('images/logos/matoangin2.png') }}" alt="Kos Matoangin Logo" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 20px;">

                            <h1 class="fst-italic lh-1 mb-4">Kos Matoangin</h1>
                            <p class="mb-5">
                                Tinggal di tempat nyaman dengan fasilitas lengkap dan lokasi strategis, hanya di kos kami!
                                Nikmati suasana tenang, kamar yang bersih, dan akses mudah ke berbagai tempat penting.
                                Tempat ideal untuk kamu yang butuh kenyamanan dan kemudahan, siap untuk menjadi rumah kedua!
                            </p>
                            <div class="col-auto d-flex gap-2 justify-content-center">
                                <button class="btn btn-primary" id="submitButton" type="button" onclick="window.location.href='{{ route('login') }}';" style="padding: 0.75rem 1.5rem; font-size: 1.25rem; background-color: #ffffff; color: #000000;">
                                    Pesan Sekarang!
                                </button>
                                <a class="btn btn-success btn-whatsapp" href="https://wa.me/089505490501" target="_blank">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Section-->
                <section class="page-section portfolio" id="portfolio">
                    <div class="container">
                        <!-- Portfolio Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Preview Ruangan</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                        </div>
                        <!-- Portfolio Grid Items-->
                        <div class="row justify-content-center">
                            <!-- Portfolio Item 1-->
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/koridor.png') }}" alt="Koridor" />
                                </div>
                            </div>
                            <!-- Portfolio Item 2-->
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/kamar2.png') }}" alt="Kamar 2" />
                                </div>
                            </div>
                            <!-- Portfolio Item 3-->
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/kamar3.png') }}" alt="Kamar 3" />
                                </div>
                            </div>
                            <!-- Portfolio Item 4-->
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/kamar-mandi.png') }}" alt="Dapur" />
                                </div>
                            </div>
                            <!-- Portfolio Item 5-->
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/parkiran.png') }}" alt="Parkiran" />
                                </div>
                            </div>
                            <!-- Portfolio Item 6-->
                            <div class="col-md-6 col-lg-4">
                                <div class="portfolio-item mx-auto">
                                    <img class="img-fluid" style="width: 100%; height: auto;" src="{{ asset('images/products/dapur.png') }}" alt="Dapur 2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- About Section-->
                <section class="page-section bg-light text-dark" id="about" style="min-height: 600px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <h2 class="fw-bold">Matoangin - Website Kos Matoangin</h2>
                            </div>
                            <div class="col-lg-8 mx-auto text-center">
                                <p class="lead">
                                    Kos Matoangin adalah tempat tinggal strategis yang menawarkan kamar yang nyaman dan fasilitas lengkap,
                                    cocok untuk mahasiswa atau pekerja yang mencari hunian praktis di area perkotaan. Terletak di lokasi yang mudah dijangkau,
                                    kos ini menyediakan akses mudah ke berbagai fasilitas umum, seperti minimarket, warung makan, dan transportasi umum.
                                    Kos Matoangin dilengkapi dengan fasilitas dasar yang mendukung kebutuhan harian penghuni, termasuk kamar yang bersih,
                                    dapur bersama, area parkir, dan koneksi internet. Kos ini dirancang untuk memberikan kenyamanan dengan suasana yang tenang,
                                    menjadikannya pilihan ideal bagi mereka yang ingin tinggal di lingkungan yang ramah dan aman.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Footer-->
                <footer class="footer text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Lokasi</h4>
                                <p class="lead mb-0">
                                    Jl. Bunga Widara No. 15
                                    <br />
                                    Kecamatan Lowokwaru, Malang
                                </p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Tentang Pemilik Website</h4>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
