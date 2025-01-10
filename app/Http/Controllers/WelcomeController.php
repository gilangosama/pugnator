<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Event;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::where('status', 'Tersedia')->get(),
            'completed' => Event::where('status', 'completed')->take(3)->get()
        ];

        return view('welcome', compact('data'));
    }
} 