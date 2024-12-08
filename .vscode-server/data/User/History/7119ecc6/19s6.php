<?php

namespace App\Http\Controllers;

use App\Models\Flower; // 引入 Flower 模型

class DashboardController extends Controller
{
    public function __construct()
    {
        // 确保只有已认证用户可以访问 Dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        // 从数据库获取所有花卉数据
        $flowers = Flower::all();

        // 确保将花卉数据传递给视图
        return view('dashboard', compact('flowers'));
    }
}
