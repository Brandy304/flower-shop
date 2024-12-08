<?php
namespace App\Http\Controllers;

use App\Models\Flower; // 引入 Flower 模型
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // 获取所有花卉数据
        $flowers = Flower::all();
        
        // 调试，查看是否获取到数据
        dd($flowers); 
    
        // 返回视图，并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}