<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-800">Katalog Produk</h2>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Filter Kategori -->
                <div class="mb-6 flex space-x-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Semua</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Seragam</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Aksesoris</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Perlengkapan</button>
                </div>

                <!-- Grid Katalog -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $product['title'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $product['description'] }}</p>
                            <div class="text-xl font-bold text-blue-600 mb-4">{{ $product['price'] }}</div>
                            <a href="{{ route('products.show', $product['id']) }}" 
                               class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
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