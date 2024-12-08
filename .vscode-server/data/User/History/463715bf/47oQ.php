<?php
namespace App\Http\Middleware;



use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse; // 引入 RedirectResponse

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): RedirectResponse // 修改返回类型为 RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist-dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user-dashboard');
            } else {
                return redirect()->route('default-dashboard');
            }
        }

        // If user is not authenticated, continue with the request
        return $next($request);
    }
}

