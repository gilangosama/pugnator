<x-guest-layout>
    <div class="flex min-h-screen">
        <div class="hidden lg:flex lg:w-1/2 bg-gray-100">
            <img src="{{ asset('img/register-background.jpg') }}" alt="Register Image" class="w-full h-full object-cover">
        </div>

        <div class="flex items-center justify-center w-full lg:w-1/2 bg-white p-8">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-bold text-center mb-8">Create Account</h2>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- First Name -->
                    <div class="mb-4">
                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="First Name">
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4">
                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Last Name">
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="UserName">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            placeholder="Confirm Password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-200">
                        Register
                    </button>

                    <p class="text-center mt-6 text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
