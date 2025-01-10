<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Katalog</h2>
                <a href="{{ route('admin.catalog.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Produk
                </a>
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

                <!-- Tabel Katalog -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $produk)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset("storage/$produk->image") }}" alt="{{ $produk['title'] }}" class="h-10 w-10 rounded-full object-cover">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $produk['title'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $produk['description'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produk['category'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Rp {{ $produk['price'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produk['stock'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $produk['status'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.catalog.edit', $produk->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('admin.catalog.destroy', $produk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 