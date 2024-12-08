<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');  // 只有用户角色可以访问
    }

    // 显示用户仪表盘
    public function index()
    {
        // 获取所有花卉数据
        $flowers = Flower::all();  // 或者你可以使用分页，$flowers = Flower::paginate(10);

        // 返回用户仪表盘视图并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}

