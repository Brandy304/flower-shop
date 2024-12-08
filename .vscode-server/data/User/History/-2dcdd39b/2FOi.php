<?php
namespace App\Http\Controllers;

use App\Models\Flower; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user(); 
        
        $flowers = Flower::all();

              
              if($flowers->isEmpty()) {
                
                $flowers = [];
            }
    
        
        
        dd($flowers); 
    
        
        return view('user-dashboard', compact('flowers'));
    }
}