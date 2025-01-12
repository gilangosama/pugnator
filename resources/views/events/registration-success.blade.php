<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Header Sukses -->
                <div class="bg-green-50 p-6 border-b border-green-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 6L9 17l-5-5m36-3l-11 11-5-5M43 42H5a2 2 0 01-2-2V8a2 2 0 012-2h38a2 2 0 012 2v32a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-2xl font-bold text-green-800">Pendaftaran Berhasil!</h2>
                            <p class="text-green-700">Terima kasih telah mendaftar di event kami.</p>
                        </div>
                    </div>
                </div>

                <!-- Detail Pendaftaran -->
                <div class="p-6">
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Detail Event</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="font-semibold text-gray-800">{{ $event->event_name }}</p>
                            <p class="text-gray-600">{{ $event->date }}</p>
                            <p class="text-gray-600">{{ $event->location }}</p>
                        </div>
                    </div>

                    <!-- Instruksi Pembayaran -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Instruksi Pembayaran</h3>
                        <div class="space-y-4">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <p class="font-medium text-blue-800">Total Pembayaran:</p>
                                <p class="text-2xl font-bold text-blue-900">Rp 100.000</p>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <p class="font-medium text-gray-800 mb-2">Transfer ke rekening:</p>
                                <p class="text-gray-600">Bank BCA</p>
                                <p class="text-gray-900 font-medium">1234567890</p>
                                <p class="text-gray-600">a.n. PUGNATOR KARATE</p>
                            </div>

                            <div class="bg-yellow-50 p-4 rounded-lg">
                                <p class="text-yellow-800">
                                    <span class="font-medium">Penting:</span> 
                                    Harap lakukan pembayaran dalam waktu 24 jam untuk mengkonfirmasi pendaftaran Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('events.show', $event->id) }}" 
                           class="flex-1 bg-gray-600 text-white px-6 py-3 rounded-lg text-center hover:bg-gray-700">
                            Kembali ke Detail Event
                        </a>
                        <a href="#" 
                           class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg text-center hover:bg-blue-700">
                            Konfirmasi Pembayaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 