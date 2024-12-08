<?php
namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse; // 引入 RedirectResponse

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): RedirectResponse // 修改返回类型为 RedirectResponse
    {
        $user = Auth::user();  // 获取当前用户

        // 如果用户已经登录，按角色重定向
        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');  // 重定向到管理员仪表盘
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');  // 重定向到花店仪表盘
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');  // 重定向到普通用户仪表盘
            } else {
                return redirect()->route('default-dashboard');  // 重定向到默认仪表盘
            }
        }

        // 如果用户没有登录，则继续处理请求，允许访问未认证的页面
        // 在这里返回正常的请求处理，确保类型是 Response
        return $next($request);  // 继续处理请求
    }
}
