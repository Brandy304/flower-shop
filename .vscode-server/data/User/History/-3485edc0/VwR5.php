<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\AuthenticSessionController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;


class AuthenticatedSessionController extends Controller
{
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
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('florist')) {
        return redirect()->route('florist.dashboard');
    }

    // 默认的用户重定向
    return redirect()->route('default-dashboard');  // 普通用户的仪表盘
}
}