<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- CSS CHO PAGE LOGIN OR RESGISTER -->
<!--===============================================================================================-->	
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->

  

    <!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"> -->

    <!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}"> -->


    <!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"> -->
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/hamburgers.min.css') }}"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"> -->
<!--===============================================================================================-->


<!-- CSS CHO PAGE HOME  -->

  <!-- IonIcons -->
 

  <link rel="stylesheet"  href="{{ asset('css/all.css') }}">
  <link rel="stylesheet"  href="{{ asset('css/all.min.css') }}">

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">




    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">





</head>
<body >

<div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav me-auto">
                    </ul> -->
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ms-auto">
                        Authentication Links
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest -->
                    <!-- </ul>
                </div>
            </div>
        </nav> -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
	<!-- AdminLTE -->
	<script src="js/adminlte.js"></script>

	<!-- OPTIONAL SCRIPTS -->

    <script src="js/Chart.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="js/dashboard3.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
