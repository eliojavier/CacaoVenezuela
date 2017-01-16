<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cacao Venezuela Admin</title>

    {{--<!-- Bootstrap Core CSS -->--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Admin CSS -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome-stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-halflings.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand font" href="#">Cacao Venezuela Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="{{url('admin/participantes')}}"> Participantes</a>
                </li>
                <li>
                    <a href="{{url('admin/recetas')}}"> Recetas</a>
                </li>
                <li>
                    <a href="{{url('admin/jueces')}}"> Jueces</a>
                </li>
                <li>
                    <a href="{{url('admin/criterios')}}"> Criterios</a>
                </li>
                @if (Auth::user()->hasRole('judge'))
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#myvotes"> Mis votaciones <i
                                    class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="myvotes" class="collapse">
                            <li>
                                <a href="{{url('admin/votaciones/realizadas')}}"> <i class="fa fa-check"
                                                                                     aria-hidden="true"></i> Realizadas</a>
                            </li>
                            <li>
                                <a href="{{url('admin/votaciones/pendientes')}}"> <i class="fa fa-exclamation-circle"
                                                                                     aria-hidden="true"></i> Pendientes</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasRole('super_admin'))
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#roles"> Roles <i
                                    class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="roles" class="collapse">
                            <li>
                                <a href="{{url('admin/roles')}}">Gestionar roles</a>
                            </li>
                            <li>
                                <a href="{{url('admin/roles/role-assignment')}}">Asignar/Quitar roles</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#reports"> Reportes <i
                                class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="reports" class="collapse">
                        <li>
                            <a href="{{url('admin/reportes/general')}}">Información general</a>
                        </li>
                        <li>
                            <a href="{{url('admin/reportes/ranking-ingredientes')}}">Ranking ingredientes</a>
                        </li>
                        <li>
                            <a href="{{url('admin/reportes/numero-participantes-por-ciudad')}}">Participantes por
                                ciudad</a>
                        </li>
                        <li>
                            <a href="{{url('admin/reportes/ranking/fase/1')}}">Ranking fase 1</a>
                        </li>
                        <li>
                            <a href="{{url('admin/reportes/ranking/fase/2')}}">Ranking fase 2</a>
                        </li>
                        @if (Auth::user()->hasRole('super_admin'))
                            <li>
                                <a href="{{url('admin/reportes/votaciones/pendientes')}}">Votaciones pendientes</a>
                            </li>
                            <li>
                                <a href="{{url('admin/reportes/votaciones/realizadas')}}">Votaciones realizadas</a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container">
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
<script>
    // Animate loader off screen
    $(window).on('load', function () {
        $(".se-pre-con").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#example').barrating({
            theme: 'fontawesome-stars',
            onSelect: function (value) {
                console.log(value);
                $.post("../../admin/votaciones",
                    {
                        name: "Donald Duck",
                        city: "Duckburg"
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                    });
            }
        });
    });
</script>
@yield('after-scripts-end')
{{--<!-- jQuery -->--}}
{{--<script src="js/jquery.js"></script>--}}

{{--<!-- Bootstrap Core JavaScript -->--}}
{{--<script src="js/bootstrap.min.js"></script>--}}

{{--<!-- Morris Charts JavaScript -->--}}
{{--<script src="js/plugins/morris/raphael.min.js"></script>--}}
{{--<script src="js/plugins/morris/morris.min.js"></script>--}}
{{--<script src="js/plugins/morris/morris-data.js"></script>--}}

</body>

</html>
