<?php

namespace App\Http\Controllers\Propietario;

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
        return view('propietarios.index');
    }
   
    public function saldo()
    {
        $lectores=Auth::user()->lectores;
        foreach ($lectores as $lector) {
            $lector->pagos;   
        }     
         return view('propietarios.saldo',compact('lectores'));
       
        
    }


    


}