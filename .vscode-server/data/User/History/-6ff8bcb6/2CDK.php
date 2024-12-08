<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // 默认的全局中间件...
    ];

    protected $routeMiddleware = [
        // 其他路由中间件...
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,  // 确保这个中间件是 'guest'
        // 或者
        'role' => \App\Http\Middleware\RoleMiddleware::class,  // 如果你在这里定义了 'role'
    ];
}
