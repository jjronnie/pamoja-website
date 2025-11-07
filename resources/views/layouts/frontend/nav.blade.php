<nav class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="container mx-auto px-6 lg:px-12 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logom.webp') }}" class="w-10 h-10 " alt="LOGO">
                </a>
                <a href="{{ url('/') }}">
                    <span class="text-xl md:text-2xl font-bold text-red-900">Pamoja Chambers</span></a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-900 hover:text-red-900 transition">Home</a>
                <a href="{{ route('about') }}" class="text-gray-900 hover:text-red-900 transition">About</a>
                <a href="{{ route('services') }}" class="text-gray-900 hover:text-red-900 transition">Services</a>
                <a href="/properties" class="text-gray-900 hover:text-red-900 transition ">Properties</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-red-900 transition">Contact</a>
            </div>

            <div class="hidden lg:flex items-center space-x-4">
                <a href="tel:+256123456789" class="flex items-center space-x-2 text-red-900">
                    <i class="fas fa-phone"></i>
                    <span class="text-sm">+256 123 456 789</span>
                </a>
                <button class="btn">
                    Get Started
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-gray-700 bg-gray-50 px-3 py-1 rounded-lg">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-3">

                <a href="{{ route('home') }}" class="text-gray-900 hover:text-red-900 transition py-2">Home</a>
                <a href="{{ route('about') }}" class="text-gray-900 hover:text-red-900 transition py-2">About</a>
                <a href="{{ route('services') }}" class="text-gray-900 hover:text-red-900 transition py-2">Services</a>
                <a href="/properties" class="text-gray-900 hover:text-red-900 transition py-2">Properties</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-red-900 transition py-2">Contact</a>

                <button class="btn">
                    Get Started
                </button>
            </div>
        </div>
    </div>
</nav>