<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Header dengan tombol yang sejajar -->
        <div class="py-6 bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali ke Dashboard
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800">Manajemen Catalog</h2>
                    <a href="{{ route('admin.catalog.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Produk
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter Kategori -->
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-4">
                    <a href="{{ route('admin.catalog.index') }}" 
                       class="px-4 py-2 {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg">
                        Semua
                    </a>
                    <a href="{{ route('admin.catalog.index', ['category' => 'Seragam']) }}" 
                       class="px-4 py-2 {{ request('category') === 'Seragam' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg">
                        Seragam
                    </a>
                    <a href="{{ route('admin.catalog.index', ['category' => 'Aksesoris']) }}" 
                       class="px-4 py-2 {{ request('category') === 'Aksesoris' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg">
                        Aksesoris
                    </a>
                    <a href="{{ route('admin.catalog.index', ['category' => 'Perlengkapan']) }}" 
                       class="px-4 py-2 {{ request('category') === 'Perlengkapan' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg">
                        Perlengkapan
                    </a>
                </div>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        @if($products->isEmpty())
                            <p class="text-center text-gray-500">Belum ada produk yang ditambahkan</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                    <div class="bg-white rounded-lg shadow overflow-hidden">
                                        <div class="aspect-w-16 aspect-h-9">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     alt="{{ $product->title }}" 
                                                     class="w-full h-48 object-cover"
                                                     onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';">
                                            @else
                                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-500">Tidak ada gambar</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                                            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                            <p class="text-blue-600 font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <div class="mt-4 flex justify-end space-x-2">
                                                <a href="{{ route('admin.catalog.edit', $product->id) }}" 
                                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.catalog.destroy', $product->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 