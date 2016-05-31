<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Usuario
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
        if (Auth::check()) {
            switch (Auth::user()->id_tipo_usuario) {
                #Administrador
                case '1':
                    return redirect('admin');
                    break;
                #Usuario
                case '2':
                    
                    break;
                #Propietario
                case '3':
                    return redirect('propietario');
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
