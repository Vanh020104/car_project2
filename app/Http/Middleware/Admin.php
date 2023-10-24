<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // neu chua login -> login
        if(!auth()->check()){
            return redirect()->route("login");
        }
        // neu login r k phai adin thì -> 404
        if(auth()->user()->role != "ADMIN"){
            return abort(404);
        }
        return $next($request);
    }
}
