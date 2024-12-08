<?php

namespace App\Http\Controllers;

use App\Models\Flower; // 引入 Flower 模型
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // 构造函数：只允许认证用户访问 Dashboard
    public function __construct()
    {
        $this->middleware('auth');  // 只允许已认证的用户访问
    }

    // 显示 Dashboard 页面，获取所有花卉数据
    public function index()
    {
        // 获取所有花卉数据
        $flowers = Flower::all();

        // 返回 dashboard 视图，并将花卉数据传递给视图
        return view('dashboard', compact('flowers'));
    }
}
