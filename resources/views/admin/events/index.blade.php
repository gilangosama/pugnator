<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Event</h2>
                <a href="{{ route('admin.events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Event
                </a>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Filter Status -->
                <div class="mb-6 flex space-x-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Semua</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Upcoming</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Ongoing</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Completed</button>
                </div>

                <!-- Tabel Event -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($events['upcoming'] as $event)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="h-10 w-10 rounded-full object-cover">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $event['title'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $event['date'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $event['location'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ ucfirst($event['status']) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
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