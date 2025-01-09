<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard Admin
                </h2>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Event Management Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">Manajemen Event</h3>
                            <div class="space-y-4">
                                <a href="{{ route('admin.events.index') }}" class="block bg-blue-600 text-white px-4 py-2 rounded-lg text-center hover:bg-blue-700">
                                    Kelola Event
                                </a>
                                <a href="{{ route('admin.events.create') }}" class="block bg-green-600 text-white px-4 py-2 rounded-lg text-center hover:bg-green-700">
                                    Tambah Event Baru
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Catalog Management Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">Manajemen Katalog</h3>
                            <div class="space-y-4">
                                <a href="{{ route('admin.catalog.index') }}" class="block bg-blue-600 text-white px-4 py-2 rounded-lg text-center hover:bg-blue-700">
                                    Kelola Katalog
                                </a>
                                <a href="{{ route('admin.catalog.create') }}" class="block bg-green-600 text-white px-4 py-2 rounded-lg text-center hover:bg-green-700">
                                    Tambah Produk Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 