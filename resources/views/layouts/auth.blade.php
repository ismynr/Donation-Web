
<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('quixlab') }}/images/favicon.png" rel="icon" type="image/png" sizes="16x16">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link href="{{ asset('quixlab') }}/css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    
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

    
    @yield('content')
    

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





