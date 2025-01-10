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
        $event = $this->getEventById($id);
        
        if (!$event) {
            abort(404);
        }
        
        return view('events.register', compact('event'));
    }

    public function registerStore(Request $request, $id)
    {
        $event = $this->getEventById($id);
        
        if (!$event) {
            abort(404);
        }

        // Validasi input
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

        return redirect()->route('events.show', $id)->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran.');
    }

<<<<<<< HEAD
    public function review($id)
    {
        $event = [
            'id' => $id,
            'title' => 'Kejuaraan Karate Nasional',
            'date' => '15 Maret 2024',
            'location' => 'GOR Saparua Bandung',
            'description' => 'Kejuaraan Karate tingkat nasional untuk semua kategori',
        ];
        
        return view('events.review', compact('event'));
    }

    public function storeReview(Request $request, $id)
    {
        // Logic untuk menyimpan review
        return redirect()->route('events.show', $id)->with('success', 'Terima kasih atas ulasan Anda!');
    }

    private function getEventById($id)
=======
    public function store(Request $request)
>>>>>>> dbc65b3ea0475edfd70657c7cdfbc5aee6092d5f
    {
        // Implementasi logika penyimpanan data 
        $validate = $request->validate([
            'event_name' => 'required', 
            'no_whatsapp' => 'required', 
            'description' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);

        return redirect()->route('events.index');
    }   
} 