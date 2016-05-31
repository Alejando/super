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
class SaldoController extends Controller
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

     public function index(){
        return view('usuarios.index');
    }
   
    public function saldo()
    {
        $tarjetas=Auth::user()->tarjetas;
        // $aRecargas = array();
        // $aPagos= array();
        foreach ($tarjetas as $tarjeta) {
            // if(count($tarjeta->recargas)!=0){
            //     $recargas=$tarjeta->recargas;
            //     $aRecargas=$recargas->last();
            //     $aRecargas->tarjeta=$tarjeta->id_externo;
            // }
            // if(count($tarjeta->pagos)!=0){
            //     $pagos=$tarjeta->pagos;
            //     $aPagos=$pagos->last();
            //     $aPagos->tarjeta=$tarjeta->id_externo;
            // }
            $tarjeta->recargas;
            $tarjeta->pagos;
            
        }
        
        //return $aPagos;
     
         return view('usuarios.saldo',compact('tarjetas'));
       
        
    }

    //  public function saldo()
    // {
    //     $tarjetas=Auth::user()->tarjetas;
    //     // $aRecargas = array();
    //     // $aPagos= array();
    //     foreach ($tarjetas as $tarjeta) {
    //         // if(count($tarjeta->recargas)!=0){
    //         //     $recargas=$tarjeta->recargas;
    //         //     $aRecargas=$recargas->last();
    //         //     $aRecargas->tarjeta=$tarjeta->id_externo;
    //         // }
    //         // if(count($tarjeta->pagos)!=0){
    //         //     $pagos=$tarjeta->pagos;
    //         //     $aPagos=$pagos->last();
    //         //     $aPagos->tarjeta=$tarjeta->id_externo;
    //         // }
    //         $tarjeta->recargas;
    //         $tarjeta->pag
            
    //     }
        
    //     //return $aPagos;
     
    //      return view('usuarios.saldo',compact('aPagos','aRecargas'));
       
        
    // }

    


}