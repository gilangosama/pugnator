<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <a href="{{ route('events.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Event
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="w-full h-96 overflow-hidden rounded-t-lg">
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" 
                             alt="{{ $event->event_name }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>

                <div class="p-8">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span>{{ $event->date }}</span>
                    </div>

                    <div class="flex items-center space-x-4 mb-6">
                        <div class="text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span>{{ $event->location }}</span>
                    </div>

                    <p class="text-gray-600 mb-8">{{ $event->description }}</p>

                    <div class="flex space-x-4">
                        @if($event->status === 'upcoming')
                            <a href="{{ route('events.register', $event->id) }}" 
                               class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg text-center hover:bg-blue-700">
                                Daftar Event
                            </a>
                        @else
                            <button disabled 
                                    class="flex-1 bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed">
                                Event Selesai
                            </button>
                        @endif
                        <a href="{{ route('events.review', $event->id) }}" 
                           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                            Beri Ulasan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-6">Ulasan Event</h2>
                    
                    @if($event->reviews->count() > 0)
                        <div class="space-y-6">
                            @foreach($event->reviews as $review)
                                <div class="border-b border-gray-200 pb-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                                <span class="text-gray-600 font-medium">
                                                    {{ substr($review->user->first_name ?? '', 0, 1) }}
                                                </span>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900">
                                                    {{ $review->user->first_name ?? '' }} {{ $review->user->last_name ?? '' }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $review->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    ⭐
                                                @else
                                                    ☆
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-700 mb-2">{{ $review->review }}</p>
                                    @if($review->suggestion)
                                        <p class="text-gray-600 text-sm italic">"{{ $review->suggestion }}"</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Belum ada ulasan untuk event ini</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 