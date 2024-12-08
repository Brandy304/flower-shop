<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role; // 引入角色模型

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * 允许已登录用户访问注册页面，并且如果未登录可以正常访问注册页面
     */
    public function create(): View
    {
        // 如果用户已经登录，允许访问注册页面，否则重定向到 dashboard
        if (Auth::check()) {
            // 允许已登录用户访问注册页面
            return view('auth.register'); // 继续返回注册视图
        }
        
        // 如果未登录，则正常显示注册页面
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 验证输入
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', \Illuminate\Validation\Rule::in(['user', 'admin', 'florist'])],  // 验证角色
        ]);

        // 创建用户
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 分配角色
        $user->assignRole($request->role);  // 根据表单中的角色选择分配

        // 触发用户注册事件
        event(new Registered($user));

        // 如果用户未登录，注册后直接登录该用户
        Auth::login($user);

        // 重定向到指定页面
        return redirect(RouteServiceProvider::HOME);  // 重定向到主页或其他页面
    }
}
