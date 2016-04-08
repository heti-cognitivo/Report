<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <!-- Title -->
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="Cognitivo Paraguay" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url()}}/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url()}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url()}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url()}}/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url()}}/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url()}}/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{url()}}/favicon.ico" />
        @yield('resources')
  </head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-boxed">
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                    {{--<img src="{{url()}}//assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">--}}

                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>
                    <!-- BEGIN INBOX DROPDOWN -->

                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->

                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only"></span>
                        Filtros <i class="icon-logout"> </i>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">
            <!-- BEGIN HEADER SEARCH BOX -->
            <form class="search-form" action="page_general_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu  ">
                <ul class="nav navbar-nav">


                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="javascript:;"> Reportes
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class=" ">
                                <a href="{{url()}}/libro_diario" class="nav-link  "> Libro Diario</a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/libro_iva_compras" class="nav-link  "> Libro Iva Compras </a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/libro_iva_ventas" class="nav-link  "> Libro Iva Ventas </a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/libro_mayor" class="nav-link  "> Libro Mayor </a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/plan_cuenta" class="nav-link  "> Plan de Cuenta</a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/envio_cliente_resumido" class="nav-link  "> Envio Cliente Resumido</a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/envio__cliente_detallado" class="nav-link  "> Envio Cliente Detallado</a>
                            </li>
                            <li class=" ">
                                <a href="{{url()}}/envio_zona_producto" class="nav-link  ">Envio por Zona de Producto</a>
                            </li>


                        </ul>
                    </li>


                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Reportes
                        <small></small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE CONTENT BODY -->
        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="index.html"></a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span></span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">

                @yield('page-content-inner')

                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                    <div class="page-quick-sidebar">

                        <div class="tab-content">
                            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                    <h3 class="list-heading">Filtros</h3>
                                    @include('reportes.filtros')


                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN PRE-FOOTER -->

<!-- END PRE-FOOTER -->
<!-- BEGIN INNER FOOTER -->
<div class="page-footer">
    <div class="container"> 2014 &copy; Metronic by keenthemes.
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>

<script src="{{url()}}/assets/global/plugins/respond.min.js"></script>
<script src="{{url()}}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
        <script src="{{url()}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{url()}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url()}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{url()}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{url()}}/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{url()}}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
