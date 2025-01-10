<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Penjualan;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
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
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($product->stock < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        $product->stock -= $validated['quantity'];
        $product->save();



        Penjualan::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'size' => $validated['size'],
            'quantity' => $validated['quantity']
        ]);

        return redirect()->back()->with('success', 'Pembelian berhasil! Silakan lakukan pembayaran');
        return view('admin.catalog.purchases', compact('product'));
    }
} 