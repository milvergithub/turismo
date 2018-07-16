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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:title" content="Vide"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
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
@include('vendor.slider')
<div>
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
            <div class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active"></div>
                    <div class="item"></div>
                    <div class="item"></div>
                </div>
            </div>
            <div class="navigation navigation-custom">
                <div class="logo">
                    <h1><a href="/">@lang('home.title')</a></h1>
                </div>
                <div class="navigation-right">
                    <span class="menu"><img src="{{asset('images/menu.png')}}" alt=" "/></span>
                    <nav class="link-effect-3" id="link-effect-3">
                        @include('layouts.submenu')
                    </nav>
                    <!-- script-for-menu -->
                    <script>
                        $("span.menu").click(function () {
                            $("ul.nav1").slideToggle(300, function () {
                                // Animation complete.
                            });
                        });
                    </script>
                    <!-- /script-for-menu -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="">
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
<!--footer-->
<!--copy-->
<div class="copy-section footer-section">
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
