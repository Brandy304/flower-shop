<?php
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        if ($user) {
            // Check the user's role and redirect accordingly
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'florist') {
                return redirect()->route('florist.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('default-dashboard');  // Default route
            }
        }

        // If no user is authenticated, continue with the request
        return $next($request);
    }
}
