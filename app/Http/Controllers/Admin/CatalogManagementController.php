<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogManagementController extends Controller
{
    public function index()
    {
        $katalog = [
            [
                'title' => 'Tipe Fighter Kids II',
                'image' => 'img/catalog 1.png',
                'description' => 'Quick Dry & Light Fabric',
                'category' => 'Seragam',
                'price' => 250000,
                'stock' => 50,
                'status' => 'Tersedia'
            ],
            [
                'title' => 'Tipe Avanger 90',
                'image' => 'img/Screenshot 2025-01-05 000542.png',
                'description' => 'avanger fabric',
                'category' => 'Seragam',
                'price' => 300000,
                'stock' => 30,
                'status' => 'Tersedia'
            ],
        ];
        
        return view('admin.catalog.index', compact('katalog'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan produk
        return redirect()->route('admin.catalog.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Logic untuk menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // Logic untuk update produk
    }

    public function destroy($id)
    {
        // Logic untuk menghapus produk
    }
} 