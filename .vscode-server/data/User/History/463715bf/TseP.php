<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // 根据用户角色进行重定向
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect()->route('admin-dashboard'); // 假设这是 admin 的路由
                } elseif ($user->role === 'florist') {
                    return redirect()->route('florist-dashboard'); // 假设这是 florist 的路由
                } else {
                    return redirect()->route('default-dashboard'); // 默认重定向，如果角色不匹配
                }
            }
        }

        return $next($request);
    }
}
