<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 将首页恢复为 welcome 视图
Route::get('/', function () {
    return view('welcome');
});

// 登录后访问 dashboard 页面，使用 DashboardController
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 用户个人资料管理路由
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 管理员仪表盘页面
Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', function () {
    return view('admin-dashboard');  // 管理员仪表盘视图
})->name('admin-dashboard');

// 花店仪表盘页面
Route::middleware(['auth', 'role:florist'])->get('/florist-dashboard', function () {
    return view('florist-dashboard');  // 花店仪表盘视图
})->name('florist-dashboard');

// 普通用户仪表盘页面
Route::middleware(['auth', 'role:user'])->get('/user-dashboard', function () {
    return view('user-dashboard');  // 普通用户仪表盘视图
})->name('user-dashboard');

// 默认仪表盘（如果用户的角色不匹配任何已定义角色）
Route::middleware(['auth'])->get('/default-dashboard', function () {
    return view('default-dashboard');  // 你可以自定义这个视图
})->name('default-dashboard');

// 其他身份验证相关的路由
require __DIR__.'/auth.php';
