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
        $users = User::all();  // 获取所有用户
        return view('admin-dashboard', compact('users'));  // 返回视图并传递用户数据
    }
}

