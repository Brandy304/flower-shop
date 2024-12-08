<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        
      // 在 RedirectIfAuthenticated 中间件中，修改为：
if ($user->role === 'admin') {
    return redirect()->route('admin.dashboard');
} elseif ($user->role === 'florist') {
    return redirect()->route('florist.dashboard');
} elseif ($user->role === 'user') {
    return redirect()->route('user.dashboard');
} else {
    return redirect()->route('default-dashboard');  // 默认跳转到 default-dashboard
}
