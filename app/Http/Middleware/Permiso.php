<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Permiso
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
        if(Auth::user()->tipo != 1){
            abort(403);
        }

        return $next($request);
    }
}
