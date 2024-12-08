<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated
{
    /**
     * 处理请求。
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // 如果用户已经认证且已登录
        if (Auth::check()) {
            // 获取当前用户
            $user = Auth::user();

            // 根据用户的角色进行重定向
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

        // 用户未认证时，继续处理请求
        return $next($request);
    }
}
