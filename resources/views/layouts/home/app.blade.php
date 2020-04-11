@include('layouts.home.header')

  <body>

      @include('layouts.home.nav')
      
      @yield('content')

      @include('layouts.home.footer')

    <script src="{{ asset('charity') }}/js/scripts.min.js"></script>
    <script src="{{ asset('charity') }}/js/main.min.js"></script>
    <script src="{{ asset('charity') }}/js/custom.js"></script>
    
  </body>
</html>