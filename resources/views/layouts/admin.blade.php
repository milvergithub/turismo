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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:title" content="Vide"/>
    <!---->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>


    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/funtion.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>
    <!---->
    <link href="{{ asset('/dropzone/dropzone.css') }}" rel="stylesheet">
    <script src="{{ asset('/dropzone/dropzone.js') }}"></script>
    @stack('scriptshead')
</head>
<body>
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
        <div class="container-fluid">

            <div class="navigation">
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


        </div>
    </div>
</div>
<!--banner-->
<!--content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <nav class="navbar navbar-default sidebar" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Navegacion</span>

                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('home') }}">@lang('home.home')<span
                                            style="font-size:16px;"
                                            class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a>
                            </li>
                            <li><a href="{{ route('usuario.index') }}">@lang('home.users') <span
                                            class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                            </li>
                            <li><a href="{{ route('roles.index') }}">@lang('home.roles') <span
                                            class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                            </li>

                            <li><a href="{{ route('lugaresturisticos.index') }}">@lang('home.touristPlaces')<span
                                            style="font-size:16px;"
                                            class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}">
                                    @lang('home.blog')
                                    <span style="font-size:16px;"
                                          class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10 col-md-10">
            @yield('content')
        </div>
    </div>
</div>
<!--footer-->
<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>@lang('resource.aboutus')</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>El Camino Real</li>
                    <li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i>1 599-033-5036</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:example@mail.com"> example@mail.com</a></li>
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
            <p>&copy; @lang('resource.copyright')</p>
        </div>
    </div>
</div>
@yield('footer')
<!--copy-->
@stack('scripts')
</body>
</html>
