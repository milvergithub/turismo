<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Turismo</title>
    <!---->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--for-mobile-apps-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:title" content="Vide" />
    <!---->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">

    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/funtion.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <!---->
    <link href="{{ asset('/dropzone/dropzone.css') }}" rel="stylesheet">
    <script src="{{ asset('/dropzone/dropzone.js') }}"></script>
</head>
<body>
<script src="{{ asset('js/jquery.vide.min.js') }}"></script>
<div>
    <div class="">
        <div class="header-top">
            <div class="container">
                <div class="detail">
                    @include('layouts.menu')
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="container">

            <div class="navigation">
                <div class="logo">
                    <h1><a href="index.html">@lang('home.title')</a></h1>
                </div>
                <div class="navigation-right">
                    <span class="menu"><img src="{{asset('images/menu.png')}}" alt=" " /></span>
                    <nav class="link-effect-3" id="link-effect-3">
                     @include('layouts.submenu')
                    </nav>
                    <!-- script-for-menu -->
                    <script>
                        $( "span.menu" ).click(function() {
                            $( "ul.nav1" ).slideToggle( 300, function() {
                                // Animation complete.
                            });
                        });
                    </script>
                    <!-- /script-for-menu -->
                </div>
                <div class="clearfix"></div>
            </div>



        </div>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            @yield('content')
        </div>
    </div>
</div>
<!--footer-->
<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>Acerca de Nosotros</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>El Camino Real</li>
                    <li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i>1 599-033-5036</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com"> example@mail.com</a></li>
                    <li><i class="glyphicon glyphicon-time" aria-hidden="true"></i>08:00 am a 23:00 pm</li>
                </ul>
                <div class="social-icon">
                    <a href="#"><i class="icon"></i></a>
                    <a href="#"><i class="icon1"></i></a>
                    <a href="#"><i class="icon2"></i></a>
                    <a href="#"><i class="icon3"></i></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">

            </div>
            <div class="col-md-3 footer-grid">

            </div>
            <div class="col-md-3 footer-grid">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-->
<!--copy-->
<div class="copy-section">
    <div class="container">
        <div class="footer-top">
            <p>&copy; 2016 Roasting. All rights reserved</p>
        </div>
    </div>
</div>
@yield('footer')
<!--copy-->
@stack('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8vPUF8KLTt3i839_lF9qoDfdDIlvp7aA&libraries=places&callback=initMap"
        async defer></script>
</body>
</html>
