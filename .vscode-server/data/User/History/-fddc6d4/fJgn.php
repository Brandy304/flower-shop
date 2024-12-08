<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandyController extends Controller
{
    // 加载 WelcomeBrandy.blade.php 页面
    public function showwelcomeBrandy()
    {
        return view('welcomeBrandy');  // 加载 resources/views/WelcomeBrandy.blade.php 视图
    }
}
public function showFlowerShop()
{
    return view('flowershop.index');  // 渲染 resources/views/flowershop/index.blade.php
}
