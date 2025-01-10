<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogManagementController extends Controller
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
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        if ($request->stock == 0) {
            $status = 'Habis';
        } else {
            $status = 'Tersedia';
        }

        Product::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'status' => $status
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.catalog.create', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        if ($request->stock == 0) {
            $status = 'Habis';
        } else {
            $status = 'Tersedia';
        }

        $product->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'status' => $status
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();

        return redirect()->route('admin.catalog.index')->with('success', 'Produk berhasil dihapus');
    }


}