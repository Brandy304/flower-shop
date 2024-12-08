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
        // 获取当前认证的用户
        $user = Auth::user();

        // 使用 Spatie 的 hasRole() 方法检查角色
        if ($user->hasRole('admin')) {
            return view('admin-dashboard');  // 确保视图路径正确
        }

        if ($user->hasRole('florist')) {
            return view('florist-dashboard');  // 确保视图路径正确
        }

        if ($user->hasRole('user')) {
            return view('user-dashboard');  // 确保视图路径正确
        }

        // 如果角色不匹配，返回默认仪表盘
        return view('default-dashboard');  // 默认仪表盘视图
    }
}
