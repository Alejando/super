<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
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
                    return redirect('vendedor');
                    break;
                
                default:
                    return redirect('login');
                    break;
            }

        }

        return $next($request);
    }
}
