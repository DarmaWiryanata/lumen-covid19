<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    
    @yield('css')

  </head>

  <body>
    <div class="page-wrapper">
      @include('header')
      @yield('content')
      @include('footer')
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/waves.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.min.js') }}"></script>

    @yield('js')

    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>
      
  </body>
</html>