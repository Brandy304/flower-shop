<?php

nnamespace App\Http\Controllers;

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
        $flowers = Flower::all();  // 或者你可以使用分页：Flower::paginate(10);

        // 检查是否成功获取花卉数据
        if ($flowers->isEmpty()) {
            \Log::info('No flowers found in the database.');
        }

        // 返回用户仪表盘视图并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}
