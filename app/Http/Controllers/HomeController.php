<?php

namespace App\Http\Controllers;

use App\Models\Hero;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::latest()->first();
        return view('welcome', compact('hero'));
    }
}
