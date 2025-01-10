<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventManagementController extends Controller
{
    public function index()
    {
        $events = [
            'upcoming' => Event::where('status', 'upcoming')->get(),
            'completed' => Event::where('status', 'completed')->get()
        ];
        
        return view('admin.events.index', compact('events'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:upcoming,ongoing,completed'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

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
        $event = Event::findOrFail($id);
        if ($event->image) {
            Storage::delete('public/' . $event->image);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus');
    }
}