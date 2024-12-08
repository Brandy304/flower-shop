<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        
        if (!auth()->check()) {
            
            return redirect()->route('login');
        }

        
        if (!auth()->user()->hasRole($role)) {
            
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        
        return $next($request);
    }
}

