<?php
namespace App\Http\Controllers;

use App\Models\Flower; // 引入 Flower 模型
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // 确保是普通用户（假设你有用户角色）
        if (auth()->user()->role !== 'user') {
            return redirect()->route('default-dashboard');  // 如果不是普通用户，重定向
        }
    
        $flowers = Flower::all();  // 获取所有花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}