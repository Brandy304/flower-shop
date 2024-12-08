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
    Route::get('/', [FlowerController::class, 'index'])->name('index');  // 显示所有花卉
    Route::get('/create', [FlowerController::class, 'create'])->name('create');  // 创建花卉表单
    Route::post('/', [FlowerController::class, 'store'])->name('store');  // 保存花卉
    Route::get('/{flower}/edit', [FlowerController::class, 'edit'])->name('edit');  // 编辑花卉
    Route::put('/{flower}', [FlowerController::class, 'update'])->name('update');  // 更新花卉
    Route::delete('/{flower}', [FlowerController::class, 'destroy'])->name('destroy');  // 删除花卉
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

Route::resource('flowers', FlowerController::class);

// 其他身份验证相关的路由
require __DIR__.'/auth.php';
