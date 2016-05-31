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
class PagoController extends Controller
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
        $lectores=Auth::user()->lectores;
        foreach ($lectores as $lector) {
            $pagos=$lector->pagos->last();
        }
        return view('propietarios.pagos',compact('lectores'));
    }
   
    

    

    


}