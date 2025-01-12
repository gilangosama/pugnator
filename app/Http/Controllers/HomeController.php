<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Event;
use App\Models\Alumni;
use App\Models\Documentation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(3)->get();
        $upcomingEvents = Event::where('status', 'upcoming')
                              ->latest()
                              ->take(3)
                              ->get();
        $alumni = Alumni::latest()->take(3)->get();
        $documentations = Documentation::latest()->take(3)->get();

        return view('welcome', [
            'latestProducts' => $latestProducts,
            'upcomingEvents' => $upcomingEvents,
            'alumni' => $alumni,
            'documentations' => $documentations
        ]);
    }
} 