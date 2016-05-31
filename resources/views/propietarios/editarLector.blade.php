@extends('layouts.propietario')

@section('tituloModulo') Editar Lectores
@endsection
@section('opciones')
<a href="{{route('lectoresPropietario')}}" class="btn btn-light">Mostrar lectores</a>
@endsection
 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


    <!-- Start Server Status -->
    <div class="col-md-12 col-lg-9">
      <div class="panel panel-widget" style="height:300px;">
        <div class="panel-title">
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('guardarLectorPropietario',$lector->id) }}">
            <div class="top">
             {!! csrf_field() !!}  
              
            </div>
            <div class="form-area">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label form-label">Chofer</label>
                  <div class="col-sm-10">
                    <input type="text" name="chofer" class="form-control form-control-radius" id="chofer" value="{{$lector->nombre_conductor}}">
                  </div>
              </div>
              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label form-label">Autobús</label>
                  <div class="col-sm-10">
                    <input type="text" name="autobus" class="form-control form-control-radius" id="autobus" value="{{$lector->numero_autobus}}">
                  </div>
              </div>
              <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label form-label">Cuota</label>
                  <div class="col-sm-10">
                    <input type="number" name="cuota"  class="form-control form-control-radius" step="0.1" id="cuota" value="{{$lector->cuota}}">
                  </div>
              </div>
              <div class="pull-right">
                  <button type="submit" class="btn btn-success ">Guardar propietario</button>
              </div>
          
            </div>
          </form>
          
       
      </div>
    </div>
     
    
    <!-- End Server Status -->




  </div>
  <!-- End Second Row -->
 @endsection