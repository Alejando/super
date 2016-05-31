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
class VendedorController extends Controller
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
        $vendedores=User::where('id_tipo_usuario',4)->orderBy('id', 'asc')->get();


          return view('admin.vendedores',compact('vendedores'));
    }

    public function agregarVendedor(){
        return view('admin.agregarVendedor');
    }
    public function guardarVendedor(Request $request){
         $vendedor= new User($request->all());
         $vendedor->password=bcrypt('vendedor');
         $vendedor->id_tipo_usuario=4;
         $vendedor->save();
         return redirect('admin/vendedores');
    
    }
    public function agregarSaldo(User $vendedor, Request $request){
        $vendedor->saldo+=$request->input('saldo');
        if($vendedor->save()){
            Session::flash('message','Saldo agregado correctamente');
        }
        else{
            Session::flash('message2','Error al agregar saldo');
        }

        return redirect('admin/vendedores');
    }

    


}