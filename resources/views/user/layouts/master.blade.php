<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SNEAKERS BY TH7</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    {{-- <link href="img/favicon.ico" rel="icon"> --}}

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- home page --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('user/homePage/images/favicon.png') }}">
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/bootstrap.min.css') }}">
    <!--owl carousel css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/owl.carousel.min.css') }}">
    <!--magnific popup css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/magnific-popup.css') }}">
    <!--icomoon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/icomoon.css') }}">
    <!--icofont css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/icofont.min.css') }}">
    <!--animate css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/animate.css') }}">
    <!--main css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/homePage/css/responsive.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell align-middle">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
    </div>
    <!--End Preloader-->

    <!-- Navbar Start -->
    <div class="container-fluid p-2" style="background-color: #ff4d1c">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="#" class="text-decoration-none">
                    <div class="h3 text-uppercase my-3 px-2 text-light" style="background-color: #ff4d1c">
                        Sneakers by
                        <span class="text-dark">TH7</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <div class="h3 text-uppercase my-3 px-2 text-light" style="background-color: #ff4d1c">Sneakers
                            by
                            <span class="text-dark">TH7</span>
                        </div>
                    </a>
                    <button type="button" class="navbar-toggler bg-dark" data-toggle="collapse"
                        data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between text-light" id="navbarCollapse"
                        style="background-color: #ff4d1c;">
                        <div class="navbar-nav mr-auto py-0 text-light">
                            <a href="{{ route('user#showHomePage') }}"
                                class="nav-item nav-link me-4 nav-item text-light">Home</a>
                            <a href="{{ route('user#home') }}"
                                class="nav-item nav-link me-4 nav-item text-light">Products</a>
                            <a href="{{ route('user#contact') }}"
                                class="nav-item nav-link me-4 nav-item text-light">Contact
                                Us</a>
                            <a href="{{ route('user#cartList') }}" class="nav-item nav-link me-4 nav-item text-light">
                                Cart
                                <i class="fa-solid fa-cart-plus"></i>
                            </a>
                            <a href="{{ route('user#history') }}"
                                class="nav-item nav-link me-4 nav-item text-light">History</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <span class="d-inline me-2 px-3">
                                <a href="{{ route('user#accountChangePage') }}" class="">
                                    <button class="btn rounded" style="background-color: #f4f4f4">
                                        @if (Auth::user()->image == null)
                                            @if (Auth::user()->gender == 'male')
                                                <img src="{{ asset('image/male_default.png') }}" class="rounded"
                                                    style="width: 30px;height 30px">
                                            @else
                                                <img src="{{ asset('image/female_default.png') }}" class="rounded"
                                                    style="width: 30px;height 30px">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                style="width: 30px;height 30px" class="rounded" />
                                        @endif
                                        {{ Auth::user()->name }}
                                    </button>
                                </a>
                            </span>

                            <span>
                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn text-light" type="submit"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                        Logout</button>
                                </form>
                            </span>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    @yield('content')

    <!-- Footer Start -->
    <div>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: black">
            <div class="container p-4 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-dark">
                            <h6 class="text-uppercase mb-4 font-weight-bold text-light">INFORMATION</h6>
                            <p class="text-muted">FAQ</p>
                            <p class="text-muted">TERMS & CONDITIONS</p>
                            <p class="text-muted">SECURITY & PRIVACY</p>
                            <p class="text-muted">HELP</p>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold text-light">Products For</h6>
                            <p>
                                <a class="text-muted">Mens</a>
                            </p>
                            <p>
                                <a class="text-muted">Womens</a>
                            </p>
                            <p>
                                <a class="text-muted">Kids</a>
                            </p>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />

                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-dark">
                            <h6 class="text-uppercase mb-4 font-weight-bold text-light">Contact</h6>
                            <p class="text-muted"><i class="fas fa-home mr-3"></i> Yangon , Myanmar</p>
                            <p class="text-muted"><i class="fas fa-envelope mr-3"></i> thiha190503@gmail</p>
                            <p class="text-muted"><i class="fas fa-phone mr-3"></i> + 95 9953831213</p>
                            <p class="text-muted"><i class="fas fa-print mr-3"></i> + 95 9773258908</p>
                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold text-light">Follow us</h6>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998"
                                href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee"
                                href="#!" role="button"><i class="fab fa-twitter"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39"
                                href="#!" role="button"><i class="fab fa-google"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac"
                                href="#!" role="button"><i class="fab fa-instagram"></i></a>

                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca"
                                href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333"
                                href="#!" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2023 Copyright:
                <a class="text-dark" href="#">SneakersbyTH7.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    {{-- jquery cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Home Page --}}
    <script src="{{ asset('user/homePage/js/jquery-3.3.1.min.js') }}"></script>
    <!--proper js-->
    <script src="{{ asset('user/homePage/js/popper.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('user/homePage/js/bootstrap.min.js') }}"></script> --}}
    <!--magnic popup js-->
    <script src="{{ asset('user/homePage/js/magnific-popup.min.js') }}"></script>
    <!--owl carousel js-->
    <script src="{{ asset('user/homePage/js/owl.carousel.min.js') }}"></script>
    <!--scrollIt js-->
    <script src="{{ asset('user/homePage/js/scrollIt.min.js') }}"></script>
    <!--validator js-->
    <script src="{{ asset('user/homePage/js/validator.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ asset('user/homePage/js/contact.js') }}"></script>
    <!--main js-->
    <script src="{{ asset('user/homePage/js/custom.js') }}"></script>
</body>
@yield('scriptSource')

</html>
