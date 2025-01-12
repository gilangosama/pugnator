<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <!-- Success Icon -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                    <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pembelian Berhasil!</h2>
                <p class="text-gray-600 mb-8">Terima kasih telah berbelanja di toko kami.</p>

                <!-- Detail Pesanan -->
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Pesanan</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Produk:</span>
                            <span class="font-medium">{{ $product->title }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ukuran:</span>
                            <span class="font-medium">{{ $size }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah:</span>
                            <span class="font-medium">{{ $quantity }}</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t">
                            <span class="text-gray-900 font-semibold">Total Pembayaran:</span>
                            <span class="text-blue-600 font-bold">Rp {{ number_format($order->total_price, 2, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('products.index') }}" 
                       class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                        Belanja Lagi
                    </a>
                    <a href="{{ route('profile.edit') }}#orders" 
                       class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300">
                        Lihat Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 