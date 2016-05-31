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
class LectorController extends Controller
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
        $lectores=Lector::orderBy('id', 'asc')->get();

          return view('admin.lectores',compact('lectores'));
    }

    public function cambiarEstadoLector(Lector $lector){
        if($lector->estado==1){
            $lector->update(['estado'=>2]);
        }
        else{
            $lector->update(['estado'=>1]);
        }
        return redirect('admin/lectores');
    }

    public  function crearNuevoLector($id){
       
       $lector= new Lector;
       $lector->id_propietario=$id;
       $lector->estado=1;
       if($lector->save()){
        Session::flash('message','Lector creado correctamente con Id: '.$lector->id);
      }else{
        Session::flash('message2','Error al crear Lector');
      }
       return redirect('admin/asignarLector/'.$id);
    }

   
   public function reasignarLector(Request $request){
        $idUser=$request->input('id');
        $lector=Lector::find($request->input('lector'));
        $lector->id_propietario=$idUser;
        $lector->nombre_conductor="";
        $lector->estado=1;
        $lector->cuota=0;
        $lector->numero_autobus=0;
        if($lector->save()){
            Session::flash('message','Lector con ID: '.$lector->id.' asignado a '.$lector->propietario->name);
        }
        else{
            Session::flash('message2','Error al crear Lector');
        }
        return redirect('admin/asignarLector/'.$idUser);
   }

    


}