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
        // 如果用户已经登录，则根据角色重定向到相应的仪表盘
        if (Auth::check()) {
            // 获取当前登录的用户
            $user = Auth::user();

            // 根据用户角色重定向到不同的仪表盘
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');  // 如果是 admin，跳转到 admin-dashboard
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');  // 如果是 florist，跳转到 florist-dashboard
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');  // 如果是 user，跳转到 user-dashboard
            } else {
                // 如果角色是其他类型的用户，跳转到默认的仪表盘
                return redirect()->route('default-dashboard');
            }
        }

        // 如果用户没有登录，则跳转到默认的仪表盘（类似游客模式）
        return redirect()->route('default-dashboard');
    }
}
