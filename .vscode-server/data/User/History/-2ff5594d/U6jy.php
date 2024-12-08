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
        // 检查用户是否已登录
        if (!auth()->check()) {
            // 如果用户没有登录，重定向到登录页面
            return redirect()->route('login');
        }

        // 使用 Spatie 的 hasRole 方法检查用户是否具有指定的角色
        if (!auth()->user()->hasRole($role)) {
            // 如果用户的角色不匹配，重定向到首页或其他页面
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        // 如果角色匹配，允许请求继续
        return $next($request);
    }
}

