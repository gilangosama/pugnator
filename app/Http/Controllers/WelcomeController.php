<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        $katalog = [
            [
                "title" => "Tipe Fighter Kids II",
                "image" => "img/catalog 1.png",
                "description" => "Quick Dry & Light Fabric",
                "link" => "#"
            ],
            [
                "title" => "Tipe Avanger 90",
                "image" => "img/Screenshot 2025-01-05 000542.png",
                "description" => "avanger fabric",
                "link" => "#"
            ],
            // ... data lainnya
        ];

        return view('welcome', compact('katalog'));
    }
} 