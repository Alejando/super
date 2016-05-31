@extends('layouts.admin')

@section('tituloModulo') Vendedores
@endsection
@section('opciones')
   <a href="{{route('propietariosAdmin')}}" class="btn btn-light">Mostrar Vendedores</a>
@endsection
 @section('contenido')
  <!-- Start Second Row -->
  <div class="row">
    {{-- Start form propietarios --}}
    <div class="col-md-12 col-lg-9">
      <div class="panel panel-widget" style="height:300;">
        <div class="panel-title">
          Agregar Vendedor
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

       <form class="form-horizontal" role="form" method="POST" action="{{ route('guardarVendedor') }}">
        <div class="top">
         {!! csrf_field() !!}  
          
        </div>
        <div class="form-area">
          <div class="form-group">
              <label for="name" class="col-sm-2 control-label form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control form-control-radius" id="name">
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-2 control-label form-label">Correo electrónico</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control form-control-radius" id="email">
              </div>
          </div>
          <div class="form-group">
              <label for="phone" class="col-sm-2 control-label form-label">Telefóno</label>
              <div class="col-sm-10">
                <input type="text" name="phone"  class="form-control form-control-radius" id="phone">
              </div>
          </div>
          
            <div class="pull-right">
              <button type="submit" class="btn btn-success ">Guardar Vendedor</button>
            </div>
        </div>
      </form>
    </div>
  </div>
{{-- End form propietarios --}}



  </div>
  <!-- End Second Row -->

 @endsection


