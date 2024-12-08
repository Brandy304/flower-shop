<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlowerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcomeBrandy');  
});


Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:florist'])->prefix('flowers')->name('flowers.')->group(function () {
    Route::get('/', [FlowerController::class, 'index'])->name('index');  
    Route::get('/create', [FlowerController::class, 'create'])->name('create');  
    Route::post('/', [FlowerController::class, 'store'])->name('store');  
    Route::get('/{flower}/edit', [FlowerController::class, 'edit'])->name('edit');  
    Route::put('/{flower}', [FlowerController::class, 'update'])->name('update');  
    Route::delete('/{flower}', [FlowerController::class, 'destroy'])->name('destroy');  
});


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin-dashboard')->uses(function () {
        return view('admin-dashboard');  // 指定正确的视图
    });
});

Route::middleware(['auth', 'role:florist'])->get('/florist-dashboard', function () {
    return view('florist-dashboard'); 
})->name('florist-dashboard');

Route::get('/user-dashboard', [UserController::class, 'index'])->name('user-dashboard');


Route::middleware(['auth'])->get('/default-dashboard', function () {
    return view('default-dashboard');
})->name('default-dashboard');



require __DIR__.'/auth.php';
