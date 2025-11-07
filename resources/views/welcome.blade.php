<x-guest-layout>

    @include('layouts.frontend.hero')
    @include('layouts.frontend.about')
    @include('layouts.frontend.services')




    <!-- Featured Properties -->
    <section id="properties" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">PROPERTIES</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Featured Listings</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover our latest property listings available for sale or
                    auction</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Property 1 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div
                            class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            For Sale
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kampala, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Luxury Villa in Kololo</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX
                                850M</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Beautiful 4-bedroom villa with modern
                            amenities in prime location.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bed"></i>
                                <span>4 Beds</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>450 m²</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div
                            class="absolute top-4 right-4 bg-green-600 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            Auction
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Entebbe, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Commercial Building</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX
                                1.2B</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Prime commercial property with high rental
                            yield potential.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-building"></i>
                                <span>5 Floors</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-store"></i>
                                <span>8 Units</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>800 m²</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div
                            class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            For Sale
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jinja, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Modern Apartment</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX
                                320M</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Spacious 3-bedroom apartment in a secure
                            gated community.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bath"></i>
                                <span>2 Baths</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>280 m²</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8 md:mt-12">
                <a href="{{ route('properties') }}"
                    class="bg-red-900 text-white px-6 md:px-8 py-3 rounded-lg hover:bg-red-800 transition font-semibold">
                    View All Properties
            </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
        </div>
        <div class="absolute inset-0 bg-red-900 opacity-95"></div>

        <div class="relative container mx-auto px-6 lg:px-12 text-center text-white">
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-4 md:mb-6">Looking for Professional Legal Services?
            </h2>
            <p class="text-base md:text-xl mb-6 md:mb-8 text-red-100 max-w-2xl mx-auto">Get in touch with our expert
                team today and let us help you resolve your case efficiently</p>
            <button
                class="bg-white text-red-900 px-8 md:px-10 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition text-base md:text-lg font-semibold">
                Schedule a Consultation
            </button>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 md:py-20 bg-gray-100">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">TESTIMONIALS</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Don't just take our word for it - hear from our satisfied
                    clients</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"Pamoja Chambers handled our debt
                        collection case with utmost professionalism. They recovered 95% of our outstanding debts within
                        3 months. Highly recommended!"</p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">David Mukasa</h4>
                            <p class="text-gray-500 text-sm">Business Owner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"I sold my property through their auction
                        service and got a better price than expected. The entire process was transparent and efficient."
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Namuli</h4>
                            <p class="text-gray-500 text-sm">Property Owner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"Their legal consultants provided
                        excellent advice on our commercial dispute. Professional, knowledgeable, and results-oriented.
                        Thank you!"</p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">James Okello</h4>
                            <p class="text-gray-500 text-sm">CEO, Tech Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









</x-guest-layout>