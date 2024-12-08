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
        // 检查用户是否已登录并且角色匹配
        if (!auth()->check()) {
            // 如果用户没有登录，重定向到登录页面
            return redirect()->route('login');
        }

        if (auth()->user()->role !== $role) {
            // 如果用户的角色与请求的角色不匹配，重定向到首页或其他页面
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        // 如果角色匹配，允许请求继续
        return $next($request);
    }
}
