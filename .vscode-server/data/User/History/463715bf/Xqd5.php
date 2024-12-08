<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // 根据用户角色重定向到不同的仪表盘
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect()->route('admin-dashboard');
                } elseif ($user->role === 'florist') {
                    return redirect()->route('florist-dashboard');
                } else {
                    // 默认重定向到 default-dashboard
                    return redirect()->route('default-dashboard');
                }
            }
        }

        return $next($request);
    }
}
