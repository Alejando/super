@extends('layouts.usuario')

@section('tituloModulo') Configurar Cuenta
@endsection
@section('opciones')
  <a href="{{route('tarjetasUsuario')}}" class="btn btn-light">Mostrar Tarjetas</a>
@endsection
 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


        @if(Session::has('message'))
               <div class="kode-alert kode-alert-icon kode-alert-click alert3">
                    <i class="fa fa-check"></i>
                    <strong> {{ Session::get('message')}} </strong>
                 </div>
        @endif
         @if(Session::has('message2'))
               <div class="kode-alert kode-alert-icon kode-alert-click alert5">
                    <i class="fa fa-danger"></i>
                    <strong> {{ Session::get('message2')}} </strong>
                 </div>
        @endif

<div class="col-md-12 col-lg-9">
      <div class="panel panel-default">

        <div class="panel-title">
         ¡Informacion necesaria!
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
            <h4>Registra tu tarjeta para porder utilizar el servicio!</h4>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('registrarTarjeta') }}">
                 {!! csrf_field() !!}  
                <div class="group{{ $errors->has('tarjeta') ? ' has-error' : '' }}">
                  <label class="col-sm-2 control-label form-label">Tarjeta</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="16 digitos"name="tarjeta">
                  </div>
                   @if ($errors->has('tarjeta'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tarjeta') }}</strong>
                        </span>
                    @endif
                </div>
                 <br></br>
               
                 <br></br>
                <div class="group-form">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success ">Guardar</button>
                  </div>
                </div>

              </form>

            </div>

      </div>
    </div>

  </div>
  <!-- End Second Row -->


 @endsection