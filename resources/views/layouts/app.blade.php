<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    .
    <link href="{{ asset('css/tagit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui-zendesk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('css/body.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="custom-page-header navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Cacao Venezuela') }}
                    {{--<img src="{{URL::asset("images/LogoCacao.png")}}" style="display: inline-block;">--}}
                    {{--<span style="display: inline-block;">Cacao Venezuela</span>--}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->hasRole('participant'))
                                    <li>
                                        <a href="{{url('misrecetas')}}">
                                            <i class="fa fa-table" aria-hidden="true"></i>
                                            Mis recetas
                                        </a>
                                    </li>
                                @endif
                                    @if(Auth::user()->hasRole('judge') or Auth::user()->hasRole('super_admin'))
                                        <li>
                                            <a href="{{url('admin')}}">
                                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                                                Admin
                                            </a>
                                        </li>
                                    @endif
                                <li>
                                    <a href="{{url('perfiles/' . Auth::id())}}">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        Mi perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('perfiles/changePassword')}}">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        Cambiar contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout')}}">
                                        <i class="fa fa-power-off"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="margin-top-25">

    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer text-center">
        <i class="fa fa-copyright" aria-hidden="true"></i>
        2013 GRUPO MG MEDIA & BTL, C.A. aliados de Concept McCann

        {{--<h3 class="pull-right padding-10">--}}
        {{--<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
        {{--<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
        {{--<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
        {{--</h3>--}}
    </footer>
    {{--<div class="footer white-background">--}}
        {{--<div class="container">--}}
            {{--<h1 class="pull-right">--}}
                {{--<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
                {{--<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
                {{--<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
            {{--</h1>--}}
            {{--<h4 class="text-center">--}}
                {{--<i class="fa fa-copyright" aria-hidden="true"></i>--}}
                {{--2013 GRUPO MG MEDIA & BTL, C.A. aliados de Concept McCann--}}
            {{--</h4>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
<script src="{{asset('js/jquery.cropit.js')}}"></script>
<script src="{{ asset('js/tagit.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {

        var docHeight = $(window).height();
        var footerHeight = $('.footer').height();
        var footerTop = $('.footer').position().top + footerHeight;

        if (footerTop < docHeight) {
            $('.footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
        }
    });
</script>
@yield('after-scripts-end')
</body>
</html>
