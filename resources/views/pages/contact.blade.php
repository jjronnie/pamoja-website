<x-guest-layout>



    <x-breadcrumb :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Connect with Us'],
    ]" description="We're here to help. Contact us by email, phone, or using the form below.." />

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
                <!-- Contact Info -->
                <div>
                    <p class="text-red-900 font-semibold mb-2">CONTACT US</p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-6">Get In Touch With
                        Us</h2>
                    <p class="text-gray-600 mb-6 md:mb-8">Have questions or need our services? Reach out to us and we'll
                        respond promptly.</p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Office Location</h4>
                                <p class="text-gray-600 text-sm md:text-base">Old Kampala, Martin Road, Solomon's Plaza,
                                    1st Floor, Suite #E 09, Opp Quality Supermarket, Kampala Uganda.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Call Us On</h4>

                                <a href="tel:+256393243211"
                                    class="text-gray-600 text-sm md:text-base hover:text-red-900 transition block">
                                    +256 393 243 211
                                </a>
                                <a href="tel:+256700141212"
                                    class="text-gray-600 text-sm md:text-base hover:text-red-900 transition block">
                                    +256 700 141 212
                                </a>
                                <a href="tel:+256776141212"
                                    class="text-gray-600 text-sm md:text-base hover:text-red-900 transition block">
                                    +256 776 141 212
                                </a>
                            </div>

                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email Address</h4>
                                <p class="text-gray-600 text-sm md:text-base">pamojachambers@gmail.com</p>
                            </div>
                        </div>


                    </div>

                    <div class="mt-6 md:mt-8 flex space-x-4">

                        <a href="https://wa.me/256776141212" target="_blank"
                            class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-whatsapp "></i>
                        </a>

                        <a href="#"
                            class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-instagram"></i>
                        </a>



                    </div>
                </div>

                <!-- Contact Form -->
               @include('layouts.frontend.contact-form')


            </div>
        </div>
    </section>


</x-guest-layout>