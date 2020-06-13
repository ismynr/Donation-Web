<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Donatur</title>
    <!-- Favicon icon -->
    <link href="{{ asset('quixlab') }}/images/favicon.png" rel="icon" type="image/png" sizes="16x16">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('quixlab') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('select2/bootstrap.select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('quixlab') }}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css">
    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" crossorigin="anonymous"></script>
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
        @include('layouts.donatur.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.donatur.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            @yield('content')
            
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.donatur.footer')
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

    <script src="{{ asset('dataTables/jquery.validate.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
    <script src="{{ asset('select2/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('quixlab') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('quixlab') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('quixlab') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    @yield('modals')


</body>

</html>