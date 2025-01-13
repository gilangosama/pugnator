<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Mind Your Power</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @endpush
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <h1 class="text-2xl font-bold flex items-center">
                    <img src="img/logo putih.png" alt="logo" class="w-10 h-10 mr-2">Pugnator
                </h1>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-6">
                    <?php
                    $menu_items = [
                        "Home" => "home", 
                        "Katalog" => "katalog", 
                        "About-Us" => "about-us", 
                        "Event" => "events",
                        "Contact" => "contact"
                    ];
                    foreach ($menu_items as $item => $id) {
                        if ($item == "Event") {
                            echo "<a href='" . route('events.index') . "' class='hover:text-gray-300 transition-colors'>$item</a>";
                        } else {
                            echo "<a href='#$id' class='hover:text-gray-300 transition-colors'>$item</a>";
                        }
                    }
                    ?>
                    @if (Route::has('login'))
                        @auth
                            <div class="relative">
                                <button id="profileDropdownButton" 
                                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors flex items-center space-x-2">
                                    <span>{{ Auth::user()->first_name }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                
                                <div id="profileDropdownMenu" 
                                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-50">Profile</a>
                                    <hr class="my-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-50">Logout</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-white hover:text-gray-300 transition-colors">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>

                <!-- Mobile menu button -->
                <button id="mobileMenuButton" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="hidden md:hidden mt-4">
                <?php
                foreach ($menu_items as $item => $id) {
                    if ($item == "Event") {
                        echo "<a href='" . route('events.index') . "' class='block py-2 hover:text-gray-300 transition-colors'>$item</a>";
                    } else {
                        echo "<a href='#$id' class='block py-2 hover:text-gray-300 transition-colors'>$item</a>";
                    }
                }
                ?>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile.edit') }}" class="block py-2 hover:text-gray-300 transition-colors">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left py-2 hover:text-gray-300 transition-colors">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block py-2 hover:text-gray-300 transition-colors">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block py-2 hover:text-gray-300 transition-colors">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>
    
    <!-- Jumbotron Section -->
    <section class="relative bg-gradient-to-r from-purple-300 to-gray-700 text-white py-24" style="background-image: url('img/DNS00096 1.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">Welcome to Pugnator</h1>
                    <p class="text-lg md:text-xl mb-8">
                        PUGNATOR, brand sport martial arts yang diciptakan untuk konsumen yang ingin memiliki
                        kualitas internasional dengan harga nasional.
                    </p>
                    <a href="#katalog" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                        Explore Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Section -->
    <section class="bg-black py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white text-center mb-12">Katalog</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestProducts as $product)
                    <div class="bg-white rounded-lg overflow-hidden">
                        <!-- Gambar Produk -->
                        <div class="relative h-80">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <!-- Detail Produk -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $product->title }}</h3>
                            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                            <p class="text-blue-600 font-bold text-lg mt-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" 
                   class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
                    Lihat Semua Katalog
                </a>
            </div>
        </div>
    </section>

    
    <!-- About Us Section -->
    <section class="py-10 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-4xl font-bold mb-4">About Us</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="max-w-4xl mx-auto">
                
                <div class="p-8">
                    <p class="text-gray-700 leading-relaxed mb-6 text-center">
                        PUGNATOR, brand sport martial arts yang diciptakan untuk konsumen yang ingin memiliki kualitas internasional dengan harga nasional. Pugnator mewakili fighter untuk menumbuhkan percaya diri saat pertandingan dan latihan. Kualitas yang diunggulkan akan membuat kenyamanan dan mampu bersaing dengan brand internasional lainnya.
                    </p>
                    
                    <p class="text-gray-700 leading-relaxed mb-6 text-center">
                        "Your Mind is Your Power" - Tagline Pugnator harus mampu menciptakan pikiran percaya diri yang membuat menghantarkan fighter kepada kemenangan dan be the champ is a must. Pugnator percaya bahwa kekuatan utama yang sebenarnya bukan hanya fisik melainkan pikiran, dengan pikiran yang kuat akan melahirkan jiwa fighter yang Tangguh.
                    </p>
                    
                    <p class="text-gray-700 leading-relaxed text-center">
                        Pugnator memiliki visi sebagai brand martial arts yang dapat menjadi bagian perkembangan atlet-atlet di Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section id="quote" class="bg-gray-100 py-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-xl italic text-gray-700 mb-4">"Kekalahan adalah keadaan pikiran; tidak ada yang pernah dikalahkan sampai kekalahan diterima sebagai kenyataan."</p>
            <p class="font-semibold text-gray-900">- Bruce Lee - Actor, martial arts activist</p>
        </div>
    </section>

    <!-- Section Event -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">Event</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($upcomingEvents as $event)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="relative h-64">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" 
                                     alt="{{ $event->event_name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $event->event_name }}</h3>
                            <p class="text-gray-600 mt-2">{{ $event->description }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <p class="text-gray-600">{{ $event->date }}</p>
                                <a href="{{ route('events.show', $event->id) }}" 
                                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        Belum ada event yang akan datang
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('events.index') }}" 
                   class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
                    Lihat Semua Event
                </a>
            </div>
        </div>
    </section>

    

    <!-- Our Footprint Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Footprint in The World of Indonesian Taekwondo Equipment</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">IDR 5B+</h3>
                    <p class="text-gray-600">Total Revenue</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">1.800+</h3>
                    <p class="text-gray-600">Satisfied Customers</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">96%</h3>
                    <p class="text-gray-600">Customer Satisfaction</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">142+</h3>
                    <p class="text-gray-600">Collaborative Partners</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Motivational Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Menjadi Athlete yang lebih baik</h2>
            <p class="mb-8 max-w-2xl mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor magna at malesuada ultricies. Suspendisse potenti.</p>
            <!-- <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                Learn More
            </button> -->
        </div>
    </section>

    <!-- What Our Alumni Says Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">What Our Alumni Says</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($alumni as $alumnus)
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <div class="relative w-32 h-32 mx-auto mb-6">
                            @if($alumnus->image)
                                <img src="{{ asset('storage/' . $alumnus->image) }}" 
                                     alt="{{ $alumnus->name }}"
                                     class="rounded-full w-full h-full object-cover">
                            @else
                                <div class="w-full h-full rounded-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $alumnus->name }}</h3>
                        <p class="text-gray-600 italic">
                            "{{ $alumnus->testimonial }}"
                        </p>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        Belum ada testimonial alumni
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Documentation Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Documentation</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($documentations as $doc)
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('storage/' . $doc->image) }}" 
                             alt="Documentation Image" 
                             class="w-full h-64 object-cover">
                    </div>
                @empty
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
            <div class="text-center mt-8">
                <!-- <button class="bg-black text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                    View More
                </button> -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                    <p class="mb-2">Email: info@yourdomain.com</p>
                    <p>Phone: +62 123 456 789</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Explore</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-300 transition-colors">Home</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition-colors">Katalog</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                    <div class="space-y-2">
                        <a href="#" class="block hover:text-gray-300 transition-colors">Facebook</a>
                        <a href="#" class="block hover:text-gray-300 transition-colors">Instagram</a>
                        <a href="#" class="block hover:text-gray-300 transition-colors">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2024 Your Company. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    // Toggle mobile menu
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Profile dropdown (existing code)
    const profileButton = document.getElementById('profileDropdownButton');
    const profileMenu = document.getElementById('profileDropdownMenu');

    if (profileButton && profileMenu) {
        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            profileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.add('hidden');
            }
        });
    }
    </script>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .swiper-button-next::after,
        .swiper-button-prev::after {
            color: white;
            font-size: 24px;
        }
        .swiper-pagination-bullet {
            background: white;
        }
        .swiper-pagination-bullet-active {
            background: #3b82f6;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.productSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    @endpush
</body>
</html>
