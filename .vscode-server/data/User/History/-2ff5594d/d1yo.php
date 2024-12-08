<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // 检查用户是否已登录并且角色匹配
        if (!auth()->check() || auth()->user()->role !== $role) {
            return redirect('/'); // 如果角色不匹配，重定向到首页或其他页面
        }

        return $next($request); // 继续执行请求
    }
}
