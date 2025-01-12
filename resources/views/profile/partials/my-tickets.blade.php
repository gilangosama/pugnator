<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Tiket Event Saya
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Daftar tiket event yang telah Anda beli.
        </p>
    </header>

    <div class="space-y-4">
        @forelse($bookings as $booking)
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $booking->event->event_name }}</h3>
                        <div class="mt-2 space-y-1 text-gray-600">
                            <p>Tanggal: {{ \Carbon\Carbon::parse($booking->event->date)->format('d M Y') }}</p>
                            <p>Lokasi: {{ $booking->event->location }}</p>
                            <p>Status: 
                                <span class="px-2 py-1 rounded-full text-sm 
                                    {{ $booking->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $booking->status === 'paid' ? 'Sudah Bayar' : 'Menunggu Pembayaran' }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">No. Tiket:</p>
                        <p class="font-mono">{{ $booking->id }}/EV/{{ date('Y') }}</p>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        <p>Dibeli pada: {{ $booking->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <a href="{{ route('events.show', $booking->event->id) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                        Lihat Detail Event
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center py-8 text-gray-500">
                <p>Anda belum memiliki tiket event.</p>
            </div>
        @endforelse
    </div>
</section> 