<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tarjeta;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;


class TarjetaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tarjetas=Tarjeta::orderBy('id', 'asc')->get();
      foreach ($tarjetas as $tarjeta) {
        $recarga=$tarjeta->recargas->last();
        $pago=$tarjeta->pagos->last();
        if(count($pago)==0){
           $tarjeta->pago='';
        }
        else{
           $tarjeta->pago='$'.$pago->cantidad.' el '.$pago->fecha_pago;
        }
        if(count($recarga)==0){
           $tarjeta->recarga='';
        }
        else{
          $tarjeta->recarga='$'.$recarga->cantidad.' el '.$recarga->fecha_recarga;
        }
        
      }
        return view('admin.tarjetas',compact('tarjetas'));
    }
    public function crearTarjeta()
    {
      return view('admin.crearTarjeta');
    }

    public function guardarTarjeta(Request $requestTarjeta)
    {
      $id_interno=$requestTarjeta->input('tarjeta');
      $id_externo=$this->crearIdExterno($id_interno);
      $tarjeta = new Tarjeta;
      $tarjeta->id_interno=$id_interno;
      $tarjeta->id_externo=$id_externo;
      $tarjeta->saldo=30;
      $tarjeta->estado=1; // estados 1=desactivada 2=activada 3=ligada a una cuenta 4=supendida pero ligada;
      if($tarjeta->save()){
        Session::flash('message','Tarjeta Creada correctamente con número: '.$id_externo);
      }else{
        Session::flash('message2','Error al crear la tarjeta');
      }
      return redirect('admin/tarjetas');
    }
    
    public function crearIdExterno($number){
      $sum = '';
      foreach ( array_reverse(str_split($number)) as $num=>$key) {
         if($num%2==0){
           $sum .=$key;
         }else{
           $sum .=$key*2;
        }
      }
      return $sum;
    }
}