<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                <a href="{{ url('/events') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Events</span>
                </a>
            </div>
        </header>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:flex">
                    <!-- Gambar Event -->
                    <div class="md:w-1/2">
                        <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-96 object-cover">
                    </div>

                    <!-- Detail Event -->
                    <div class="md:w-1/2 p-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $event['title'] }}</h1>
                        
                        <div class="mb-6 space-y-3">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $event['date'] }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event['location'] }}</span>
                            </div>

                            @if(isset($event['registration_deadline']))
                            <div class="flex items-center text-blue-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Deadline Pendaftaran: {{ $event['registration_deadline'] }}</span>
                            </div>
                            @endif
                        </div>

                        <div class="prose max-w-none mb-8">
                            <p class="text-gray-600">{{ $event['description'] }}</p>
                        </div>

                        @if($event['status'] === 'upcoming')
                            <a href="{{ route('events.register', $event['id']) }}" 
                               class="inline-block w-full text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                Daftar Event
                            </a>
                        @elseif($event['status'] === 'completed' && isset($event['results']))
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-gray-800 mb-2">Hasil Event</h3>
                                <p class="text-gray-600">{{ $event['results'] }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 