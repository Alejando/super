@extends('layouts.usuario')

@section('tituloModulo') Tarjetas  <i class="fa fa-credit-card"></i>
@endsection
@section('opciones')
  <a href="{{route('agregarTarjeta')}}" class="btn btn-light">Agregar Tarjeta</a>
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
                      <th>Id Externo</th>
                      <th>Saldo</th>
                      <th>Estado</th>
                      <th>Acciones</th>  
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Id Externo</th>
                      <th>Saldo</th>
                      <th>Estado</th>
                      <th>Acciones</th>  
                    </tr>
                </tfoot>
             
                <tbody>
                  @foreach ($tarjetas as $tarjeta)
                      <tr >
                        <td>{{$tarjeta->id}}</td>
                        <td>{{$tarjeta->id_externo}}</td>
                        <td>${{$tarjeta->saldo}}</td>
                        @if($tarjeta->estado==3)
                          <td>
                            <a  href="{{route('cambiarEstadoTarjeta',$tarjeta->id)}}" class="btn btn-rounded btn-success">
                              <i class="fa fa-check"></i>
                              Disponible
                            </a>
                          </td>
                        @elseif($tarjeta->estado==4)
                          <td>
                            <a  href="{{route('cambiarEstadoTarjeta',$tarjeta->id)}}" class="btn btn-rounded btn-warning">
                              <i class="fa fa-exclamation-triangle"></i>
                              Suspendida
                            </a>
                          </td>
                        @endif
                        <td>
                            <a  href="{{route('retirarTarjeta',$tarjeta->id)}}" class="btn btn-rounded btn-danger">
                              <i class="fa fa-remove"></i>
                              Eliminar
                            </a>
                          </td>
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
