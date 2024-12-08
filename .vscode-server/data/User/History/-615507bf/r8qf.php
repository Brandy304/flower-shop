<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');  // 只有 admin 角色的用户可以访问
    }

    public function index()
    {
        // 获取所有用户及其角色
        $users = User::with('roles')->get();  // 使用 with() 来加载用户角色数据
        return view('admin-dashboard', compact('users'));  // 返回视图并传递用户数据
    }
}
