@extends('layouts.admin')

@section('tituloModulo') Lectores
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
                        <th>Conductor</th>
                        <th>Autobus</th>
                        <th>Cuota</th>
                        <th>Propietario</th>
                        <th>Estado</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                       <th>Id</th>
                        <th>Conductor</th>
                        <th>Autobus</th>
                        <th>Cuota</th>
                        <th>Propietario</th>
                        <th>Estado</th>
                        
                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($lectores as $lector)
                      <tr >
                        <td>{{$lector->id}}</td>
                        <td>{{$lector->nombre_conductor}}</td>
                        <td>{{$lector->numero_autobus}}</td>
                        <td>${{$lector->cuota}}</td>
                        <td>{{$lector->propietario->name}}</td>
                        @if($lector->estado==1)
                          <td>
                            <a  href="{{route('cambiarEstadoLector',$lector->id)}}" class="btn btn-rounded btn-success">
                              <i class="fa fa-check"></i>
                              Activado
                            </a>
                          </td>
                        @elseif($lector->estado==2)
                           <td>
                            <a href="{{route('cambiarEstadoLector',$lector->id)}}" class="btn btn-rounded btn-danger">
                              <i class="fa fa-remove"></i>
                              Desactivado
                            </a>
                          </td>
                        @endif
                       
                    </tr>
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
     $('#propietariosTable').DataTable();
  } );
</script>

@endsection