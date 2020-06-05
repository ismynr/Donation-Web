<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smart Risk Management For Receiving Web-Based Assistance</title>
    <link rel="icon" href="{{ asset('amor') }}/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('amor') }}/css/style.css">
</head>

<body>
    <!--::header part start::-->
    @include('layouts.home.header')
    <!-- Header part end-->

    @yield('content')

    <!--::footer_part start::-->
    @include('layouts.home.footer')
    <!--::footer_part end::-->

    <!-- jquery plugins here-->

    <script src="{{ asset('amor') }}/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{ asset('amor') }}/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('amor') }}/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="{{ asset('amor') }}/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('amor') }}/js/swiper.min.js"></script>
    <script src="{{ asset('amor') }}/js/wow.min.js"></script>
    <script src="{{ asset('amor') }}/js/jquery.smooth-scroll.min.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('amor') }}/js/masonry.pkgd.min.js"></script>
    <!-- particles js -->
    <script src="{{ asset('amor') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('amor') }}/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('amor') }}/js/slick.min.js"></script>
    <script src="{{ asset('amor') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('amor') }}/js/waypoints.min.js"></script>
    <!-- contact js -->
    <script src="{{ asset('amor') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('amor') }}/js/jquery.form.js"></script>
    <script src="{{ asset('amor') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('amor') }}/js/mail-script.js"></script>
    <script src="{{ asset('amor') }}/js/contact.js"></script>
    <!-- custom js -->
    <script src="{{ asset('amor') }}/js/custom.js"></script>
</body>

</html>