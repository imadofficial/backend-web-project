<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::latest()->first();
        return view('admin.heroImageModification', compact('hero'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'textLine1' => 'required|string|max:255',
            'textLine2' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'buttonText' => 'required|string|max:255',
            'buttonLink' => 'required|string|max:255',
        ]);

        Hero::create($validated);

        return redirect()->back()->with('success', 'Hero section created successfully!');
    }
}
