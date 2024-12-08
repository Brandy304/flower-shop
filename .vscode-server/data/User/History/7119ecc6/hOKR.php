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
        // Get the currently authenticated user
        $user = Auth::user();

        // Redirect to the corresponding dashboard based on the user's role
        if ($user->role === 'admin') {
            return view('admin.dashboard');  // 管理员仪表盘视图
        }

        if ($user->role === 'florist') {
            return view('florist.dashboard');  // 花店仪表盘视图
        }

        if ($user->role === 'user') {
            return view('user.dashboard');  // 普通用户仪表盘视图
        }

        // If the user role is not matched, load the default dashboard
        return view('default.dashboard');  // 默认仪表盘视图
    }
}
