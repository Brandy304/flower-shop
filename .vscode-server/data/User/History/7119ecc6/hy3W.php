<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the appropriate dashboard based on the user's role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 获取当前用户
        $user = Auth::user();

        // 根据用户角色重定向到不同的仪表盘
        if ($user->hasRole('admin')) {
            return view('admin-dashboard');  // 管理员仪表盘视图
        }

        if ($user->hasRole('florist')) {
            return view('florist-dashboard');  // 花店仪表盘视图
        }

        if ($user->hasRole('user')) {
            return view('user-dashboard');  // 普通用户仪表盘视图
        }

        // 如果没有匹配的角色，可以返回一个默认页面或错误页面
        return redirect('/home');  // 默认页面
    }
}
