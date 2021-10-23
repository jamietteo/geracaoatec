<?php

namespace App\Http\Middleware;

use Closure;

class GestorTecnica
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
        if(\Auth::user()->role_id == '2' || \Auth::user()->role_id == '1'){
            return $next($request);
        }
        else{
            return back()->with('error', 'Não tem permissão para executar essa ação!');
        }
    }
}
