<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');  // 仅用户角色可以访问
    }

    public function index()
    {
        // 获取所有花卉数据
        $flowers = Flower::all();

        // 调试：查看花卉数据
        dd($flowers);  // 打印出来，检查数据是否正确

        // 返回用户仪表盘视图并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}
