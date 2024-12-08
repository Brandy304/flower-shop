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
                return redirect()->route('admin-dashboard');  // 重定向到管理员仪表盘
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');  // 重定向到花店仪表盘
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');  // 重定向到普通用户仪表盘
            } else {
                return redirect()->route('default-dashboard');  // 重定向到默认仪表盘
            }
        }

        // 如果用户没有登录，则继续处理请求，确保返回 RedirectResponse 类型
        return response()->redirectTo($request->url());  // 通过 redirectTo 保证返回 RedirectResponse
    }
}
