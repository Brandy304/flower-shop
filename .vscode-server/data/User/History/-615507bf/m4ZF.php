<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 只有 admin 角色的用户可以访问此控制器
    public function __construct()
    {
        $this->middleware('role:admin');  
    }

    // 显示用户管理界面
    public function index()
    {
        // 获取所有用户，分页查询每次显示 10 个用户
        $users = User::paginate(10);  // 你也可以选择使用 all()，但是分页更好

        // 返回 admin-dashboard 视图，并传递所有用户的数据
        return view('admin-dashboard', compact('users'));
    }
}

