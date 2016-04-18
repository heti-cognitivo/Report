<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link href="{{url()}}/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
  <link href="{{url()}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{url()}}/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

  <script src="auxiliar/js/jquery.min.2.1.3.js"></script>
  <script src="js/main.js"></script>
	<title>Informes</title>
</head>
<body>
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
  <ul id="cd-gallery-items" class="cd-container">
    @foreach ($filelist as $file)
		<li>
			<ul class="cd-item-wrapper">
				<li class="cd-item-front"><a href="#0"><img src="{{url()}}/assets/global/img/report.png" alt="Preview image"></a></li>
				<!-- <li class="cd-item-out">...</li> -->
			</ul> <!-- cd-item-wrapper -->

			<div class="cd-item-info">
				<b><a href="#0">{{$file}}</a></b>
			</div> <!-- cd-item-info -->
		</li>
@endforeach

	</ul>
<div class="cd-project-content">
  <div>
    <h2></h2>
    <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, ullam.</em>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
    </p>
    <p>
      Illum quaerat asperiores aliquam voluptate saepe omnis porro excepturi in atque veritatis sapiente ipsam voluptates iste amet deserunt ullam error pariatur, magni consectetur optio nostrum minima dolorum. Soluta animi nihil doloremque ipsa incidunt vitae architecto beatae, maxime libero, dolore corporis vero porro tenetur ipsam modi repudiandae magnam enim, quibusdam sit.
    </p>
    <p>
      Illum quaerat asperiores aliquam voluptate saepe omnis porro excepturi in atque veritatis sapiente ipsam voluptates iste amet deserunt ullam error pariatur, magni consectetur optio nostrum minima dolorum. Soluta animi nihil doloremque ipsa incidunt vitae architecto beatae, maxime libero, dolore corporis vero porro tenetur ipsam modi repudiandae magnam enim, quibusdam sit.
    </p>
  </div>
  <a href="#0" class="close cd-img-replace">Close</a>
</div>
</body>
</html>
