<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the appropriate dashboard based on the user's role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $user = Auth::user();

        
        if ($user->hasRole('admin')) {
            return view('admin-dashboard');  
        }

        if ($user->hasRole('florist')) {
            return view('florist-dashboard');  
        }

        if ($user->hasRole('user')) {
            return view('user-dashboard');  
        }

        
        return view('default-dashboard');  
    }
}
