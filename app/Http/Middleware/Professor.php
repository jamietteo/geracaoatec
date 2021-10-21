<?php

namespace App\Http\Middleware;

use Closure;

class Professor
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
        if(\Auth::user()->role_id == '3'){
            return $next($request);
        }
        else{
            return back()->with('error', 'Não tem permissão para executar essa ação!');
        }
    }
}
