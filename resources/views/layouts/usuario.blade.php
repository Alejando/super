<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>@yield('titulo', 'Sistema Unico de Pago Electrónico de Rutas')</title>

  <!-- ========== Css Files ========== -->
    <link href="{{asset('css/root.css')}}" rel="stylesheet">

  </head>
  <body>
  <!-- Start Page Loading -->
   <div class="loading"><img src="{{asset('img/loading.gif')}}" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

  	<!-- Start App Logo -->
  	<div class="applogo">
  		<a href="{{route('inicioUsuario')}}" class="logo">SUPER</a>
  	</div>
  	<!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->


    <!-- Start Sidepanel Show-Hide Button -->
    <a href="#sidepanel" class="sidepanel-open-button-mobile"><i class="fa fa-user"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">

   {{--  <li class="link">
      <a href="#" class="notifications">6</a>
    </li>
 --}}
    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/{{ Auth::user()->id_tipo_usuario }}" alt="img"><b>{{ Auth::user()->name }}</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Perfil</li>
          
          <li><a href="{{route('configuracionUsuario')}}"><i class="fa falist fa-gear"></i> Configuración </a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}"><i class="fa falist fa-power-off"></i> Cerrar sesión</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

  <ul class="sidebar-panel nav">
    <li class="sidetitle">Menú</li>
    <li><a href="{{route('saldoUsuario')}}"><span class="icon color5"><i class="fa fa-money"></i></span>Saldo</a></li>
    <li><a href="{{route('recargasUsuario')}}"><span class="icon color7"><i class="fa fa-file-text-o"></i></span>Recargas</a></li>
    <li><a href="{{route('pagosUsuario')}}"><span class="icon color7"><i class="fa fa-book"></i></span>Pagos</a></li>
    <li><a href="{{route('tarjetasUsuario')}}"><span class="icon color7"><i class="fa fa-credit-card"></i></span>Tarjetas</a></li>
    <li><a href="configuracion"><span class="icon color9"><i class="fa fa-user"></i></span>Configuración</a></li>   
  </ul>
  <ul class="sidebar-panel nav">
    <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
  </ul>
</div>
<!-- END SIDEBAR -->
<!-- START CONTENT -->
<div class="content">
  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">@yield('tituloModulo', 'Plantilla')</h1>
    <!-- Start Page Header Right Div -->
   
      <div class="right">
        <div class="btn-group" role="group" aria-label="...">
          @yield('opciones', '<a href="index.html" class="btn btn-light">Dashboard</a>')
          
          
        </div>
      </div>
    <!-- End Page Header Right Div -->
  </div>
  <!-- End Page Header -->
<!-- START CONTAINER -->
    <div class="container-default">

      @yield('contenido', '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>')

<!--Aqui va el código que contendra-->
    </div>
<!-- END CONTAINER -->
</div>
<!-- End Content -->
<!-- START SIDEPANEL -->
<div role="tabpanel" class="sidepanel">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Start perfil -->
   <img src="img/profileimg.png" alt="img" class="icon profile">
      <ul class="list-w-title">
         <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/{{ Auth::user()->foto }}" alt="img"><b>{{ Auth::user()->name }}</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Perfil</li>
          <li><a href="#"><i class="fa falist fa-inbox"></i> Mensajes <span class="badge label-danger">4</span></a></li>
          <li><a href="#"><i class="fa falist fa-gear"></i> Configuración </a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}"><i class="fa falist fa-power-off"></i> Cerrar sesión</a></li>
        </ul>
      </ul>
    <!-- End perfil -->
  </div>
</div>
<!-- END SIDEPANEL -->


<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>

@yield('scripts')


</body>
</html>