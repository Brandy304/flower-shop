<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:florist');  // 只有花店员工才能访问
    }

   // 显示所有花卉
   public function index()
   {
       $flowers = Flower::all();  // 获取所有花卉
       return view('florist-dashboard', compact('flowers'));  // 将花卉数据传递到视图
   }
    // 创建花卉的表单
    public function create()
    {
        return view('flowers.create');
    }

    // 保存花卉信息
    public function store(Request $request)
    {
        // 验证和保存逻辑
    }

    // 编辑花卉
    public function edit(Flower $flower)
    {
        return view('flowers.edit', compact('flower'));
    }

    // 更新花卉
    public function update(Request $request, Flower $flower)
    {
        // 更新逻辑
    }

    // 删除花卉
    public function destroy(Flower $flower)
    {
        $flower->delete();
        return redirect()->route('flowers.index');
    }
}
