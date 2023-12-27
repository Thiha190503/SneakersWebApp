<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content>
    <meta name="description" content>
    <title>Sneakers By TH7</title>
    <!--favicon-->
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
    @vite('resources/js/app.js')
</head>

<body>

    @extends('user.layouts.master')

    @section('content')

        @yield('content')
        <!--jQuery js-->
        <script src="{{ asset('user/homePage/js/jquery-3.3.1.min.js') }}"></script>
        <!--proper js-->
        <script src="{{ asset('user/homePage/js/popper.min.js') }}"></script>
        <!--bootstrap js-->
        <script src="{{ asset('user/homePage/js/bootstrap.min.js') }}"></script>
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

        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    </body>

    </html>
