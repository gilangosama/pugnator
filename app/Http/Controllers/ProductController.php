<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Penjualan;
use App\Models\Order;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['purchase']);
    }

    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->category && $request->category !== 'Semua') {
            $query->where('category', $request->category);
        }
        
        $products = $query->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function purchase(Request $request, $id)
    {
        $validated = $request->validate([
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($id);
        
        try {
            // Buat order baru
            $order = Order::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'size' => $validated['size'],
                'quantity' => $validated['quantity'],
                'total_price' => $product->price * $validated['quantity'],
                'status' => 'paid'
            ]);

            return view('products.purchase-success', [
                'product' => $product,
                'size' => $validated['size'],
                'quantity' => $validated['quantity'],
                'order' => $order
            ]);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
} 