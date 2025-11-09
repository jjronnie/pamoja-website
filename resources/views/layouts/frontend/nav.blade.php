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

            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">
                    Home
                </a>

                <a href="{{ route('about') }}"
                    class="nav-link {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">
                    About
                </a>

                <a href="{{ route('services') }}"
                    class="nav-link {{ request()->routeIs('services') ? 'nav-link-active' : '' }}">
                    Services
                </a>

                <a href="/properties" class="nav-link {{ request()->is('properties*') ? 'nav-link-active' : '' }}">
                    Properties
                </a>

                <a href="{{ route('contact') }}"
                    class="nav-link {{ request()->routeIs('contact') ? 'nav-link-active' : '' }}">
                    Contact
                </a>
            </div>



            <div class="hidden lg:flex items-center space-x-4">
                <a href="tel:+256393243211" class="flex items-center space-x-2 text-red-900">
                    <i class="fas fa-phone"></i>
                    <span class="text-sm">+256 393 243 211</span>
                </a>
                <a href="{{ route('properties') }}" class="btn">
                    Explore Properties
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-gray-700 bg-gray-50 px-3 py-1 rounded-lg">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-3">

                <a href="{{ route('home') }}"
                    class="nav-link py-2 {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">
                    Home
                </a>

                <a href="{{ route('about') }}"
                    class="nav-link py-2 {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">
                    About
                </a>

                <a href="{{ route('services') }}"
                    class="nav-link py-2 {{ request()->routeIs('services') ? 'nav-link-active' : '' }}">
                    Services
                </a>

                <a href="/properties" class="nav-link py-2 {{ request()->is('properties*') ? 'nav-link-active' : '' }}">
                    Properties
                </a>

                <a href="{{ route('contact') }}"
                    class="nav-link py-2 {{ request()->routeIs('contact') ? 'nav-link-active' : '' }}">
                    Contact
                </a>

                <a href="{{ route('properties') }}" class="btn">
                    Explore Properties
                </a>
            </div>
        </div>

    </div>
</nav>