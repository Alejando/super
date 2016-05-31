<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tarjeta;
use Session;
use App\User;
use App\Lector;

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
        $tarjetas=Auth::user()->tarjetas;   
        return view('usuarios.tarjetas',compact('tarjetas'));
    }
    
    public function retirarTarjeta(Tarjeta $tarjeta){
        $tarjeta->update(['saldo'=>0]);
        $tarjeta->update(['id_user'=>0]);
        $tarjeta->update(['estado'=>1]);

        return redirect('usuario/tarjetas');

    }
    
    public function cambiarEstadoTarjeta(Tarjeta $tarjeta){
        if($tarjeta->estado==3){
            $tarjeta->update(['estado'=>4]);
        }
        elseif($tarjeta->estado==4){
            $tarjeta->update(['estado'=>3]);
        }
        return redirect('usuario/tarjetas');
    }
    public function registrarTarjeta(Request $data){
        $eTarjeta=$data->input('tarjeta');
        $tarjeta=Tarjeta::where('id_externo',$eTarjeta)->first();
        if(count($tarjeta)!=0){
            $user=Auth::user();
            if($tarjeta->id_user==0){
                $user->saldo=$tarjeta->saldo+$user->saldo;
                $user->save();  
                $tarjeta->id_user=$user->id;
                $tarjeta->estado=3;
                $tarjeta->save();
                foreach ($user->tarjetas as $tarjeta) {
                    $tarjeta->update(['saldo'=>$user->saldo]);
                }
                Session::flash('message','Tarjeta regitrada correctamente con número: '.$eTarjeta);
            }else{
                Session::flash('message','La tarjeta con número: '.$eTarjeta.' ya fue regitrada ');
            }
         
      }else{
        Session::flash('message2','El numero de tarjeta no existe');
      }      
        return redirect('usuario/agregarTarjeta');
    }
    public function agregarTarjeta(){

        return view('usuarios.agregarTarjeta');
    }
    

    


}