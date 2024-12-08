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
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for logged-in users.
     */
    public function create(): View
    {
        // 仅登录用户可以访问注册页面
        return view('auth.register');
    }

    /**
     * Handle the registration request for creating a new user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 验证输入
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', \Illuminate\Validation\Rule::in(['user', 'admin', 'florist'])],
        ]);

        // 创建新用户
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 为新用户分配角色
        $user->assignRole($request->role);

        // 触发用户注册事件
        event(new Registered($user));

        // 登录该用户
        Auth::login($user);

        // 重定向到仪表盘或其他页面
        return redirect(RouteServiceProvider::HOME);  // 可以调整为其他页面如 dashboard
    }
}
