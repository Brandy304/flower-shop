<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandyController extends Controller
{
    // 加载 WelcomeBrandy.blade.php 页面
    public function showWelcomeBrandy()
    {
        return view('WelcomeBrandy');  // 加载 resources/views/WelcomeBrandy.blade.php 视图
    }
}