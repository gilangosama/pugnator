<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all();
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'testimonial' => 'required|string'
        ]);

        $imagePath = $request->file('image')->store('alumni', 'public');

        Alumni::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'testimonial' => $validated['testimonial']
        ]);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Testimonial alumni berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'testimonial' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($alumni->image);
            // Upload gambar baru
            $validated['image'] = $request->file('image')->store('alumni', 'public');
        }

        $alumni->update($validated);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Data alumni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        
        // Hapus gambar dari storage
        Storage::disk('public')->delete($alumni->image);
        
        // Hapus data dari database
        $alumni->delete();

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Data alumni berhasil dihapus');
    }
} 