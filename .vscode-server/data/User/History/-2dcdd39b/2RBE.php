<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 通过中间件限制访问，确保只有登录用户可以查看
    public function __construct()
    {
        $this->middleware('auth');  // 确保用户已登录
    }

    // 显示用户仪表盘
    public function showDashboard()
    {
        // 获取当前登录的用户信息
        $user = Auth::user();

        // 获取所有花卉数据
        $flowers = Flower::all();

        // 返回视图并传递数据
        return view('user-dashboard', compact('user', 'flowers'));
        public function showDashboard()
{
    // 获取所有花卉数据
    $flowers = Flower::all();

    // 返回视图并传递花卉数据
    return view('user-dashboard', compact('flowers'));


    }
}
