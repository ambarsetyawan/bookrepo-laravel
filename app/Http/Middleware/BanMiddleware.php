<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BanMiddleware
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
        if(Auth::check() && $request->user()->ban_status == 1){
           return redirect('/dashboard');
           
        }
          return $next($request);
    }
}
