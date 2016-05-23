<?php

namespace App\Http\Middleware;

use Closure;

class Vendedor
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
                    return redirect('usuario');
                    break;
                #Propietario
                case '3':
                    return redirect('propietario');
                    break;
                #Vendedor
                case '4':
                    
                    break;
                
                default:
                   //  return redirect()->guest('login');
                   //  break;

                    return  'hola V';
                    break;
            }
        }
        return $next($request);
    }
}
