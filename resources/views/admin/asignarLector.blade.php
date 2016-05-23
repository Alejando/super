@extends('layouts.admin')

@section('tituloModulo') Propietarios
@endsection
@section('opciones')
   <a href="{{route('propietariosAdmin')}}" class="btn btn-light">Mostrar Propietarios</a>
@endsection
 @section('contenido')
  <!-- Start Second Row -->
  <div class="row">
    {{-- Start form propietarios --}}
    @if(Session::has('message'))
               <div class="kode-alert kode-alert-icon kode-alert-click alert3">
                    <i class="fa fa-check"></i>
                    <strong> {{ Session::get('message')}} </strong>
                 </div>
        @endif
         @if(Session::has('message2'))
               <div class="kode-alert kode-alert-icon kode-alert-click alert5">
                    <i class="fa fa-warning"></i>
                    <strong> {{ Session::get('message')}} </strong>
                 </div>
        @endif
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-widget" style="height:300;">
        <div class="panel-title">
          Crear nuevo Lector
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div> 
        
          <p>Al crearlo te asignara un número para identidicar el lector</p>
          <div class="group-form">
            <div class="pull-right">
              <a href="{{route('crearNuevoLector',$idUser)}}" class="btn btn-lg btn-primary">Crear Lector</a>
            </div>
          </div>
    </div>
  </div>
  <div class="col-md-12 col-lg-6">
      <div class="panel panel-widget" style="height:300;">
        <div class="panel-title">
          Reasignar Lector
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div> 
          <p>Podras elegir  los lectores que se encuentren desactivados</p>
          <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('reasignarLector') }}">
                 {!! csrf_field() !!}  
                <div class="form-group">
                  <label class="col-sm-2 control-label form-label">Lector</label>
                  <div class="col-sm-10">
                    <select class="selectpicker" name="lector" data-live-search="true">
                     @foreach($lectores as $lector)
                      <option value="{{$lector->id}}">ID: {{$lector->id}} --- Cuota:${{$lector->cuota}}</option>
                     @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{$idUser}}"></input>
                  </div>
                </div>
                <div class="group-form">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary ">Reasignar</button>
                  </div>
                </div>

              </form>

            </div>

    </div>
  </div>
{{-- End form propietarios --}}



  </div>
  <!-- End Second Row -->

 @endsection


