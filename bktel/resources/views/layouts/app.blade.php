<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('Dashboard/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('Dashboard/plugins/chart.js/Chart.min.js') }}" ></script>
    <script src="{{ asset('dist/js/adminlte.js') }}" ></script>
    <script src="{{ asset('dist/js/demo.js') }}" ></script>
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}" ></script>
    
    {{-- <!-- jQuery -->
    <script src="{{ asset('Dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('Dashboard/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('Dashboard/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('Dashboard/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('Dashboard/dist/js/pages/dashboard3.js') }}"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{-- <!-- Font Awesome Icons -->
    <link href="{{ asset('Dashboard/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet"> --}}
    
    {{-- <!-- Theme style -->
    <link href="{{ asset('Dashboard/dist/css/adminlte.min.css')}}" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
