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

         // 调试打印用户角色
    dd($user->role);  // 这会打印用户角色并停止执行

        // Redirect to the corresponding dashboard based on the user's role
        if ($user->hasRole('admin')) {
            return view('admin-dashboard');  // Loads /resources/views/admin-dashboard.blade.php
        }

        if ($user->hasRole('florist')) {
            return view('florist-dashboard');  // Loads /resources/views/florist-dashboard.blade.php
        }

        if ($user->hasRole('user')) {
            return view('user-dashboard');  // Loads /resources/views/user-dashboard.blade.php
        }

        // If the user role is not matched, load the default dashboard
        return view('default-dashboard');  // Loads /resources/views/default-dashboard.blade.php
    }
}
