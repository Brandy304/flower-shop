<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// 将首页恢复为 welcomeBrandy 视图
Route::get('/', function () {
    return view('welcomeBrandy');  // 恢复你原来设置的首页
});

// 登录页面路由（确保登录路由存在）
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');  // 登录页
Route::post('/login', [AuthenticatedSessionController::class, 'store']);  // 处理登录请求

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

// 注册页面路由（无需 auth 中间件，允许未登录用户访问）
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// 其他身份验证相关的路由
require __DIR__.'/auth.php';
