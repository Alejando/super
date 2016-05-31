@extends('layouts.admin')

@section('tituloModulo') Vendedores
@endsection
@section('opciones')
  <a href="{{route('vendedoresAdmin')}}" class="btn btn-light">Mostrar vendedores</a>
@endsection
 @section('contenido')
  <!-- Start Second Row -->
  <div class="row">

{{-- Start tabla propietarios --}}
     <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Vendedores
        </div>
        <div class="panel-body table-responsive">

            <table id="vendedoresTable" class="table display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Saldo</th>
                        <th>Acciones</th>

                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($vendedores as $vendedor)
                      <tr>
                        <td>{{$vendedor->id}}</td>
                        <td>{{$vendedor->name}}</td>
                        <td>{{$vendedor->phone}}</td>
                        <td>{{$vendedor->email}}</td>
                        <td>${{$vendedor->saldo}}</td>
                        <td> <a href="{{route('historialRecargasVendedor',$vendedor->id)}}" class="btn btn-rounded btn-option2">Ver historial</a><a href="#" data-toggle="modal" data-target="#agregarSaldo{{$vendedor->id}}" class="btn btn-rounded btn-option4">Agregar Saldo</a></td>
                        <!-- Modal -->
                            <div class="modal fade" id="agregarSaldo{{$vendedor->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Agregar Saldo</h4>
                                  </div>
                                  <form class="form-horizontal" role="form" method="POST" action="{{ route('agregarSaldo',$vendedor->id) }}">
                                  {!! csrf_field() !!}  
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label " class="col-sm-2 control-label form-label">Saldo</label>
                                            <div class="col-sm-10">
                                              <input type="number" name="saldo" class="form-control form-control-radius" id="saldo">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-default">Agregar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                          <!-- End Moda Code -->
                    </tr>
                  @endforeach
                    
                    
                </tbody>
            </table>


        </div>

      </div>
    </div>
{{-- End tabla propietarios --}}
    
 @endsection


@section('scripts')


<script   src="../js/datatables/datatables.min.js"></script>
    <script>
  $(document).ready(function() {
     $('#vendedoresTable').DataTable();
  } );
</script>

@endsection