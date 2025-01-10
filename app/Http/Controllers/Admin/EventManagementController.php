<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventManagementController extends Controller
{
    public function index()
    {
        $eventOpens = Event::where('status', 'open')->get();
        $eventClosed = Event::where('status', 'close')->get();
        
        return view('admin.events.index', compact('eventOpens', 'eventClosed'));
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
            'location' => 'required|string|max:50',
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
            'location' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:upcoming,ongoing,completed'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events');
            $event->image = $imagePath;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus');
    }
}