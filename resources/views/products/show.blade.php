<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Katalog</span>
                </a>
            </div>
        </header>

        <!-- Product Detail -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-[500px] object-cover">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product['title'] }}</h1>
                        <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                        <p class="text-blue-600 font-bold text-2xl mb-6">{{ $product['price'] }}</p>
                        <div class="prose max-w-none mb-6">
                            <h3 class="text-lg font-semibold mb-2">Deskripsi Produk</h3>
                            <p class="text-gray-600">{{ $product['details'] }}</p>
                        </div>
                        @if(isset($product['features']))
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Fitur Utama</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach($product['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(isset($product['sizes']))
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Ukuran yang Tersedia</h3>
                            <div class="flex gap-2">
                                @foreach($product['sizes'] as $size)
                                    <button class="px-4 py-2 border border-gray-300 rounded-md hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <button class="w-full mt-8 bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 