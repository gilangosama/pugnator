<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        
    <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Home</span>
                </a>
                <h2 class="ml-4 text-2xl font-bold text-gray-800">Katalog Produk</h2>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Filter Kategori -->
                <div class="mb-6 flex space-x-4">
                    <a href="{{ route('products.index') }}" 
                       class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        Semua
                    </a>
                    <a href="{{ route('products.index', ['category' => 'Seragam']) }}" 
                       class="px-4 py-2 rounded-lg {{ request('category') === 'Seragam' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        Seragam
                    </a>
                    <a href="{{ route('products.index', ['category' => 'Aksesoris']) }}" 
                       class="px-4 py-2 rounded-lg {{ request('category') === 'Aksesoris' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        Aksesoris
                    </a>
                    <a href="{{ route('products.index', ['category' => 'Perlengkapan']) }}" 
                       class="px-4 py-2 rounded-lg {{ request('category') === 'Perlengkapan' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        Perlengkapan
                    </a>
                </div>

                <!-- Grid Produk -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 w-full">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->title }}"
                                     class="w-full h-64 object-cover">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $product->description }}</p>
                            <p class="text-blue-600 font-bold mb-4">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                            <a href="{{ route('products.show', $product->id) }}" 
                               class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 