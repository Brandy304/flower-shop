<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * 显示登录视图。
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * 处理身份验证请求并根据角色进行重定向。
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 通过凭证进行身份验证
        $request->authenticate();

        // 重新生成会话
        $request->session()->regenerate();

        // 获取当前登录的用户
        $user = Auth::user();

        // 根据角色进行重定向
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');  // 管理员的仪表盘
        }

        if ($user->hasRole('florist')) {
            return redirect()->route('florist.dashboard');  // 鲜花发布者的仪表盘
        }

        // 默认的用户重定向
        return redirect()->intended(RouteServiceProvider::HOME);  // 普通用户的仪表盘
    }

    /**
     * 销毁已认证的会话。
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
