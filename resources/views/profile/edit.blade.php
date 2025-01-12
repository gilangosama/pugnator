<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Header dengan tombol back -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Home</span>
                </a>
                <h2 class="ml-4 font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.my-tickets')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900">Riwayat Pembelian Produk</h2>
                        <p class="mt-1 text-sm text-gray-600">Daftar produk yang telah Anda beli.</p>

                        <div class="mt-6 space-y-6">
                            @php
                                $orders = \App\Models\Order::where('user_id', auth()->id())->with('product')->get();
                            @endphp

                            @if($orders->count() > 0)
                                @foreach($orders as $order)
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $order->product->title }}</h3>
                                                <div class="mt-2 text-sm text-gray-600">
                                                    <p>Ukuran: {{ $order->size }}</p>
                                                    <p>Jumlah: {{ $order->quantity }}</p>
                                                    <p>Total: Rp {{ number_format($order->total_price, 2, ',', '.') }}</p>
                                                    <p class="mt-1 text-xs">Dibeli pada: {{ $order->created_at->format('d M Y H:i') }}</p>
                                                </div>
                                            </div>
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $order->status }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-center py-4">Belum ada pembelian produk</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
