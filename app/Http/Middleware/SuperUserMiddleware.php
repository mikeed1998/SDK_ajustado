<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperUserMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->role_as == '1') {
                return $next($request);
            } else if(Auth::user()->role_as == '0') {
                return redirect('/')->with([
                    'message' => '¡Acceso denegado! ya tienes una cuenta abierta de usuario, cierra sesión y vuelve a intentarlo',
                    'status' => 'danger'
                ]);
            } else {
                return redirect('/')->with([
                    'message' => '¡Acceso denegado! no tienes permisos de administrador',
                    'status' => 'danger'
                ]);
            }
        }
        else
        {
            return redirect('/')->with([
                'message' => 'Inicia sesión primero',
                'status' => 'danger'
            ]);
        }
    }
}
