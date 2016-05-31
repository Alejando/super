<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tarjeta;
use Session;
use App\User;
use App\Lector;

use Illuminate\Support\Facades\Auth;
class PropietarioController extends Controller
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
        $propietarios=User::where('id_tipo_usuario',3)->orderBy('id', 'asc')->get();

         foreach ($propietarios as $propietario) {
            $propietario->dispositivos=$propietario->lectores->count();
        }

          return view('admin.propietarios',compact('propietarios'));
    }

    public function crearPropietario(){
        return view('admin.crearPropietario');
    }
    public function guardarPropietario(Request $request){
         $propietario= new User($request->all());
         $propietario->password=bcrypt('propietario');
         $propietario->id_tipo_usuario=3;
         $propietario->save();
         return redirect('admin/propietarios');
    
    }
    public function asignarLector(User $user){
        $lectores=Lector::where('estado',2)->get();
        $idUser=$user->id;
      return view('admin.asignarLector',compact('lectores','idUser'));
    }

    


}