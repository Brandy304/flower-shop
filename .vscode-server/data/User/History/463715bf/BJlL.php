<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Exception;  // 引入 Exception 类

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): RedirectResponse
    {
        try {
            // 获取当前用户
            $user = Auth::user();

            // 如果用户已经登录，按角色重定向
            if ($user) {
                if ($user->role === 'admin') {
                    return redirect()->route('admin-dashboard');
                } elseif ($user->role === 'florist') {
                    return redirect()->route('florist-dashboard');
                } elseif ($user->role === 'user') {
                    return redirect()->route('user-dashboard');
                } else {
                    return redirect()->route('default-dashboard');
                }
            }

            // 如果用户没有登录，继续处理请求
            return $next($request);

        } catch (Exception $e) {
            // 捕获异常并重定向到 default-dashboard
            // 可以在这里记录日志以便调试
            \Log::error('RedirectIfAuthenticated error: ' . $e->getMessage());
            return redirect()->route('default-dashboard');
        }
    }
}
