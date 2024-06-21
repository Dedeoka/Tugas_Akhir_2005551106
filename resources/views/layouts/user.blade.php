<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panti Asuhan Dharma Jati II</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.jpg') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    @yield('head-script')
    <script></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Panti Asuhan Dharma Jati II</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('panti-asuhan-dharma-jati-II/home') ? 'active' : '' }}"><a
                            href="{{ route('user.landing-page') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"><a href="about.html" class="nav-link">Profil</a></li>
                    <li class="nav-item"><a href="causes.html" class="nav-link">Pengumuman</a></li>
                    <li class="nav-item {{ request()->is('panti-asuhan-dharma-jati-II/donasi') ? 'active' : '' }}"><a
                            href="{{ route('user-donasi.index') }}" class="nav-link">Donasi</a></li>
                    <li class="nav-item"><a href="blog.html" class="nav-link">Pengumuman</a></li>
                    <li class="nav-item"><a href="{{ route('user-gallery.index') }}" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="event.html" class="nav-link">Program</a></li>
                    <li class="nav-item {{ request()->is('panti-asuhan-dharma-jati-II/contact') ? 'active' : '' }}"><a
                            href="{{ route('user-contact.index') }}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Recent Blog</h2>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                        about</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                        about</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Site Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Donate</a></li>
                            <li><a href="#" class="py-2 d-block">Causes</a></li>
                            <li><a href="#" class="py-2 d-block">Event</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    @yield('script')
    <script src="{{ asset('assets/landing-page/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/aos.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/main.js') }}"></script>

</body>

</html>
