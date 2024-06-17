<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DokterAuthValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->get('login')){
            return redirect('dokter/login');
        }

        if($request->session()->get("role") != "dokter"){
            return redirect('dokter/login');
        }
        
        return $next($request);
    }
}
