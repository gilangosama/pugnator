<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $eventOpens = Event::where('status', 'open')->get();
        $eventClosed = Event::where('status', 'close')->get();
        return view('events.index', compact('eventOpens', 'eventClosed'));
    }

    public function show($id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            abort(404);
        }
        
        return view('events.show', compact('event'));
    }

    public function register($id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            abort(404);
        }
        
        return view('events.register', compact('event'));
    }

    public function registerStore(Request $request, $id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            abort(404);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment_method' => 'required|in:transfer,ewallet,cash'
        ]);

        // Logika penyimpanan data pendaftaran
        // ... 

        return redirect()->route('events.show', $id)
            ->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran.');
    }

    public function review($id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            abort(404);
        }
        
        return view('events.review', compact('event'));
    }

    public function storeReview(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'suggestion' => 'nullable|string'
        ]);

        $event = Event::find($id);
        
        if (!$event) {
            abort(404);
        }

        // Logic untuk menyimpan review
        // ...

        return redirect()->route('events.show', $id)
            ->with('success', 'Terima kasih atas ulasan Anda!');
    }
} 