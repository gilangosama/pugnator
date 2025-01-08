<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                "title" => "Tipe Fighter Kids II",
                "image" => "img/catalog 1.png",
                "description" => "Quick Dry & Light Fabric",
                "price" => "Rp 250.000",
                "details" => "Baju karate anak dengan bahan berkualitas tinggi, ringan dan nyaman digunakan."
            ],
            [
                "title" => "Tipe Avanger 90",
                "image" => "img/Screenshot 2025-01-05 000542.png",
                "description" => "Avanger Fabric",
                "price" => "Rp 300.000",
                "details" => "Baju karate dewasa dengan bahan premium yang tahan lama."
            ],
            [
                "title" => "Tipe Fighter Pro",
                "image" => "img/Screenshot 2025-01-05 000553.png",
                "description" => "Professional Grade Material",
                "price" => "Rp 350.000",
                "details" => "Baju karate profesional untuk atlet dengan standar kompetisi."
            ]
        ];

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $products = [
            [
                "title" => "Tipe Fighter Kids II",
                "image" => "img/catalog 1.png",
                "description" => "Quick Dry & Light Fabric",
                "price" => "Rp 250.000",
                "details" => "Baju karate anak dengan bahan berkualitas tinggi, ringan dan nyaman digunakan.",
                "features" => [
                    "Bahan ringan dan breathable",
                    "Cocok untuk anak usia 6-12 tahun",
                    "Tahan lama dan mudah dibersihkan",
                    "Tersedia dalam berbagai ukuran"
                ],
                "sizes" => ["S", "M", "L", "XL"]
            ],
            [
                "title" => "Tipe Avanger 90",
                "image" => "img/Screenshot 2025-01-05 000542.png",
                "description" => "Avanger Fabric",
                "price" => "Rp 300.000",
                "details" => "Baju karate dewasa dengan bahan premium yang tahan lama.",
                "features" => [
                    "Bahan premium berkualitas tinggi",
                    "Desain modern dan stylish",
                    "Cocok untuk latihan intensif",
                    "Nyaman dipakai dalam waktu lama"
                ],
                "sizes" => ["M", "L", "XL", "XXL"]
            ],
            [
                "title" => "Tipe Fighter Pro",
                "image" => "img/Screenshot 2025-01-05 000553.png",
                "description" => "Professional Grade Material",
                "price" => "Rp 350.000",
                "details" => "Baju karate profesional untuk atlet dengan standar kompetisi.",
                "features" => [
                    "Bahan khusus standar kompetisi",
                    "Durabilitas tinggi",
                    "Desain ergonomis",
                    "Cocok untuk atlet profesional"
                ],
                "sizes" => ["M", "L", "XL", "XXL"]
            ]
        ];
        
        if (!isset($products[$id])) {
            abort(404);
        }
        
        $product = $products[$id];
        return view('products.show', compact('product'));
    }
} 