
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Turismo</title>
    <!---->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--for-mobile-apps-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:title" content="Vide" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--//for-mobile-apps-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/funtion.js') }}"></script>
    <!---->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
    <!---->
</head>
<body>
<script src="{{ asset('js/jquery.vide.min.js') }}"></script>
<div data-vide-bg="video/tr">
    <div class="banner">
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
            <div class="w3ls_banner_info">
                <h3> {{ trans('welcome.home') }} </h3>
                @lang('welcome.home')
              </div>
        </div>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="content">
    @yield('content')
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
</body>
</html>
