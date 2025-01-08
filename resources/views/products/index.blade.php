<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Home</span>
                </a>
                <h2 class="ml-4 text-2xl font-bold text-gray-800">Our Products</h2>
            </div>
        </header>

        <!-- Products Grid -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $index => $product)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $product['title'] }}</h3>
                            <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                            <p class="text-blue-600 font-bold mb-4">{{ $product['price'] }}</p>
                            <a href="{{ route('products.show', $index) }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout> 