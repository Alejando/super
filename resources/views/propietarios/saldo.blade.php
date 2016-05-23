@extends('layouts.propietario')

@section('tituloModulo') Saldo  <i class="fa fa-money"></i>
@endsection
@section('opciones')
  
@endsection
 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


    <!-- Start Server Status -->
    <div class="col-md-12 col-lg-3">
      <div class="panel panel-widget" style="height:200px;">
        <div class="panel-title">
         saldo!
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">
          <h4>{{Auth::user()->name}}<h4>
         <h5>Tu saldo actual es de ${{Auth::user()->saldo}}.</h5>        
        </div>
      </div>
    </div>
    
    
     <div class="col-md-12 col-lg-9">
      <div class="panel panel-widget" style="height:200px;">
        <div class="panel-title">
         Último pago
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">
          <h4>El último pago fue:</h4>
          @foreach($lectores as $lector)
            @foreach($lector->pagos as $key => $pago)
              @if($key==count($lector->pagos)-1)
                <li>Con tu camión: {{$lector->numero_autobus}} (Chofer: {{$lector->nombre_conductor}}), el pago fue de ${{$pago->cantidad}} el día {{$pago->fecha_pago}} </li>
              @endif
            @endforeach   
          @endforeach    
            
        </div>
      </div>
    </div>
    <!-- End Server Status -->




  </div>
  <!-- End Second Row -->
 @endsection