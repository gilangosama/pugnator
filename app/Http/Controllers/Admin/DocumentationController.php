<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::all();
        return view('admin.documentation.index', compact('documentations'));
    }

    public function create()
    {
        return view('admin.documentation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('documentation', 'public');

        Documentation::create([
            'image' => $imagePath
        ]);

        return redirect()->route('admin.documentation.index')
            ->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);
        Storage::disk('public')->delete($doc->image);
        $doc->delete();

        return redirect()->route('admin.documentation.index')
            ->with('success', 'Dokumentasi berhasil dihapus');
    }
} 