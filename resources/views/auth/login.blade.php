<x-guest-layout>
    <div class="flex min-h-screen">
        <!-- Back button -->
        <a href="{{ url('/') }}" class="absolute top-4 left-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>

        <div class="hidden lg:flex lg:w-1/2 bg-gray-100">
            <img src="{{ asset('img/login-background.jpg') }}" alt="Login Image" class="w-full h-full object-cover">
        </div>

        <div class="flex items-center justify-center w-full lg:w-1/2 bg-white p-8">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-bold text-center mb-8">Login</h2>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Masukkan email Anda">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Masukkan password Anda">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                        </label>
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-200">
                        {{ __('Masuk') }}
                    </button>

                    <p class="text-center mt-6 text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>