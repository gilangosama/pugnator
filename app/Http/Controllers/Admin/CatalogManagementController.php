<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CatalogManagementController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Product::query();
        
        if ($category && $category !== 'Semua') {
            $query->where('category', $category);
        }
        
        $products = $query->get();
        
        return view('admin.catalog.index', compact('products'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Simpan gambar dengan nama asli
                $imageName = $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('products', $imageName, 'public');
            }

            Product::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'price' => $validated['price'],
                'stock' => $validated['stock'],
                'image' => $imagePath ?? null,
                'status' => $request->stock > 0 ? 'Tersedia' : 'Habis'
            ]);

            return redirect()->route('admin.catalog.index')
                ->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
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
        try {
            $product = Product::findOrFail($id);
            
            // Hapus gambar dari storage jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            // Hapus data produk
            $product->delete();
            
            return redirect()
                ->route('admin.catalog.index')
                ->with('success', 'Produk berhasil dihapus');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.catalog.index')
                ->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }


}