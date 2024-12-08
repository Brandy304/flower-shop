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
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');  // 返回重定向响应
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');  // 返回重定向响应
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');  // 返回重定向响应
            } else {
                return redirect()->route('default-dashboard');  // 返回重定向响应
            }
        }

        // 如果用户没有登录，继续处理请求
        return $next($request);  // 继续执行请求，返回正常的响应
    }
}
