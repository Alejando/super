<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AppTarjeta;
use App\User;
use Session;
use Hash;
class UserController extends Controller
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
    public function prueba(){
       $user=User::find(3);
       return  $user;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function cambiarContrasena(Request $request){

        $aPass=$request->input('beforePassword');
        $nPass=$request->input('newPassword');
        $cPass=$request->input('passwordConfirmed');
        if(Hash::check($aPass,Auth::user()->password)){
            if($nPass==$cPass){
                Auth::user()->update(['password', 'asda']);
                Session::flash('message','Felicidades tu contraseña se a actualizado!');
            }else{
                Session::flash('message2','La nueva contraseña "'.$nPass. '" no coincide con "'.$cPass.'"');
            }
        }else{
            Session::flash('message2','La contraseña actual no coincide');
        }
    switch (Auth::user()->id_tipo_usuario) {
        case 1:
            return redirect('admin/configuracion');
            break;
        case 2:
            return redirect('usuario/configuracion');
            break;
        case 3:
            return redirect('propietario/configuracion');
            break;
        case 4:
            return redirect('vendedor/configuracion');
            break;
        
        default:
            # code...
            break;
    }
   }
   public function mostrarConfiguracion(){
        return view('configuracion');
   }
   
}