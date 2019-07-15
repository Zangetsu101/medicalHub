<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/docmenustyles.css')}}">
        
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('css/aos.css')}}">

        <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">

        
        <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/doctortodo.css')}}">
        <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
    </head>
    <body>
        <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
            <div class="container">
                <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                    <div class="col-lg-2 pr-4 align-items-center">
                        <a class="navbar-brand" href="/medicalHub/public">Medical <span>Hub</span></a>
                    </div>
                    <div class="col-lg-10 d-none d-md-block">
                        <div class="row d-flex">
                            <div class="col-md-4 pr-4 d-flex topper align-items-center">
                                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                                <span class="text">West Palashi Campus, ECE Building, Azimpur Road, Dhaka-1205 ,Bangladesh</span>
                            </div>
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>     
                                    <span class="text">Email: anfuad23@gmail.com </span>
                            </div>
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                                <span class="text">Phone: +880-1554352175 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
                </button>
                @guest
                    <p class="button-custom order-lg-last mb-0"><a href="{{ route('login') }}" class="btn btn-secondary py-2 px-3">Login</a></p>
                    @if (Route::has('register'))
                        <p class="button-custom order-lg-last mb-0"><a href="{{ route('register') }}" class="btn btn-secondary py-2 px-3">Register</a></p>
                    @endif
                @else
                <ul class="navbar-nav order-lg-last mb-0">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                @endguest
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('/') }}" class="nav-link pl-0">Home</a></li>
                        <li class="nav-item"><a href="{{ route('doctors.index') }}" class="nav-link">Doctors</a></li>
                        <li class="nav-item"><a href="{{ route('departments.index') }}" class="nav-link">Departments</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		<!-- end nav -->
		
		
    
        @yield('content')
  

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/aos.js')}}"></script>
        <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
        <script src="{{asset('js/scrollax.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{asset('js/google-map.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        
    </body>
</html>
