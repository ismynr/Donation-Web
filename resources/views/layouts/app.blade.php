<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MY CRUD | Design Crud Data</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('select2/bootstrap.select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/shards-dashboards.1.1.0.min.css') }}" id="main-stylesheet" data-version="1.1.0">
    <link rel="stylesheet" href="{{ asset('css/extras.1.1.0.min.css') }}">
    <link href="{{ asset('dataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dataTables/dataTables.bootstrap4.min.css') }} " rel="stylesheet">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/fontawesome.kit.js') }}" crossorigin="anonymous"></script>
  </head>

  <body class="h-100">
    
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        @if(Auth::user()->isDonatur())
          @include('usr_donatur.layouts.sidebar')
        @elseif(Auth::user()->isPengurus())
          @include('usr_pengurus.layouts.sidebar')
        @endif

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            @include('layouts.header')

          </div>
          <!-- / .main-navbar -->
          
          @yield('content')

          <!-- Main Footer -->
          @include('layouts.footer')
        </main>
      </div>
    </div>

    
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('dataTables/jquery-validate/1.19.0/jquery.validate.js') }} "></script>
    <script src="{{ asset('dataTables/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('dataTables/dataTables.bootstrap4.min.js')}} "></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/shards.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('js/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('js/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
    <script src="{{ asset('select2/select2.full.min.js')}}" type="text/javascript"></script>

    {{-- @include('layouts.modals') --}}
    
    @yield('modals')
    
  </body>
</html>