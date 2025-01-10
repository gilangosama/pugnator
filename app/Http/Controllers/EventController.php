<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use App\Models\Review;

class EventController extends Controller
{
    public function index()
    {
        $events = [
            'upcoming' => Event::where('status', 'upcoming')->get(),
            'completed' => Event::where('status', 'completed')->get()
        ];
        
        return view('events.index', compact('events'));
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

        Booking::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'payment_method' => $validated['payment_method'],
            'event_id' => $event->id,
            'user_id' => auth()->id()
        ]);

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
        Review::create([
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'suggestion' => $validated['suggestion'],
            'event_id' => $event->id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('events.show', $id)
            ->with('success', 'Terima kasih atas ulasan Anda!');
    }
} 