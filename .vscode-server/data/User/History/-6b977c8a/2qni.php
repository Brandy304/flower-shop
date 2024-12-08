<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
// 首页（显示欢迎页面）
Route::get('/', function () {
    return view('welcomeBrandy');  // 默认欢迎页面
});

// 登录后访问 dashboard 页面，使用 DashboardController
Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 用户个人资料管理路由
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:florist'])->prefix('flowers')->name('flowers.')->group(function () {
 Route::get('/flowers', [FlowerController::class, 'index'])->name('flowers.index');
// web.php 中添加了这个路由定义
Route::get('/flowers/create', [FlowerController::class, 'create'])->name('flowers.create');
Route::post('/flowers', [FlowerController::class, 'store'])->name('flowers.store');
Route::get('/flowers/{flower}/edit', [FlowerController::class, 'edit'])->name('flowers.edit');
Route::put('/flowers/{flower}', [FlowerController::class, 'update'])->name('flowers.update');
Route::delete('/flowers/{flower}', [FlowerController::class, 'destroy'])->name('flowers.destroy');

});

// 角色仪表盘路由
Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', function () {
    return view('admin-dashboard');  // 管理员仪表盘视图
})->name('admin-dashboard');

Route::middleware(['auth', 'role:florist'])->get('/florist-dashboard', function () {
    return view('florist-dashboard');  // 花店仪表盘视图
})->name('florist-dashboard');

Route::middleware(['auth', 'role:user'])->get('/user-dashboard', function () {
    return view('user-dashboard');  // 普通用户仪表盘视图
})->name('user-dashboard');

Route::middleware(['auth'])->get('/default-dashboard', function () {
    return view('default-dashboard');  // 默认仪表盘视图
})->name('default-dashboard');

Route::get('/flowers', [FlowerController::class, 'index'])->name('flowers.index');
Route::post('/flowers', [FlowerController::class, 'store'])->name('flowers.store');


// 其他身份验证相关的路由
require __DIR__.'/auth.php';
