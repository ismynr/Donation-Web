<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>User</title>
    <!-- Favicon icon -->
    <link href="{{ asset('quixlab') }}/images/favicon.png" rel="icon" type="image/png" sizes="16x16">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('quixlab') }}/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ asset('quixlab') }}/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('quixlab') }}/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('quixlab') }}/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts.user.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        {{-- @include('layouts.user.sidebar') --}}
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="margin: 30px 10px 10px 10px !important;">

            @yield('content')
            
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.user.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('quixlab') }}/plugins/common/common.min.js"></script>
    <script src="{{ asset('quixlab') }}/js/custom.min.js"></script>
    <script src="{{ asset('quixlab') }}/js/settings.js"></script>
    <script src="{{ asset('quixlab') }}/js/gleek.js"></script>
    <script src="{{ asset('quixlab') }}/js/styleSwitcher.js"></script>

</body>

</html>