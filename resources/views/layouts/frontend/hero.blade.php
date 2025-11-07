<section id="home" class="relative h-screen mt-16 overflow-hidden">
    <div class="absolute inset-0 bg-cover brightness-50 bg-center" style="background-image: url('assets/img/scale1.webp');"></div>
    {{-- <div class="absolute inset-0 gradient-overlay"></div> --}}

    <div class="relative h-full flex flex-col items-center justify-center px-4 md:px-8">
        <div class="container mx-auto">
            <div id="banner-slides" class="text-white relative" style="min-height: 400px;">
                <!-- Slide 1 -->
                <div class="banner-slide active text-center md:text-left">
                    <p class="text-gray-300 text-base md:text-lg mb-2 md:mb-3">WELCOME TO PAMOJA CHAMBERS</p>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Professional
                        Debt<br>Collection Services</h1>
                    <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">We provide comprehensive
                        debt recovery solutions with integrity, professionalism, and a commitment to results.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <button
                            class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                            About Us
                        </button>
                        <button
                            class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                            <i class="fas fa-play-circle"></i>
                            <span>Our Services</span>
                        </button>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="banner-slide text-center md:text-left">
                    <p class="text-gray-300 text-base md:text-lg mb-2 md:mb-3">LEGAL EXPERTISE YOU CAN TRUST</p>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Court Bailiffs
                        &<br>Legal Consultants</h1>
                    <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">Experienced legal
                        professionals ready to handle your most complex cases with precision and care.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <button
                            class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                            Our Services
                        </button>
                        <button
                            class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                            <i class="fas fa-phone"></i>
                            <span> Contact Us</span>
                        </button>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="banner-slide text-center md:text-left">
                    <p class="text-gray-300 text-base md:text-lg mb-2 md:mb-3">PROPERTY SOLUTIONS</p>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Auctioneering
                        &<br>Property Sales</h1>
                    <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">Transparent property
                        auctions and sales services. Find your next opportunity or liquidate assets efficiently.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <button
                            class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                            Get In Touch
                        </button>
                        <button
                            class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                            <i class="fas fa-home"></i>
                            <span> View Properties</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Form - Centered and Responsive -->
        <div class="w-full max-w-6xl mx-auto mt-8 md:mt-12 px-4">
            <div class="bg-white rounded-xl shadow-2xl p-4 md:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                    <select
                        class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 w-full">
                        <option>Type</option>
                        
                        <option>Auctioneering</option>
                    </select>
                   
                    <select
                        class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 w-full">
                        <option>Category</option>
                        <option>Commercial</option>
                        <option>Residential</option>
                        <option>Land</option>
                    </select>
                    <button
                        class="bg-red-900 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition font-semibold w-full">
                        Find Properties
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
        <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-100 hover:opacity-100 transition"
            data-slide="0"></button>
        <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition"
            data-slide="1"></button>
        <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition"
            data-slide="2"></button>
    </div>
</section>


<!-- Stats Section -->
<section class="bg-red-900 py-12 md:py-16">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 text-center text-white">
            <div class="px-4">
                <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="5000">0</div>
                <p class="text-red-200 text-sm md:text-base">Cases Handled</p>
            </div>
            <div class="px-4">
                <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="98">0</div>
                <p class="text-red-200 text-sm md:text-base">Success Rate %</p>
            </div>
            <div class="px-4">
                <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="250">0</div>
                <p class="text-red-200 text-sm md:text-base">Properties Sold</p>
            </div>
            <div class="px-4">
                <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="15">0</div>
                <p class="text-red-200 text-sm md:text-base">Years Experience</p>
            </div>
        </div>
    </div>
</section>