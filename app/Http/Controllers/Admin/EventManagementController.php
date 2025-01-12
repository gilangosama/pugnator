<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventManagementController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $query = Event::query();
        
        if ($status && array_key_exists($status, Event::$statuses)) {
            $query->where('status', $status);
        }
        
        $events = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.events.index', [
            'events' => $events,
            'currentStatus' => $status
        ]);
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'no_whatsapp' => 'required|string',
            'description' => 'required|max:255',
            'date' => 'required|date',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:upcoming,completed'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan ke folder public/storage/events
            $imagePath = $request->file('image')->store('events', 'public');
        }

        Event::create([
            'event_name' => $validated['event_name'],
            'no_whatsapp' => $validated['no_whatsapp'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'deadline' => $validated['deadline'],
            'location' => $validated['location'],
            'image' => $imagePath,
            'status' => $validated['status']
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        
        return view('admin.events.create', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'no_whatsapp' => 'required|string',
            'description' => 'required|max:255',
            'date' => 'required|date',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:upcoming,completed'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            // Cek apakah ada gambar lama
            if ($event->image) {
                // Hapus gambar lama dari storage
                Storage::delete($event->image);
            }
        
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('events');
            $event->image = $imagePath;
        }
        
        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);
            
            // Hapus gambar event jika ada
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            
            // Hapus event
            $event->delete();
            
            return redirect()
                ->route('admin.events.index')
                ->with('success', 'Event berhasil dihapus');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.events.index')
                ->with('error', 'Gagal menghapus event: ' . $e->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Event::$statuses))
        ]);

        $event = Event::findOrFail($id);
        $event->update(['status' => $request->status]);
        
        return back()->with('success', 'Status event berhasil diperbarui');
    }
}