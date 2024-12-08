<?php

namespace App\Http\Controllers;

use App\Models\Flower;  // 引入 Flower 模型
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function index() {
        // 从数据库中获取所有花卉
        $flowers = Flower::all(); // 使用 Eloquent 获取花卉数据
        return view('flowers.index', compact('flowers')); // 将花卉列表传递给视图
    }

    public function create() {
        return view('flowers.create'); // 返回创建花卉的表单视图
    }

    public function store(Request $request) {
        // 表单数据验证
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        // 存储新花卉
        Flower::create($validated); // 使用 Eloquent 模型创建记录
        return redirect()->route('flowers.index'); // 重定向到花卉列表
    }

    public function show($id) {
        // 获取指定 ID 的花卉
        $flower = Flower::findOrFail($id); // 如果找不到会自动抛出 404 错误
        return view('flowers.show', compact('flower')); // 返回花卉详情视图
    }

    public function edit($id) {
        // 获取指定 ID 的花卉
        $flower = Flower::findOrFail($id);
        return view('flowers.edit', compact('flower')); // 返回编辑视图
    }

    public function update(Request $request, $id) {
        // 表单数据验证
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        // 获取指定 ID 的花卉
        $flower = Flower::findOrFail($id);
        // 更新花卉信息
        $flower->update($validated);
        return redirect()->route('flowers.index'); // 更新后重定向到花卉列表
    }

    public function destroy($id) {
        // 获取指定 ID 的花卉
        $flower = Flower::findOrFail($id);
        // 删除花卉记录
        $flower->delete();
        return redirect()->route('flowers.index'); // 删除后重定向到花卉列表
    }
}
