<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <a href="{{ route('events.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Events
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-8">
                    <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-64 object-cover rounded-lg mb-8">
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event['title'] }}</h1>
                    
                    <div class="flex items-center text-gray-600 mb-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $event['date'] }}
                    </div>

                    <div class="flex items-center text-gray-600 mb-6">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $event['location'] }}
                    </div>

                    <p class="text-gray-600 mb-8">{{ $event['description'] }}</p>

                    <div class="flex space-x-4">
                        <a href="{{ route('events.register', $event['id']) }}" 
                           class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg text-center hover:bg-blue-700 transition-colors">
                            Daftar Event
                        </a>
                        <a href="{{ route('events.review', $event['id']) }}" 
                           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                            Beri Ulasan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 