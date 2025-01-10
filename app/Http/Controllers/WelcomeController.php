<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Event;
use App\Models\Review;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::where('status', 'Tersedia')->get(),
            'completed' => Event::where('status', 'completed')->take(3)->get(),
            'reviews' => Review::all()
        ];

        return view('welcome', compact('data'));
    }
} 