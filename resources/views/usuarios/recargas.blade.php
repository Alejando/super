@extends('layouts.usuario')

@section('tituloModulo') Recargas  <i class="fa fa-file-text-o"></i>
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
                        <th>Vendedor</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Cantidad</th>
                      <th>Tarjeta</th>
                      <th>Vendedor</th>  
                    </tr>
                </tfoot>
             
                <tbody>
                @foreach ($tarjetas as $tarjeta)
                  @foreach ($tarjeta->recargas as $recarga)

                      <tr >
                        <td>{{$recarga->id}}</td>
                        <td>{{$recarga->fecha_recarga}}</td>
                        <td>${{$recarga->cantidad}}</td>
                        <td>{{$recarga->tarjeta->id_externo}}</td>
                        <td>{{$recarga->vendedor->name}}</td>
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