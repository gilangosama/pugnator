<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Kembali ke Dashboard
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Alumni</h2>
                <a href="{{ route('admin.alumni.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Alumni
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
                            @forelse($alumni as $alumnus)
                                <div class="bg-white rounded-lg shadow overflow-hidden">
                                    <img src="{{ asset('storage/' . $alumnus->image) }}" 
                                         alt="{{ $alumnus->name }}" 
                                         class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="font-bold text-lg mb-2">{{ $alumnus->name }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $alumnus->testimonial }}</p>
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('admin.alumni.edit', $alumnus->id) }}" 
                                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.alumni.destroy', $alumnus->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                    Belum ada data alumni
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 