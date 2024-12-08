<?php

namespace App\Http\Controllers;

use App\Models\Flower;  // 确保引用了 Flower 模型
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 这个方法渲染用户仪表盘并加载花卉数据
    public function showDashboard()
    {
        // 获取所有花卉数据
        $flowers = Flower::all();

        // 返回视图并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}
