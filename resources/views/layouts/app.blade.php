<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>OptiWeb</title>
<!-- Style and Fonts -->
<!-- Bootstrap 3.3.6 -->
        {!! Html::style('bootstrap/css/bootstrap.min.css') !!}

<!-- Font Awesome -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
<!-- Ionicons -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
<!-- Theme style -->
        {!! Html::style('dist/css/AdminLTE.min.css')!!}
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        {!! Html::style('dist/css/skins/_all-skins.min.css')!!}
<!-- iCheck -->
        {!! Html::style('plugins/iCheck/flat/blue.css')!!}
<!-- Morris chart -->
        {!! Html::style('plugins/morris/morris.css')!!}
<!-- jvectormap -->
        {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css')!!}
<!-- Date Picker -->
        {!! Html::style('plugins/datepicker/datepicker3.css')!!}
<!-- Daterange picker -->
        {!! Html::style('plugins/daterangepicker/daterangepicker.css') !!}
<!-- bootstrap wysihtml5 - text editor -->
        {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        {!! Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
        {!! Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
<![endif]-->
<!-- Laravel's Auth Styles and fonts -->
        {!! Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') !!}

        {!! Html::style('bootstrap/fonts/glyphicons-halflings-regular.eot') !!}
        {!! Html::style('bootstrap/fonts/glyphicons-halflings-regular.svg') !!}
        {!! Html::style('bootstrap/fonts/glyphicons-halflings-regular.ttf') !!}
        {!! Html::style('bootstrap/fonts/glyphicons-halflings-regular.woff') !!}
        {!! Html::style('bootstrap/fonts/glyphicons-halflings-regular.woff2') !!}

        {!! Html::style('bootstrap/css/bootstrap-theme.css') !!}

        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
        <Script Language="JavaScript">
            function date() {
                var hoy = new Date();
                var m = new Array();
                var d = new Array();
                var an = hoy.getUTCFullYear();
                var day = hoy.getDay();
                d[1]="Lunes";d[2]="Martes";d[3]="Miercoles";d[4]="Jueves";d[5]="Viernes";d[6]="Sábado";d[0]="Domingo";
                m[0]="Enero"; m[1]="Febrero"; m[2]="Marzo";
                m[3]="Abril"; m[4]="Mayo"; m[5]="Junio";
                m[6]="Julio"; m[7]="Agosto"; m[8]="Septiembre";
                m[9]="Octubre"; m[10]="Noviembre"; m[11]="Diciembre";
                document.write(d[hoy.getDay()]);
                document.write(" " + hoy.getDate());
                document.write(" de ");
                document.write(m[hoy.getMonth()]);
                document.write(" del " + an);
            }
        </Script>

    </head>
    <body id="app-layout" class="hold-transition skin-blue-light sidebar-mini">
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<< inicio >>>>>>>>>>>>>>>>>>> -->
    @if(Auth::check())
        <div class="wrapper">
            <header class="main-header">
<!-- Logo -->
                <a class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>O</b>W</span>
<!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Opti</b>Web</span>
                </a>
<!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <ul class="nav navbar-left" style="padding-top: 15px;">
                            <li>
                                <span class="text-bold" style="color: #fff"><script>date(); </script></span>
                            </li>
                    </ul>
                    <ul class="nav navbar-right " style="padding-top: 4px; margin-right: 40px">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
<!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
<!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-sunglasses"></i> <span>Recetas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="glyphicon glyphicon-file"></i> Ingresar receta</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Buscar receta</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-usd"></i> <span>Ventas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="glyphicon glyphicon-file"></i> Nueva venta</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-signal"></i> Ventas del día</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-wrench"></i> <span>Reparaciones</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-sign-in"></i> Ingresar reparación</a></li>
                                <li><a href="#"><i class="fa fa-sign-out"></i> Entregar reparación</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Clientes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-plus"></i> Ingresar cliente</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Buscar cliente</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-archive"></i> <span>Inventario</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-plus"></i> Ingresar artículo</a></li>
                                <li><a href="#"><i class="fa fa-plus"></i> Ingresar marco</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-search"></i> Buscar especie</a></li>
                                <li><a href="#"><i class="fa fa-file"></i> Registro inventario</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o"></i> <span>Control de acceso</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-arrow-right"></i> Entrada</a></li>
                                <li><a href="#"><i class="fa fa-arrow-left"></i> Salida</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i> <span>Correo</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-yellow">12</small>
                                    <small class="label pull-right bg-green">16</small>
                                    <small class="label pull-right bg-red">5</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </section>
<!-- /.sidebar -->
            </aside>
<!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
<!-- Content Header (Page header) -->
                <section class="content-header">

                </section>
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Main content >>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                <section class="content">
                    @yield('content')
                </section>
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<</.content >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
            </div>
<!-- /.content-wrapper -->
        </div>
<!-- Footer -->
        <footer class="main-footer">
            <strong>Todos los derechos reservados &copy; 2017 <a href="http://www.mohfetcorp.cl">Equipo de Desarrollo MohfetCorp</a>.</strong>
        </footer>
    @else
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>O</b>W</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Opti</b>Web</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <ul class="nav navbar-left" style="padding-top: 15px;">
                        <li>
                            <span class="text-bold" style="color: #fff"><script>date(); </script></span>
                        </li>
                    </ul>
                    <ul class="nav navbar-right " style="padding-top: 4px; margin-right: 40px">
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </nav>
            </header>
<!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="margin-left: 0px">
 <!-- Content Header (Page header) -->
                <section class="content-header">

                </section>
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Main content >>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                <section class="content">
                    @yield('content')
                </section>
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<</.content >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
            </div>
        </div>
<!-- /.content-wrapper -->
<!-- Footer -->
        <footer class="main-footer" style="margin-left:0px; text-align:center;">
            <strong>Todos los derechos reservados &copy; 2017 <a href="http://www.mohfetcorp.cl">Equipo de Desarrollo MohfetCorp</a>.</strong>
        </footer>
    @endif

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

<!-- Scripts -->
<!-- JavaScripts -->
        {!! Html::script('bootstrap/js/jquery.min.js') !!}
<!-- Bootstrap 3.3.6 -->
        {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
<!-- jQuery 2.2.3 -->
        {!! Html::script('plugins/jQuery/jquery-2.2.3.min.js') !!}
<!-- jQuery UI 1.11.4 -->
        {!! Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
<!-- Morris.js charts -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') !!}
        {!! Html::script('plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
        {!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
        {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
        {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') !!}
        {!! Html::script('plugins/daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
        {!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
        {!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
        {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
        {!! Html::script('plugins/fastclick/fastclick.js') !!}
<!-- AdminLTE App -->
        {!! Html::script('dist/js/app.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {!! Html::script('dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
        {!! Html::script('dist/js/demo.js') !!}
    </body>
</html>
