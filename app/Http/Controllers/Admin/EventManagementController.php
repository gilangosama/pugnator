<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventManagementController extends Controller
{
    public function index()
    {
        $events = [
            'upcoming' => [
                [
                    'id' => 1,
                    'title' => 'Kejuaraan Karate Nasional',
                    'date' => '2024-03-15',
                    'location' => 'Jakarta Convention Center',
                    'image' => 'img/event1.jpg',
                    'description' => 'Kompetisi karate tingkat nasional',
                    'status' => 'upcoming'
                ]
            ]
        ];
        
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan event
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat');
    }
} 