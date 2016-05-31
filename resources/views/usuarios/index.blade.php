@extends('layouts.usuario')

@section('tituloModulo') Usuario  <i class="fa fa-home"></i>
@endsection

 @section('contenido')
        <!-- Start Second Row -->
  <div class="row">


    <!-- Start Server Status -->
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-widget" style="height:200px;">
        <div class="panel-title">
          <ul class="panel-tools panel-tools-hover">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">
          <h4>Bienvenido<h4>
         <h5> {{Auth::user()->name}}.</h5>        
        </div>
      </div>
    </div>
     
    
    <!-- End Server Status -->




  </div>
  <!-- End Second Row -->
 @endsection