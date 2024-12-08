<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultDashboardController extends Controller
{
    public function index()
    {
        // 返回默认仪表盘视图
        return view('default-dashboard');  // 确保这个视图存在
    }
}
