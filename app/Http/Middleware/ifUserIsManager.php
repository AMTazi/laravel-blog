<?php

namespace App\Http\Middleware;

use Closure;

class ifUserIsManager
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
        if(!$request->user()->isAdmin()){
            return redirect('/home') ;
        } 
        
        return $next($request);
    }
}