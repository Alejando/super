<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('holaArduino','UserController@prueba');
#Rutas Libres
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/',function(){
    	{
           if(Auth::check()){  
                switch (Auth::user()->id_tipo_usuario) {

                    #Administrador
                    case '1':
                       return redirect('admin');
                        break;
                    #Usuario
                    case '2':
                        return redirect('usuario');
                        break;
                    #Propietario
                    case '3':
                        return redirect('propietario');
                        break;
                    #Vendedor
                    case '4':
                        return redirect('vendedor');
                        break;
                    
                    default:
                       return redirect('login');
                        break;
                }
            }
            else{
                return redirect('login');
            }
        
        }
    });

});
#Rutas Web
Route::group(['middleware'=>'web'],function(){



#Ruta Administrador
Route::group(['middleware' => 'administrador','prefix'=>'admin'], function() {
   
        Route::get('/', ['as' => 'inicioAdmin', 'uses' =>'adminController@index']);
        //Tarjetas Administrador
        Route::get('crearTarjeta',['as'=> 'crearTarjeta','uses'=>'Administrador\TarjetaController@crearTarjeta']);
       	Route::get('tarjetas', ['as' => 'tarjetasAdmin', 'uses' =>'Administrador\TarjetaController@index' ]);
       	Route::post('guardarTarjeta',['as' => 'guardarTarjeta', 'uses' => 'Administrador\TarjetaController@guardarTarjeta' ]);
        


       	//Propietarios Administrador
       	Route::get('propietarios',['as'=>'propietariosAdmin', 'uses' => 'Administrador\PropietarioController@index']);
        Route::get('agregarPropietario',['as'=> 'crearPropietario','uses'=>'Administrador\PropietarioController@crearPropietario']);
        Route::post('guardarPropietario',['as'=> 'guardarPropietario','uses'=>'Administrador\PropietarioController@guardarPropietario']);
        Route::get('asignarLector/{user}',['as'=> 'asignarLector','uses'=>'Administrador\PropietarioController@asignarLector'])->where('user', '[0-9]+');

        //Lectores Administrador
        Route::get('lectores',['as'=>'lectoresAdmin', 'uses' => 'Administrador\LectorController@index']);
        Route::get('cambiarEstadoLector/{lector}',['as'=> 'cambiarEstadoLector','uses'=>'Administrador\LectorController@cambiarEstadoLector'])->where('lector', '[0-9]+');
        Route::post('crearLector',['as'=>'crearLector', 'uses' => 'Administrador\LectorController@crearLector']);
        Route::get('crearNuevoLector/{id}',['as'=>'crearNuevoLector', 'uses' => 'Administrador\LectorController@crearNuevoLector'])->where('id', '[0-9]+');
        Route::post('reasignarLector',['as'=>'reasignarLector', 'uses' => 'Administrador\LectorController@reasignarLector']);
    
   
});

#Ruta Usuario
Route::group( ['middleware' => 'usuario','prefix'=>'usuario'], function() {

    Route::get('/', ['as' => 'inicioUsuario', 'uses' =>'Usuario\SaldoController@index']);
    //Rutas Saldo
    Route::get('saldo',['as' => 'saldoUsuario', 'uses' =>'Usuario\SaldoController@saldo']);
    //Rutas Recargas
    Route::get('recargas',['as' => 'recargasUsuario', 'uses' => 'Usuario\RecargaController@index']);
    //Rutas Pagos
    Route::get('pagos',['as' => 'pagosUsuario', 'uses' => 'Usuario\PagoController@index']);
    //Rutas Tarjetas
    Route::get('tarjetas',['as' => 'tarjetasUsuario', 'uses' => 'Usuario\TarjetaController@index']);
    Route::get('cambiarEstadoTarjeta/{tarjeta}',['as' => 'cambiarEstadoTarjeta', 'uses' => 'Usuario\TarjetaController@cambiarEstadoTarjeta'])->where('tarjeta','[0-9]+');
    Route::get('retirarTarjeta/{tarjeta}',['as' => 'retirarTarjeta', 'uses' => 'Usuario\TarjetaController@retirarTarjeta'])->where('tarjeta','[0-9]+');
    Route::post('registrarTarjeta',['as' => 'registrarTarjeta', 'uses' => 'Usuario\TarjetaController@registrarTarjeta']);
    Route::get('agregarTarjeta',['as' => 'agregarTarjeta', 'uses' => 'Usuario\TarjetaController@agregarTarjeta']);

});
#Ruta Propietario

    Route::group(['middleware' => 'propietario','prefix' => 'propietario'], function() {
        //
        Route::get('/', ['as' => 'inicioPropietario', 'uses' =>'Propietario\SaldoController@index']);
         //Rutas Saldo
        Route::get('saldo',['as' => 'saldoPropietario', 'uses' =>'Propietario\SaldoController@saldo']);
         //Rutas Pagos
        Route::get('pagos',['as' => 'pagosPropietario', 'uses' => 'Propietario\PagoController@index']);
         //Rutas Lectores 
        Route::get('lectores',['as' => 'lectoresPropietario', 'uses' => 'Propietario\LectorController@index']);
        Route::get('cambiarEstadoLector/{lector}',['as'=> 'cambiarEstadoLectorPropietario','uses'=>'Propietario\LectorController@cambiarEstadoLector'])->where('lector', '[0-9]+');
        Route::get('mostrarEditarLector/{lector}',['as'=> 'mostrarEditarLector', 'uses'=> 'Propietario\LectorController@mostrarEditarLector'])->where('lector','[0-9]');
        //Route::

    });

#Ruta Vendedor

});


#Rutas lectores
//Route::group(['middleware'=>'lectores'],function(){
    Route::get('realizarPagoLectores','LectorController@realizarPago');



//});