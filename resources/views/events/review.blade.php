<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <a href="{{ route('events.show', $event['id']) }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Detail Event
                    </a>
                    <h2 class="ml-4 text-2xl font-bold text-gray-800">Berikan Ulasan Event</h2>
                </div>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-2">{{ $event['title'] }}</h3>
                            <p class="text-gray-600">{{ $event['date'] }}</p>
                        </div>

                        <form action="{{ route('events.review.store', $event->id) }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div class="flex space-x-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                    <label class="flex items-center">
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer">
                                        <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-500 peer-checked:border-yellow-500 peer-checked:bg-yellow-50 peer-checked:text-yellow-500 cursor-pointer">
                                            {{ $i }}
                                        </div>
                                    </label>
                                    @endfor
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ulasan Anda</label>
                                <textarea name="review" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Bagaimana pengalaman Anda mengikuti event ini?" required></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Saran Perbaikan</label>
                                <textarea name="suggestion" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Apa yang bisa kami tingkatkan?"></textarea>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    Kirim Ulasan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 