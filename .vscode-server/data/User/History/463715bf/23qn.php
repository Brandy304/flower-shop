<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): RedirectResponse
    {
        // 获取当前用户
        $user = Auth::user();

        // 如果用户已经登录，按角色重定向
        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');  // 管理员仪表盘
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');  // 花店仪表盘
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');  // 普通用户仪表盘
            } else {
                return redirect()->route('default-dashboard');  // 默认仪表盘
            }
        }

        // 用户未登录，继续处理请求
        return $next($request);
    }
}
