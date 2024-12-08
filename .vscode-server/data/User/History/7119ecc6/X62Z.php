<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * 显示根据用户角色的仪表盘。
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 获取当前登录的用户
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

        // 如果没有匹配的角色，返回默认仪表盘视图
        return view('default-dashboard');  // 默认仪表盘视图
    }
}