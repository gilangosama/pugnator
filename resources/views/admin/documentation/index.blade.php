<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Kembali ke Dashboard
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Dokumentasi</h2>
                <a href="{{ route('admin.documentation.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Dokumentasi
                </a>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @forelse($documentations as $doc)
                                <div class="bg-white rounded-lg shadow overflow-hidden">
                                    <img src="{{ asset('storage/' . $doc->image) }}" 
                                         alt="Documentation Image" 
                                         class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <div class="flex justify-end">
                                            <form action="{{ route('admin.documentation.destroy', $doc->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumentasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center text-gray-500">
                                    Belum ada dokumentasi
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 