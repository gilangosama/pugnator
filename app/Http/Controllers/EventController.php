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
        $event = $this->getEventById($id);
        
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
        
        return view('events.register', [
            'event' => $event,
            'eventId' => $id
        ]);
    }

    public function store(Request $request)
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