<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Iga Bajog</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="user/assets/img/favicon.png" rel="icon">
    <link href="user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="user/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="user/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Platia
  * Template URL: https://bootstrapmade.com/platia-bootstrap-restaurant-template/
  * Updated: Aug 11 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header fixed-top">

        <div class="topbar d-flex align-items-center dark-background">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">contact@example.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="user/assets/img/logo.webp" alt=""> -->
                    <h1 class="sitename">Iga Bajog 2</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>

                        <li><a href="#menu">Menu</a></li>


                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">
        @yield('content')

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-4">
                    <div class="footer-content">
                        <a href="/" class="logo d-flex align-items-center mb-4">
                            <span class="sitename">Iga Bajog</span>
                        </a>
                        <p class="mb-4">
                            Nikmati lezatnya Iga Bajog khas Yogyakarta dengan cita rasa istimewa.
                            Pesan sekarang, kami siapkan langsung ke meja Anda!
                        </p>

                        <div class="newsletter-form">
                            <h5>Dapatkan Info Promo</h5>
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Masukkan email Anda" required="">
                                    <button type="submit" class="btn-subscribe">
                                        <i class="bi bi-send"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <div class="footer-links">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><a href="#menu"><i class="bi bi-chevron-right"></i> Menu</a></li>
                            <li><a href="#about"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
                            <li><a href="#contact"><i class="bi bi-chevron-right"></i> Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <div class="footer-links">
                        <h4>Layanan</h4>
                        <ul>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Dine-In</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Take Away</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Delivery (WhatsApp)</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="footer-contact">
                        <h4>Kontak Kami</h4>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="contact-info">
                                <p>Yogyakarta, Indonesia</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="contact-info">
                                <p>+62 812-3456-7890</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="contact-info">
                                <p>igabajog@email.com</p>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-tiktok"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 text-center">
                        <div class="copyright">
                            <p>
                                © 2025 <strong class="px-1 sitename">Iga Bajog</strong> — All Rights Reserved
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="user/assets/vendor/php-email-form/validate.js"></script>
    <script src="user/assets/vendor/aos/aos.js"></script>
    <script src="user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="user/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="user/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="user/assets/js/main.js"></script>
    @yield('script')

</body>

</html>
