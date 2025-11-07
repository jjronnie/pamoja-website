<!-- Back to Top Button -->
<button id="back-to-top"
    class="fixed bottom-6 md:bottom-8 right-6 md:right-8 w-12 h-12 bg-red-900 text-white rounded-full shadow-lg hover:bg-red-800 transition hidden items-center justify-center z-50">
    <i class="fas fa-arrow-up"></i>
</button>

<footer class="bg-gray-900 text-white py-10 md:py-12">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logom.webp') }}" class="w-10 h-10 " alt="LOGO">
                    </a>
                    <a href="{{ url('/') }}">
                        <span class="text-xl md:text-2xl font-bold">Pamoja Chambers</span>
                    </a>
                </div>
                <p class="text-gray-400 mb-4 text-sm md:text-base">Professional debt collection and legal services
                    provider in Uganda. Your trusted partner for justice and results.</p>
                <div class="flex space-x-3">
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">About
                            Us</a>
                    </li>
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Our
                            Services</a></li>
                    <li><a href="{{ route('properties') }}"
                            class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Properties</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Contact</a>
                    </li>
                   
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-4">Our Services</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Debt
                            Collection</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Court
                            Bailiffs</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Property
                            Sales</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Legal
                            Consultants</a></li>
                    <li><a href="{{ route('services') }}"
                            class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Auctioneering</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-4">Newsletter</h3>
                <p class="text-gray-400 mb-4 text-sm md:text-base">Subscribe to our newsletter for updates and legal
                    insights.</p>
                <div class="flex">
                    <input type="email" placeholder="Your email"
                        class="flex-1 bg-gray-800 border border-gray-700 rounded-l-lg px-3 md:px-4 py-2 md:py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
                    <button class="bg-red-900 px-4 md:px-6 rounded-r-lg hover:bg-red-800 transition">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 md:pt-8 text-center text-gray-400 text-sm md:text-base">
            <p>&copy; 2025 Pamoja Chambers. All rights reserved. | Powered by <a class="text-gray-100" href="https://techtowerinc.com" target="_blank" rel="noopener noreferrer">TechTower Inc</a> </p>
        </div>
    </div>
</footer>