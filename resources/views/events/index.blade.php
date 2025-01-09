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
                <h2 class="ml-4 text-2xl font-bold text-gray-800">Events</h2>
            </div>
        </header>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Tab Navigation -->
            <div class="flex space-x-4 mb-8">
                <button class="px-6 py-2 bg-blue-600 text-white rounded-lg" onclick="showTab('upcoming')">Upcoming</button>
                <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg" onclick="showTab('ongoing')">Ongoing</button>
                <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg" onclick="showTab('completed')">Completed</button>
            </div>

            <!-- Event Lists -->
            <div id="upcoming" class="event-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events['upcoming'] as $event)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $event['title'] }}</h3>
                                <div class="text-gray-600 mb-4">
                                    <p class="mb-1">{{ $event['date'] }}</p>
                                    <p>{{ $event['location'] }}</p>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $event['description'] }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-blue-600">Deadline: {{ $event['registration_deadline'] }}</span>
                                    <a href="{{ route('events.show', $event['id']) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="ongoing" class="event-tab hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events['ongoing'] as $event)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $event['title'] }}</h3>
                                <div class="text-gray-600 mb-4">
                                    <p class="mb-1">{{ $event['date'] }} - {{ $event['end_date'] }}</p>
                                    <p>{{ $event['location'] }}</p>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $event['description'] }}</p>
                                <a href="{{ route('events.show', $event['id']) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="completed" class="event-tab hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events['completed'] as $event)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $event['title'] }}</h3>
                                <div class="text-gray-600 mb-4">
                                    <p class="mb-1">{{ $event['date'] }}</p>
                                    <p>{{ $event['location'] }}</p>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $event['description'] }}</p>
                                <a href="{{ route('events.show', $event['id']) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                                    Lihat Hasil
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            document.querySelectorAll('.event-tab').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabName).classList.remove('hidden');
            
            document.querySelectorAll('button').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-blue-600', 'text-white');
        }
    </script>
</x-app-layout> 