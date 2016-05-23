<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Propietario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if(Auth::check()) {
            switch (Auth::user()->id_tipo_usuario) {
                #Administrador
                case '1':
                    return redirect('admin');
                    break;
                #Usuario
                case '2':
                     return redirect('usuario');
                    break;
                #Propietario
                case '3':
                   
                    break;
                #Vendedor
                case '4':
                    return redirect('vendedor');
                    break;
                
                default:
                   return  'hola A';
                    break;
            }
        }
        return $next($request);
    }
}
