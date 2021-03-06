<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>OptiWeb</title>
<!-- Bootstrap and Jquery -->
        <!-- Bootstrap 3.3.5 css -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <!-- Bootstrap 3.3.6  css -->
        {!! Html::style('bootstrap/css/bootstrap-theme.css') !!}
<!-- Token for Ajax -->
        @yield('ajaxToken')
<!-- Style and Fonts -->
<!-- Font Awesome 4.7.0 -->
        {!! Html::style('fontawesome/css/font-awesome.css') !!}
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
<!-- Laravel's Auth Styles and fonts -->
        {!! Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') !!}
<!-- Style sweetAlert -->
        {!! Html::style('sweetalert/css/sweetalert.css') !!}
<!-- style to set some css issues -->
        {!! Html::style('custom/styleissues.css') !!}
<!-- script to print to pdf -->
        {!! Html::script('Xportability/js/xepOnline.jqPlugin.js') !!}
<!-- Css content for every page-->
        @yield('css')
<!-- script to print the date -->
        {!! Html::script('custom/date.js')  !!}
    </head>
    <body id="app-layout" class="hold-transition skin-blue-light sidebar-mini">
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<< inicio >>>>>>>>>>>>>>>>>>> -->
        @if(Auth::check())
        <div class="wrapper">
                <header class="main-header">
<!-- Logo -->
                    <a class="logo" href="{!! url('/home') !!}">
<!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>O</b>W</span>
<!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Opti</b>Web</span>
                    </a>
<!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
                        <a id="bla" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="position: relative; z-index: 1;">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="hidden-xs nav navbar-left" style="padding-top: 15px;">
                                <li>
                                    <span class="text-bold" style="color: #fff"><script>date(); </script></span>
                                </li>
                        </div>
                        <ul class="nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 15px; padding-right: 60px;">
                                    Bienvenido(a), {{ Auth::user()->name }}
                                    <span class="caret"></span></a>
                                <ul id="dropdownMenu" class="dropdown-menu drop-menu-left" role="menu">
                                    <li><a id="dropdownLogout" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
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
                                    <li><a href="{{ url('/prescription') }}"><i class="glyphicon glyphicon-file"></i> Ingresar receta completa</a></li>
                                    <li><a href="{{ url('/prescription/crystal_contact') }}"><i class="glyphicon glyphicon-file"></i> Solo cristales o contactos</a></li>
                                    <li><a href="{{ url('/prescription/findPrescription') }}"><i class="glyphicon glyphicon-search"></i> Buscar receta</a></li>
                                    <li><a href="{{ url('/prescription/state') }}"><i class="fa fa-check-square-o"></i> Estado recetas</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="glyphicon glyphicon-usd"></i> <span>Ventas de artículos</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('/article_sale') }}"><i class="fa fa-cart-plus"></i> Nueva venta</a></li>
                                    <li><a href="{{ url('/article_sale/list_today') }}"><i class="glyphicon glyphicon-signal"></i> Ventas del día</a></li>
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
                                    <li><a href="{{ url('/repair/find') }}"><i class="fa fa-sign-in"></i> Ingresar reparación</a></li>
                                    <li><a href="{{ url('/repair/repairstate') }}"><i class="fa fa-check-square-o"></i> Estado reparaciones</a></li>
                                    <li><a href="{{ url('/repair/register') }}"><i class="fa fa-plus"></i> Ingresar taller</a></li>
                                    <li><a href="{{ url('/repair/list') }}"><i class="glyphicon glyphicon-search"></i> Listar talleres</a></li>
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
                                    <li><a href="{{ url('/client') }}"><i class="fa fa-plus"></i> Ingresar cliente</a></li>
                                    <li><a href="{{ url('/client/list') }}"><i class="glyphicon glyphicon-file"></i> Lista de clientes</a></li>
                                    <li><a href="{{ url('/client/find') }}"><i class="glyphicon glyphicon-search"></i> Buscar cliente</a></li>
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
                                    <li><a href="{{ url('/product/article') }}"><i class="fa fa-plus"></i> Ingresar nuevo artículo</a></li>
                                    <li><a href="{{ url('/product/frame') }}"><i class="fa fa-plus"></i> Ingresar nuevo armazón</a></li>
                                    <li><a href="{{ url('/product') }}"><i class="glyphicon glyphicon-search"></i> Buscar especies</a></li>
                                    <li><a href="{{ url('/inventory') }}"><i class="fa fa-file"></i> Registro inventario</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-handshake-o"></i> <span>Proveedores</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('/supplier') }}"><i class="fa fa-id-card-o"></i>Ingresar proveedor</a></li>
                                    <li><a href="{{ url('/supplier/show') }}"><i class="glyphicon glyphicon-search"></i>Buscar proveedor</a></li>
                                    <li><a href="{{ url('/supplier/request') }}"><i class="fa fa-envelope"></i>Realizar pedido</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-clock-o"></i> <span>Control de acceso</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('/marcaje') }}"><i class="fa fa-arrow-right"></i>Marcar</a></li>
                                </ul>
                            </li>
                        @if(Auth::user()->user_type_id == 2)
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user-plus"></i> <span>Administrar usuarios</span>
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('/user/register') }}"><i class="fa fa-plus"></i>Ingresar usuario</a></li>
                                    <li><a href="{{ url('/user/show') }}"><i class="glyphicon glyphicon-search"></i>Buscar usuario</a></li>
                                    <li><a href="{{ url('/user/find') }}"><i class="fa fa-unlock-alt"></i>Activar/Desactivar cuenta</a></li>
                                </ul>
                            </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> <span>Reportes</span>
                                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ url('/report/client_list') }}"><i class="fa fa-file-excel-o"></i>Cartera de clientes</a></li>
                                        <li><a href="{{ url('/report/month_sales') }}"><i class="fa fa-file-excel-o"></i>Ventas del mes</a></li>
                                        <li><a href="{{ url('/report/annual_sales') }}"><i class="fa fa-file-excel-o"></i>Venta anual</a></li>
                                        <li><a href="{{ url('/report/month_access_control') }}"><i class="fa fa-file-excel-o"></i>Control de acceso del mes</a></li>
                                    </ul>
                                </li>
                        @endif
                        <li>
                                <a href="{{ url('/mail') }}">
                                    <i class="fa fa-envelope"></i> <span>Correo</span>

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
                        <ul class="nav navbar-right ">
                            <li><a href="{{ url('/login') }}" style="padding: 15px; padding-right: 60px; padding-left: 50px;">Login</a></li>
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
                </div>
            </div>
<!-- Footer -->
         <footer class="main-footer" style="margin-left:0px; text-align:center;">
                <strong>Todos los derechos reservados &copy; 2017 <a href="http://www.mohfetcorp.cl">Equipo de Desarrollo MohfetCorp</a>.</strong>
            </footer>
        @endif

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

<!-- Scripts -->
<!-- jQuery 2.1.4 -->
        {!! Html::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js') !!}
<!-- Bootstrap 3.3.5 js -->
        {!! Html::script('http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js') !!}
<!-- jQuery UI 1.11.4 -->
        {!! Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}
<!-- script to get the elements from de DOM to print-->
        <script>
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
<!-- Script for ajax token -->
        @yield('ajaxScriptToken')
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
<!-- JS content for every page-->
        @yield('script')
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
<!-- SweetAler script -->
        {!! Html::script('sweetalert/js/sweetalert.min.js') !!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    {!! Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
    {!! Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
<![endif]-->
    </body>
</html>