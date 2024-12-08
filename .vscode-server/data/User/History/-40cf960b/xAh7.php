<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    // 只有花店员工才能访问
    public function __construct()
    {
        $this->middleware('role:florist');  
    }

    // 显示所有花卉
    public function index()
    {
        $flowers = Flower::all();  // 获取所有花卉
        return view('flowers.index', compact('flowers'));  // 将花卉数据传递到视图
    }

    // 创建花卉的表单
    public function create()
    {
        return view('flowers.create');
    }

    // 保存花卉信息
    public function store(Request $request)
    {
        // 验证表单输入
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // 保存图片（如果有上传）
        $imagePath = null;
        if ($request->hasFile('image')) {
            // 存储图片并获取路径
            $imagePath = $request->file('image')->store('flowers', 'public');
        }

        // 创建新花卉并保存到数据库
        Flower::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        // 重定向到花卉列表页面并显示成功消息
        return redirect()->route('flowers.index')->with('success', 'Flower created successfully!');
    }

    // 编辑花卉
    public function edit(Flower $flower)
    {
        return view('flowers.edit', compact('flower'));
    }

    // 更新花卉
    public function update(Request $request, Flower $flower)
    {
        // 验证更新逻辑（你可以继续填写）
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // 如果有新的图片，则替换旧的
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('flowers', 'public');
            $flower->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $imagePath,
            ]);
        } else {
            // 如果没有图片更新，只更新其他字段
            $flower->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
            ]);
        }

        // 重定向到花卉列表页面并显示更新成功消息
        return redirect()->route('flowers.index')->with('success', 'Flower updated successfully!');
    }

    // 删除花卉
    public function destroy(Flower $flower)
    {
        // 删除花卉
        $flower->delete();

        // 重定向回花卉列表页面并显示删除成功消息
        return redirect()->route('flowers.index')->with('success', 'Flower deleted successfully!');
    }
}
