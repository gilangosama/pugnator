<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.catalog.index', compact('products'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $imagePath
        ]);

        return redirect()->route('admin.catalog.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }
} 