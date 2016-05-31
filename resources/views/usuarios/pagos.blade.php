@extends('layouts.usuario')

@section('tituloModulo') Pagos  <i class="fa fa-book"></i>
@endsection
@section('opciones')
  
@endsection
 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


    {{-- Start tabla propietarios --}}
     <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Lectores
        </div>
        <div class="panel-body table-responsive">

            <table id="propietariosTable" class="table display ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Tarjeta</th>
                        <th>Camión</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Cantidad</th>
                      <th>Tarjeta</th>
                      <th>Camión</th>  
                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($tarjetas as $tarjeta)
                    @foreach ($tarjeta->pagos as $pago)
                      <tr >
                        <td>{{$pago->id}}</td>
                        <td>{{$pago->fecha_pago}}</td>
                        <td>${{$pago->cantidad}}</td>
                        <td>{{$pago->tarjeta->id_externo}}</td>
                        <td>{{$pago->lector->numero_autobus}}</td>
                    </tr>
                    @endforeach
                  @endforeach
                    
                    
                </tbody>
            </table>


        </div>

      </div>
    </div>
{{-- End tabla propietarios --}}




  </div>
  <!-- End Second Row -->
 @endsection
