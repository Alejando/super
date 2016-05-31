<?php
  if(Auth::user()->id_tipo_usuario==1)
  {
    $variable = "layouts.admin";
  }
  elseif(Auth::user()->id_tipo_usuario==2)
  {
    $variable = "layouts.usuario";
  }
  elseif(Auth::user()->id_tipo_usuario==3)
  {
    $variable = "layouts.propietario";
  }
  elseif(Auth::user()->id_tipo_usuario==4)
  {
    $variable = "layouts.vendedor";
  }
?>
@extends("$variable")
@section('tituloModulo')Configuraciones  <i class="fa fa-gear"></i>
@endsection

 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


   @if(Session::has('message'))
       <div class="kode-alert kode-alert-icon kode-alert-click alert3">
            <i class="fa fa-check"></i>
            <strong>{{ Session::get('message')}} </strong>
         </div>
    @endif
   @if(Session::has('message2'))
     <div class="kode-alert kode-alert-icon kode-alert-click alert5" >
          <i class="fa fa-warning"></i>
          <strong>{{ Session::get('message2')}} </strong>
       </div>
  @endif

    <div class="col-md-12 col-lg-6">
      <div class="panel panel-widget" style="height:300px;">
        <div class="panel-title">
        Cambio de Contraseña
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('cambiarContrasena') }}">
            <div class="top">
             {!! csrf_field() !!}  
              
            </div>
            <div class="form-area">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label form-label">Contraseña Actual</label>
                  <div class="col-sm-10">
                    <input type="password" name="beforePassword" class="form-control form-control-radius" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label form-label">Nueva Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" name="newPassword" class="form-control form-control-radius" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label form-label">Confirmar Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" name="passwordConfirmed"  class="form-control form-control-radius" >
                  </div>
              </div>
              <div class="pull-right">
                  <button type="submit" class="btn btn-success ">Cambair contraseña</button>
              </div>
          
            </div>
          </form>
          
       
      </div>
    </div>
     
    
    <!-- End Server Status -->




  </div>
  <!-- End Second Row -->
 @endsection