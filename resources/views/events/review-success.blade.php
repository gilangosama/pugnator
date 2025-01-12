<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                <!-- Success Icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-2">Terima Kasih atas Ulasan Anda!</h2>
                <p class="text-gray-600 mb-6">Ulasan Anda sangat berharga untuk meningkatkan kualitas event kami.</p>

                <div class="flex justify-center space-x-4">
                    <a href="{{ route('events.show', $event->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Kembali ke Event
                    </a>
                    <a href="{{ route('events.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Lihat Event Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 