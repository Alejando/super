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
class RecargaController extends Controller
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

        $tarjetas=Auth::user()->tarjetas;
        foreach ($tarjetas as $tarjeta) {
            $recargas=$tarjeta->recargas;
        }
        return view('usuarios.recargas',compact('tarjetas'));
    }
   
    

    

    


}