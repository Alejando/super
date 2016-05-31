<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tarjeta;
use App\Lector;
use App\Pago;

use Illuminate\Support\Facades\Auth;
class LectorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function realizarPago(Request $request){
        $idInternoTarjeta= $request->input('tarjeta');
        $idLector=$request->input('lector');
        $tarjeta=Tarjeta::where('id_interno',$idInternoTarjeta)->first();
        $lector=Lector::find($idLector);
        $saldoActual=0;
        if($tarjeta->saldo>=$lector->cuota){
            if($tarjeta->estado==3){
               $user=$tarjeta->usuario;
               $user->saldo-=$lector->cuota;
               $tarjetas=$user->tarjetas;
               foreach ($tarjetas as $tarje) {
                   $tarje->saldo-=$lector->cuota;
                   $tarje->save();
               }
               $saldoActual=$user->saldo;
               $user->save();
            }
            if($tarjeta->estado==2){
                $tarjeta->saldo-=$lector->cuota;
                $saldoActual=$tarjeta->saldo;
                $tarjeta->save();
            }
            if($tarjeta->estado==2 ||$tarjeta->estado==3){
                $pago = new Pago;
                $pago->cantidad=$lector->cuota;
                $pago->fecha_pago=date('Y-m-d H:i:s');
                $pago->id_tarjeta=$tarjeta->id;
                $pago->id_lector=$idLector;
                $pago->save();
                $propietario=$lector->propietario;
                $propietario->saldo+=$lector->cuota;
                $propietario->save();
                return "pago:si, saldo:".$saldoActual;
            }
            else{
                return "pago:no, saldo:".$saldoActual;
            }
        }
        else{
            
            return "pago:no, saldo:".$saldoActual;
        }
       
      
    }
}