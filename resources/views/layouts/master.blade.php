<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Title -->
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Cognitivo Paraguay"/>

    <!-- Styles -->
   {{-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>--}}
    <link href="{{url()}}/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="{{url()}}/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="{{url()}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/jstree/themes/default/style.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{url()}}/assets/plugins/jstree/themes/default/style.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
    <link href='{{url()}}/assets/plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />


    <link href="{{url()}}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">


    <link href="{{url()}}/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="{{url()}}/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/css/custom.css" rel="stylesheet" type="text/css"/>

 <script src="{{url()}}/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="{{url()}}/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

    <link href="{{url()}}/assets/plugins/jquery-ui/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url()}}/assets/plugins/EasyAutocomplete-1.3.3/easy-autocomplete.min.css" rel="stylesheet" type="text/css"/>
    {{--<link href="{{url()}}/assets/plugins/EasyAutocomplete-1.3.3/easy-autocomplete.themes.min.css" rel="stylesheet" type="text/css"/>--}}

</head>
<body class="page-header-fixed" >



<form class="search-form" action="#" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button">
                        <i class="fa fa-times"></i></button>
                </span>
    </div><!-- Input Group -->
</form><!-- Search Form -->
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="{{url()}}/" class="logo-text"><span>Reportes</span></a>
            </div><!-- Logo Box -->
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                            class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);"
                               class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>

                        <!--
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                        </li>
                        -->

                    </ul>
                    <ul class="nav navbar-nav navbar-right">


                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="{{url()}}" class="dropdown-toggle waves-effect waves-button waves-classic"
                                   data-toggle="dropdown">
                                    <b class="icon-user"><span class="user-name"> {{Auth::user()->name}} <i
                                                    class="fa-angle-down"></i></span></b>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="{{url('edit',Auth::user()->id)}}"><i class="fa fa-user"></i>Perfil</a>
                                    </li>
                                    {{--<li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendario</a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation"><a href="inbox.html"><i--}}
                                                    {{--class="fa fa-envelope"></i>Mensajes<span--}}
                                                    {{--class="badge badge-success pull-right"><!-- number of unread --></span></a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation" class="divider"></li>--}}
                                    {{--<li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Bloquear</a>--}}
                                    {{--</li>--}}
                                    <li role="presentation"><a href="{{url('auth/logout')}}"><i
                                                    class="fa fa-sign-out m-r-xs"></i>Salir</a></li>
                                </ul>
                            </li>
                        @else

                            <li>
                                <a href="{{url('auth/login')}}">
                                    <span><i class="icon-login" tooltip="Login"></i></span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                                        class="fa fa-search"></i></a>
                        </li>


                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">

                </div>
            </div>
            <ul class="menu accordion-menu">

                <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-briefcase"></span>
                        <p>Informes</p><span class="arrow"></span></a>
                    <ul class="sub-menu">

                        <li><a href="{{url()}}/libro_diario" target="_blank">Libro Diario</a></li>
                        <li><a href="#">Libro Mayor</a></li>

                        <li><a href="#">Balance General</a></li>
                        <li><a href="#">Sumas &amp; Saldos</a></li>

                        <li><a href="#">Hechauka Ventas</a></li>
                        <li><a href="#">Hechauka Compras</a></li>
                    </ul>
                </li>


            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->
    <div class="page-inner">
        <div class="page-title">
            <h3>@yield('Title')</h3>
            <div class="page-breadcrumb">
                @yield('breadcrumbs')
            </div>

        </div>

        <div id="main-wrapper" >
            <!-- CONTENT -->
            @yield('content')
        </div>

        <div class="page-footer">
            <p class="no-s">2015 &copy; Cognitivo Paraguay</p>
        </div>
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<nav class="cd-nav-container" id="cd-nav">
    <header>
        <h3>Menu Rápido</h3>
        <a href="#0" class="cd-close-nav">Close</a>
    </header>
    <ul class="cd-nav list-unstyled">
        <li class="cd-selected" data-menu="index">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-dashboard"></i>
                        </span>
                <p>Dashboard</p>
            </a>
        </li>
        <li data-menu="profile">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                <p>Profile</p>
            </a>
        </li>
        <li data-menu="inbox">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                <p>Mailbox</p>
            </a>
        </li>
        <li data-menu="#">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                <p>Tasks</p>
            </a>
        </li>
        <li data-menu="#">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                <p>Settings</p>
            </a>
        </li>
        <li data-menu="calendar">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                <p>Calendar</p>
            </a>
        </li>
    </ul>
</nav>




<!-- Javascripts -->
<script src="{{url()}}/assets/plugins/jquery/jquery-2.1.4.min.js"></script>

<script src="{{url()}}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url()}}/assets/plugins/EasyAutocomplete-1.3.3/jquery.easy-autocomplete.min.js"></script>

<script src="{{url()}}/auxiliar/js/angular.min.js"></script>


<script src="{{url()}}/assets/plugins/pace-master/pace.min.js"></script>
<script src="{{url()}}/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url()}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{url()}}/assets/plugins/switchery/switchery.min.js"></script>
<script src="{{url()}}/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="{{url()}}/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
{{--<script src="{{url()}}/assets/plugins/offcanvasmenueffects/js/main.js"></script>--}}
<script src="{{url()}}/assets/plugins/waves/waves.min.js"></script>
<script src="{{url()}}/assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="{{url()}}/assets/plugins/select2/js/select2.min.js"></script>
<script src="{{url()}}/assets/plugins/jstree/jstree.min.js"></script>
<script src="{{url()}}/assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
<script src="{{url()}}/assets/plugins/moment/moment.js"></script>
<script src="{{url()}}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="{{url()}}/assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>

<script src="{{url()}}/assets/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="{{url()}}/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src='{{url()}}/assets/plugins/fullcalendar/lang-all.js'></script>

<script src="{{url()}}/assets/plugins/summernote-master/summernote.min.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="{{url()}}/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{url()}}/auxiliar/js/jquery.mask.js"></script>
<script src="{{url()}}/assets/js/modern.min.js"></script>
<script src="{{url()}}/assets/js/custom.js"></script>

<script src="{{url()}}/assets/js/pages/form-select2.js"></script>
<script src="{{url()}}/assets/js/pages/jstree.js"></script>
<script src="{{url()}}/assets/js/pages/form-elements.js"></script>
<script src="{{url()}}/assets/js/pages/table-data.js"></script>


{{--<script src="{{url()}}/assets/js/pages/calendar.js"></script>--}}




{{--<script src="{{url()}}/auxiliar/js/ng-infinite-scroll.min.js"></script>--}}
@yield('scripts')

</body>
</html>
