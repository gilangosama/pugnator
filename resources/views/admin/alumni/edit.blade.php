<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <a href="{{ route('admin.alumni.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Kembali
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Edit Alumni</h2>
                <div></div>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nama Alumni
                                </label>
                                <input type="text" name="name" id="name" 
                                       value="{{ old('name', $alumni->name) }}"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       required>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial">
                                    Testimonial
                                </label>
                                <textarea name="testimonial" id="testimonial" rows="4"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          required>{{ old('testimonial', $alumni->testimonial) }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                    Gambar
                                </label>
                                @if($alumni->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $alumni->image) }}" 
                                             alt="{{ $alumni->name }}" 
                                             class="w-32 h-32 object-cover rounded">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" 
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 