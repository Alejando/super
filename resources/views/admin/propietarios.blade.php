@extends('layouts.admin')

@section('tituloModulo') Propietarios
@endsection
@section('opciones')
  <a href="{{route('crearPropietario')}}" class="btn btn-light">Agregar propietario</a>
@endsection
 @section('contenido')
  <!-- Start Second Row -->
  <div class="row">

{{-- Start tabla propietarios --}}
     <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Propietarios
        </div>
        <div class="panel-body table-responsive">

            <table id="propietariosTable" class="table display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Lectores Asignados</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Lectores Asignados</th>
                        <th>Acciones</th>

                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($propietarios as $propietario)
                      <tr>
                        <td>{{$propietario->id}}</td>
                        <td>{{$propietario->name}}</td>
                        <td>{{$propietario->phone}}</td>
                        <td>{{$propietario->email}}</td>
                        <td>{{$propietario->dispositivos}}</td>
                        <td> <a href="{{route('asignarLector',$propietario->id)}}" class="btn btn-rounded btn-option4">Asignar Lector</a></td>
                        
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