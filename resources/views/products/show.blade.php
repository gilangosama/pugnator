<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Header dengan tombol kembali -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <a href="{{ route('products.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Katalog
                </a>
            </div>
        </div>

        <!-- Konten Produk -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                    <!-- Gambar Produk -->
                    <div>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->title }}" 
                                 class="w-full rounded-lg">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg">
                                <span class="text-gray-400">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    <!-- Detail Produk -->
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product['title'] }}</h1>
                        <p class="text-lg text-gray-600 mb-6">{{ $product['description'] }}</p>
                        
                        <div class="text-3xl font-bold text-blue-600 mb-8">
                            Rp {{ $product['price'] }}
                        </div>

                        <div class="space-y-6">

                            <form action="{{ route('products.purchase', $product->id) }}" method="POST">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Pilih Ukuran</label>
                                        <select name="size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                        <input type="number" name="quantity" value="1" min="1" 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <button type="submit" 
                                            class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                                        Beli Sekarang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 