<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = [
            'upcoming' => [
                [
                    'title' => 'Kejuaraan Karate Nasional',
                    'date' => '2024-03-15',
                    'location' => 'Jakarta Convention Center',
                    'image' => 'img/event1.jpg',
                    'description' => 'Kompetisi karate tingkat nasional untuk semua kategori usia',
                    'status' => 'upcoming',
                    'registration_deadline' => '2024-03-01'
                ],
                // Tambah event upcoming lainnya
            ],
            'ongoing' => [
                [
                    'title' => 'Pelatihan Teknik Dasar Karate',
                    'date' => '2024-02-01',
                    'end_date' => '2024-02-28',
                    'location' => 'Dojo Pugnator',
                    'image' => 'img/event2.jpg',
                    'description' => 'Program pelatihan intensif selama 1 bulan',
                    'status' => 'ongoing'
                ],
                // Tambah event ongoing lainnya
            ],
            'completed' => [
                [
                    'title' => 'Turnamen Regional 2023',
                    'date' => '2023-12-20',
                    'location' => 'Bandung Sport Center',
                    'image' => 'img/event3.jpg',
                    'description' => 'Turnamen karate tingkat regional',
                    'status' => 'completed',
                    'results' => 'Tersedia'
                ],
                // Tambah event completed lainnya
            ]
        ];

        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        // Logic untuk menampilkan detail event
        return view('events.show');
    }

    public function register($id)
    {
        // Logic untuk mendaftar event
        return redirect()->back()->with('success', 'Berhasil mendaftar event!');
    }
} 