<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // 构造函数，确保只有 Admin 角色的用户可以访问此控制器
    public function __construct()
    {
        $this->middleware('role:admin'); // 使用角色中间件，只有 Admin 才能访问
    }

    // 显示用户列表的仪表盘
    public function index()
    {
        // 获取所有用户数据
        $users = User::all(); // 或者使用分页：User::paginate(10);
        
        // 返回视图并将用户数据传递到视图
        return view('admin-dashboard', compact('users'));
    }
}
