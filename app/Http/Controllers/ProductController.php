<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'title' => 'Tipe Fighter Kids II',
                'image' => 'img/catalog 1.png',
                'description' => 'Quick Dry & Light Fabric',
                'category' => 'Seragam',
                'price' => 250000,
                'stock' => 50,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'details' => 'Baju karate anak dengan bahan berkualitas tinggi, ringan dan nyaman digunakan.',
                'features' => [
                    'Bahan ringan dan breathable',
                    'Cocok untuk anak usia 6-12 tahun',
                    'Tahan lama dan mudah dibersihkan',
                    'Tersedia dalam berbagai ukuran'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Tipe Avanger 90',
                'image' => 'img/Screenshot 2025-01-05 000542.png',
                'description' => 'Avanger Fabric',
                'category' => 'Seragam',
                'price' => 300000,
                'stock' => 30,
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'details' => 'Baju karate dewasa dengan bahan premium yang tahan lama.',
                'features' => [
                    'Bahan premium berkualitas tinggi',
                    'Desain modern dan stylish',
                    'Cocok untuk latihan intensif',
                    'Nyaman dipakai dalam waktu lama'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Tipe Fighter Pro',
                'image' => 'img/Screenshot 2025-01-05 000553.png',
                'description' => 'Professional Grade Material',
                'category' => 'Seragam',
                'price' => 350000,
                'stock' => 25,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'details' => 'Baju karate profesional untuk atlet dengan standar kompetisi.',
                'features' => [
                    'Bahan khusus untuk kompetisi',
                    'Standar WKF approved',
                    'Durabilitas tinggi',
                    'Desain ergonomis'
                ]
            ]
        ];
        
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->getProductById($id);
        
        if (!$product) {
            abort(404);
        }
        
        return view('products.show', compact('product'));
    }

    private function getProductById($id)
    {
        $products = collect($this->index()->getData()['products']);
        return $products->firstWhere('id', (int)$id);
    }

    public function purchase(Request $request, $id)
    {
        $validated = $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = $this->getProductById($id);
        
        if (!$product) {
            abort(404);
        }

        // Logika pembelian
        // ...

        return redirect()->route('products.show', $id)
            ->with('success', 'Pembelian berhasil! Silakan lakukan pembayaran.');
    }
} 