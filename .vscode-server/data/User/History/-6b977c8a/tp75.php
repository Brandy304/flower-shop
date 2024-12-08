<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|---------------------------------------------------------------------- 
| Web Routes 
|---------------------------------------------------------------------- 
*/

// 首页路由
Route::get('/', function () {
    return view('welcomeBrandy');
});

// 登录后访问 dashboard 页面，使用 DashboardController
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 用户个人资料管理路由
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // 花卉管理的所有路由都放在这里，确保需要用户登录才能访问
    Route::resource('flowers', FlowerController::class);
});

// 管理员仪表盘页面
Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', function () {
    return view('admin-dashboard');  // 这里是管理员仪表盘
})->name('admin.dashboard');

// 花店仪表盘页面
Route::middleware(['auth', 'role:florist'])->get('/florist-dashboard', function () {
    return view('florist-dashboard');  // 这里是花店仪表盘
})->name('florist.dashboard');

// 普通用户仪表盘页面
Route::middleware(['auth', 'role:user'])->get('/user-dashboard', function () {
    return view('user-dashboard');  // 这里是普通用户仪表盘
})->name('user.dashboard');

// 允许已登录的用户访问注册页面并注册新用户（添加角色选择）
Route::middleware('auth')->get('/register', [RegisteredUserController::class, 'create'])->name('register');

// 处理注册表单提交
Route::middleware('auth')->post('/register', [RegisteredUserController::class, 'store']);

// routes/web.php

use App\Http\Controllers\DefaultDashboardController;

Route::get('/default-dashboard', [DefaultDashboardController::class, 'index'])->name('default-dashboard')->middleware('auth');


// 其他身份验证相关的路由
require __DIR__.'/auth.php';
