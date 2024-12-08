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

        // 根据角色返回对应的仪表盘视图
        if ($user->role === 'admin') {
            return view('admin.dashboard');  // 管理员仪表盘视图
        }

        if ($user->role === 'florist') {
            return view('florist.dashboard');  // 花店仪表盘视图
        }

        if ($user->role === 'user') {
            return view('user.dashboard');  // 普通用户仪表盘视图
        }

        // 如果没有匹配到角色，返回默认仪表盘
        return view('default.dashboard');  // 默认仪表盘视图
    }
}
