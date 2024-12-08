<?php
namespace App\Http\Controllers;

use App\Models\Flower; // 引入 Flower 模型
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // 只有经过身份验证的用户才能访问这些方法
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user(); 
        // 获取所有花卉数据
        $flowers = Flower::all();
        
        // 调试，查看是否获取到数据
        dd($flowers); 
    
        // 返回视图，并传递花卉数据
        return view('user-dashboard', compact('flowers'));
    }
}