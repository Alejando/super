@extends('layouts.admin')

@section('tituloModulo')Tarjetas
@endsection
@section('opciones')
  <a href="{{route('crearTarjeta')}}" class="btn btn-light">Agregar tarjeta</a>
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
                        <th>Número Externo</th>
                        <th>Saldo </th>
                        <th>Usuario</th>
                        <th>Última Recarga</th>
                        <th>Último Pago</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Número Externo</th>
                        <th>Saldo </th>
                        <th>Usuario</th>
                        <th>Última Recarga</th>
                        <th>Último Pago</th>
                    </tr>
                </tfoot>
             
                <tbody>
                 @foreach ($tarjetas as $tarjeta)
                      <tr >
                        <td>{{$tarjeta->id}}</td>
                        <td>{{$tarjeta->id_externo}}</td>
                        <td>${{$tarjeta->saldo}}</td>
                        @if($tarjeta->id_user!=0)                          
                            <td>{{$tarjeta->usuario->name}}</td>
                        @else
                           <td>Sin usuario registrado</td>
                        @endif
                       <td>{{$tarjeta->recarga}}</td>
                       <td>{{$tarjeta->pago}}</td>
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