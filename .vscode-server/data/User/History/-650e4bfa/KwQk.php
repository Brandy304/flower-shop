<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
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
        
        return view('auth.register');
    }

    /**
     * Handle the registration request for creating a new user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', \Illuminate\Validation\Rule::in(['user', 'admin', 'florist'])],
        ]);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        
        $user->assignRole($request->role);

        
        event(new \Illuminate\Auth\Events\Registered($user));

        
        Auth::login($user);

        
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');  
        } elseif ($user->hasRole('florist')) {
            return redirect()->route('florist.dashboard');  
        } else {
            return redirect()->route('user.dashboard');  
        }
    }
}
