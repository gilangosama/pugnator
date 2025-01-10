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
                    'id' => 1,
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
                    'id' => 2,
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
                    'id' => 3,
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
    {
        $events = [
            'upcoming' => [
                [
                    'id' => 1,
                    'title' => 'Kejuaraan Karate Nasional',
                    'date' => '2024-03-15',
                    'location' => 'Jakarta Convention Center',
                    'image' => 'img/event1.jpg',
                    'description' => 'Kompetisi karate tingkat nasional untuk semua kategori usia',
                    'status' => 'upcoming',
                    'registration_deadline' => '2024-03-01'
                ]
            ]
        ];

        foreach ($events as $status => $statusEvents) {
            foreach ($statusEvents as $event) {
                if ($event['id'] == $id) {
                    return $event;
                }
            }
        }

        return null;
    }
} 