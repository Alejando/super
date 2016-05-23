@extends('layouts.propietario')

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
          Pagos
        </div>
        <div class="panel-body table-responsive">

            <table id="table" class="table display ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Conductor</th>
                        <th>Camión</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Cantidad</th>
                      <th>Conductor</th>
                      <th>Camión</th>  
                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($lectores as $lector)
                    @foreach ($lector->pagos as $pago)
                      <tr>
                        <td>{{$pago->id}}</td>
                        <td>{{$pago->fecha_pago}}</td>
                        <td>${{$pago->cantidad}}</td>
                        <td>{{$lector->nombre_conductor}}</td>
                        <td>{{$lector->numero_autobus}}</td>
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
@section('scripts')


<script   src="../js/datatables/datatables.min.js"></script>
    <script>
  $(document).ready(function() {
     $('#table').DataTable();
  } );
</script>

@endsection