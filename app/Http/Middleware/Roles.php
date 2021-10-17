<?php

namespace App\Http\Middleware;

use App\Role;
use App\User;
use Closure;

class Roles
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
        if(\Auth::user()->roles()->role_id == '1'){
            return $next($request);
        }
    }
}
