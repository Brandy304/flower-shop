<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:florist');  
    }

    
    public function index()
    {
        $flowers = Flower::all();  
        return view('flowers.index', compact('flowers'));  
    }

    
    public function create()
    {
        return view('flowers.create');
    }

    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        
        $imagePath = null;
        if ($request->hasFile('image')) {
            
            $imagePath = $request->file('image')->store('flowers', 'public');
        }

        
        Flower::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        
        return redirect()->route('flowers.index')->with('success', 'Flower created successfully!');
    }

    
    public function edit(Flower $flower)
    {
        return view('flowers.edit', compact('flower'));
    }

    
    public function update(Request $request, Flower $flower)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('flowers', 'public');
            $flower->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $imagePath,
            ]);
        } else {
            
            $flower->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
            ]);
        }

        
        return redirect()->route('flowers.index')->with('success', 'Flower updated successfully!');
    }

    
    public function destroy(Flower $flower)
    {
        
        $flower->delete();

        
        return redirect()->route('flowers.index')->with('success', 'Flower deleted successfully!');
    }
}
