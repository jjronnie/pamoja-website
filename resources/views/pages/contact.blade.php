<x-guest-layout>

    <x-breadcrumb :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Contact'],
]" />

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
                                <p class="text-gray-600 text-sm md:text-base">Plot 123, Kampala Road, Kampala, Uganda
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Phone Number</h4>
                                <p class="text-gray-600 text-sm md:text-base">+256 123 456 789</p>
                                <p class="text-gray-600 text-sm md:text-base">+256 987 654 321</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email Address</h4>
                                <p class="text-gray-600 text-sm md:text-base">info@pamojachambers.co.ug</p>
                                <p class="text-gray-600 text-sm md:text-base">legal@pamojachambers.co.ug</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Working Hours</h4>
                                <p class="text-gray-600 text-sm md:text-base">Monday - Friday: 8:00 AM - 6:00 PM</p>
                                <p class="text-gray-600 text-sm md:text-base">Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 md:mt-8 flex space-x-4">
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
                <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8">
                    <form>
                        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Full
                                    Name</label>
                                <input type="text"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base"
                                    placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Email
                                    Address</label>
                                <input type="email"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base"
                                    placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Phone
                                    Number</label>
                                <input type="tel"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base"
                                    placeholder="+256 123 456 789">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Service
                                    Needed</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
                                    <option>Select Service</option>
                                    <option>Debt Collection</option>
                                    <option>Court Bailiffs</option>
                                    <option>Property Sales</option>
                                    <option>Legal Consultants</option>
                                    <option>Commission Agents</option>
                                    <option>Auctioneering</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 md:mb-6">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Message</label>
                            <textarea rows="5"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base"
                                placeholder="Tell us about your case..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-red-900 text-white py-3 md:py-4 rounded-lg hover:bg-red-800 transition font-semibold text-base md:text-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    </x-guest-layout>