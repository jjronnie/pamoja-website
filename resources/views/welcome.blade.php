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

                @foreach ($properties as $property)


                <!-- Property  -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">

                        @if($property->hasFeaturedImage())
                        <img src="{{ $property->getFeaturedImageUrl('preview') }}" alt="{{ $property->name }} "
                            class="w-full h-56 md:h-72 object-cover  brightness-50" loading="lazy">
                        @else
                        <x-empty-state message="No Image." />
                        @endif

                        <div
                            class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            {{ $property->status ?? '' }}
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $property->location ?? '' }}</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">{{ $property->name }}</h3>

                        </div>


                        <p class="text-gray-600 mb-4 text-sm md:text-base">{{ $property->short_description ?? '' }}</p>


                        @php
                        $message = urlencode("Hi Pamoja Chambers, I have seen this property on your website
                        and I'm
                        interested in it. I'd like to discuss further: " . route('properties.show',
                        $property->slug));
                        @endphp

                        <div class="flex items-center gap-2">
                            <!-- View (Wide, with text) -->
                            <a href="{{ route('properties.show', $property->slug) }}"
                                class="flex-1 flex items-center justify-center gap-2 bg-red-900 border text-white border-red-900  py-2 rounded-lg font-semibold text-sm md:text-base transition-all duration-300 hover:text-red-900 hover:bg-white">
                                <span>View Property</span>

                                <i class="fa fa-arrow-up rotate-45 "></i>
                            </a>

                            <!-- Call -->
                            <a href="tel:+256393243211"
                                class="w-10 h-10 flex items-center justify-center border border-red-900 text-red-900 rounded-lg transition-all duration-300 hover:text-white hover:bg-red-900">
                                <i class="fas fa-phone"></i>
                            </a>

                            <!-- WhatsApp -->
                            <a href="https://wa.me/+256776141212?text={{ $message }}" target="_blank"
                                class="w-10 h-10 flex items-center justify-center border border-red-900 text-red-900 rounded-lg transition-all duration-300 hover:text-white hover:bg-red-900">
                                <i class="fab fa-whatsapp"></i>
                            </a>



                            <!-- Email -->
                            <a href="mailto:pamojachambers@gmail.com?subject=Property%20Inquiry&body={{ urlencode('Hello Pamoja Chambers, I’m interested in this property: ' . route('properties.show', $property->slug)) }} "
                                target="_blank"
                                class="w-10 h-10 flex items-center justify-center border border-red-900 text-red-900 rounded-lg transition-all duration-300 hover:text-white hover:bg-red-900">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach




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
                <a href="{{ route('contact') }}">
                    Get In Touch</a>
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