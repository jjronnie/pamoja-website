    <!-- About Section -->
    <section id="about" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="order-2 md:order-1">
                    <div class="relative">
                        <img src="{{ asset('assets/img/scale.webp') }}"
                            alt="About" class="rounded-2xl shadow-2xl w-full">
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 md:p-6 rounded-xl shadow-xl">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <i class="fas fa-award text-red-900 text-3xl md:text-4xl"></i>
                                <div>
                                    <p class="text-xl md:text-2xl font-bold text-gray-900">15+</p>
                                    <p class="text-gray-600 text-sm">Years of Excellence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 md:order-2">
                    <p class="text-red-900 font-semibold mb-2">ABOUT US</p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-6">The Leading Debt
                        Collection & Legal Services Provider</h2>
                    <p class="text-gray-600 mb-6">With over 15 years of experience, Pamoja Chambers has established
                        itself as a trusted name in debt collection, legal consultancy, and property services across
                        Uganda. Our team of experienced professionals is dedicated to providing ethical, effective, and
                        efficient solutions.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Professional Team</h4>
                                <p class="text-gray-600 text-sm">Expert legal professionals</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Ethical Practice</h4>
                                <p class="text-gray-600 text-sm">Transparent operations</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Fast Results</h4>
                                <p class="text-gray-600 text-sm">Quick case resolution</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">24/7 Support</h4>
                                <p class="text-gray-600 text-sm">Always available</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('about') }}"
                        class="btn">
                        Learn More About Us
                </a>
                </div>
            </div>
        </div>
    </section>