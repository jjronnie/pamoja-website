<x-guest-layout>

    <x-breadcrumb :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Property Title'],
]" />

  <section class="py-8 md:py-12">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                            <div>
                                <div class="flex items-center space-x-3 mb-2">
                                    <span class="bg-red-900 text-white px-4 py-1 rounded-lg text-sm font-semibold">For
                                        Sale</span>
                                    <span
                                        class="bg-green-100 text-green-800 px-4 py-1 rounded-lg text-sm font-semibold">Featured</span>
                                </div>
                                <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">Luxury Villa in Kololo
                                </h1>
                                <div class="flex items-center text-gray-600 space-x-2">
                                    <i class="fas fa-map-marker-alt text-red-900"></i>
                                    <span class="text-sm md:text-base">Plot 45, Acacia Avenue, Kololo, Kampala,
                                        Uganda</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Price</p>
                                <p class="text-3xl md:text-4xl font-bold text-red-900">UGX 850M</p>
                                <p class="text-sm text-gray-600">≈ $227,000 USD</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-white rounded-xl p-6 shadow-lg">
                            <div class="text-center">
                                <i class="fas fa-bed text-red-900 text-2xl mb-2"></i>
                                <p class="text-2xl font-bold text-gray-900">4</p>
                                <p class="text-sm text-gray-600">Bedrooms</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-bath text-red-900 text-2xl mb-2"></i>
                                <p class="text-2xl font-bold text-gray-900">3</p>
                                <p class="text-sm text-gray-600">Bathrooms</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-ruler-combined text-red-900 text-2xl mb-2"></i>
                                <p class="text-2xl font-bold text-gray-900">450</p>
                                <p class="text-sm text-gray-600">m² Area</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-car text-red-900 text-2xl mb-2"></i>
                                <p class="text-2xl font-bold text-gray-900">2</p>
                                <p class="text-sm text-gray-600">Parking</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img id="main-image"
                                src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Property Main" class="w-full h-64 md:h-96 lg:h-[500px] object-cover">
                           
                           
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="grid grid-cols-4 md:grid-cols-6 gap-2 md:gap-3">
                            <div class="thumbnail active rounded-lg overflow-hidden cursor-pointer"
                                onclick="changeImage(0)">
                                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 1" class="w-full h-16 md:h-20 object-cover">
                            </div>
                            <div class="thumbnail rounded-lg overflow-hidden cursor-pointer" onclick="changeImage(1)">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 2" class="w-full h-16 md:h-20 object-cover">
                            </div>
                            <div class="thumbnail rounded-lg overflow-hidden cursor-pointer" onclick="changeImage(2)">
                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 3" class="w-full h-16 md:h-20 object-cover">
                            </div>
                            <div class="thumbnail rounded-lg overflow-hidden cursor-pointer" onclick="changeImage(3)">
                                <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 4" class="w-full h-16 md:h-20 object-cover">
                            </div>
                            <div class="thumbnail rounded-lg overflow-hidden cursor-pointer" onclick="changeImage(4)">
                                <img src="https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 5" class="w-full h-16 md:h-20 object-cover">
                            </div>
                            <div class="thumbnail rounded-lg overflow-hidden cursor-pointer" onclick="changeImage(5)">
                                <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                    alt="Thumbnail 6" class="w-full h-16 md:h-20 object-cover">
                            </div>
                         
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Property Description</h2>
                        <div class="prose max-w-none text-gray-600 space-y-4">
                            <p>Welcome to this magnificent luxury villa nestled in the heart of Kololo, one of Kampala's
                                most prestigious neighborhoods. This stunning property offers an exceptional blend of
                                modern design, comfort, and sophisticated living.</p>

                            <p>The villa boasts 4 spacious bedrooms, each with en-suite facilities, providing ultimate
                                privacy and comfort for family members and guests. The master bedroom features a large
                                walk-in closet and a luxurious bathroom with both a bathtub and separate shower.</p>

                            <p>The open-plan living and dining area creates a perfect space for entertaining, with
                                floor-to-ceiling windows that flood the space with natural light and offer beautiful
                                views of the landscaped garden. The modern kitchen is equipped with high-end appliances,
                                granite countertops, and ample storage space.</p>

                            <p>Outside, the property features a beautifully maintained garden, a covered patio perfect
                                for outdoor dining, and a secure parking area for two vehicles. The compound is fully
                                walled with electric fencing and 24/7 security, ensuring complete peace of mind.</p>

                            <p>This property is ideally located near international schools, shopping centers, hospitals,
                                and major business districts, making it perfect for families and professionals alike.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Features & Amenities</h2>
                        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Air Conditioning</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Modern Kitchen</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Balcony</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Garden</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Security System</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Backup Generator</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Water Tank</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Tiled Floors</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Wardrobes</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Servant Quarter</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">Internet Ready</span>
                            </div>
                            <div class="feature-badge flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <span class="text-gray-700">DSTV Ready</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Property Details</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Property ID:</span>
                                    <span class="font-semibold text-gray-900">PCH-2024-001</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Property Type:</span>
                                    <span class="font-semibold text-gray-900">Villa</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Property Status:</span>
                                    <span class="font-semibold text-gray-900">For Sale</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Bedrooms:</span>
                                    <span class="font-semibold text-gray-900">4</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Bathrooms:</span>
                                    <span class="font-semibold text-gray-900">3</span>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Land Area:</span>
                                    <span class="font-semibold text-gray-900">450 m²</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Year Built:</span>
                                    <span class="font-semibold text-gray-900">2020</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Parking:</span>
                                    <span class="font-semibold text-gray-900">2 Cars</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Land Title:</span>
                                    <span class="font-semibold text-gray-900">Private Mailo</span>
                                </div>
                                <div class="flex justify-between border-b pb-3">
                                    <span class="text-gray-600">Furnished:</span>
                                    <span class="font-semibold text-gray-900">Semi-Furnished</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Location</h2>
                        <div class="mb-6">
                            <div class="flex items-start space-x-3 mb-4">
                                <i class="fas fa-map-marker-alt text-red-900 text-xl mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Plot 45, Acacia Avenue</p>
                                    <p class="text-gray-600">Kololo, Kampala, Uganda</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-school text-gray-600"></i>
                                    <span class="text-gray-600">International School of Uganda - 1.2 km</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-hospital text-gray-600"></i>
                                    <span class="text-gray-600">Nakasero Hospital - 2.5 km</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-shopping-cart text-gray-600"></i>
                                    <span class="text-gray-600">Acacia Mall - 0.8 km</span>
                                </div>
                            </div>
                        </div>
                        <div class="map-container rounded-xl flex items-center justify-center text-gray-600">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt text-6xl mb-4 text-gray-400"></i>
                                <p>Interactive Map</p>
                                <p class="text-sm">(Integrate Google Maps or similar)</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Similar Properties</h2>
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition">
                                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Similar Property" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-900 mb-2">Modern Apartment</h3>
                                    <p class="text-red-900 font-bold text-xl mb-2">UGX 320M</p>
                                    <p class="text-gray-600 text-sm mb-3">Nakasero, Kampala</p>
                                    <div class="flex items-center space-x-1 mt-1">
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <span class="text-xs text-gray-600 ml-2">(48 reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition">
                                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Similar Property" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-900 mb-2">Elegant Townhouse</h3>
                                    <p class="text-red-900 font-bold text-xl mb-2">UGX 680M</Gbp>
                                    <p class="text-gray-600 text-sm mb-3">Bugolobi, Kampala</p>
                                    <div class="flex items-center justify-between text-sm text-gray-600">
                                        <span><i class="fas fa-bed"></i> 3</span>
                                        <span><i class="fas fa-bath"></i> 3</span>
                                        <span><i class="fas fa-ruler-combined"></i> 380m²</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="sticky-sidebar space-y-6">
                        <div class="bg-white rounded-xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Contact Agent</h3>
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-red-900 text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Johnny Smith</h4>
                                    <p class="text-sm text-gray-600">Senior Estate Agent</p>
                                    <div class="flex items-center space-x-2 text-xs text-gray-500 mt-1">
                                        <span><i class="fas fa-star text-yellow-400"></i> 4.9</span>
                                        <span>(120 reviews)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <a href="tel:+256123456789"
                                    class="flex items-center justify-center space-x-2 bg-red-900 text-white py-3 rounded-lg hover:bg-red-800 transition">
                                    <i class="fas fa-phone"></i>
                                    <span>+256 123 456 789</span>
                                </a>
                                <a href="mailto:johnny.smith@pamojachambers.co.ug"
                                    class="flex items-center justify-center space-x-2 bg-gray-100 text-gray-900 py-3 rounded-lg hover:bg-gray-200 transition">
                                    <i class="fas fa-envelope"></i>
                                    <span class="text-sm">Send Email</span>
                                </a>
                                <button
                                    class="flex items-center justify-center space-x-2 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition w-full">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </button>
                            </div>

                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name</label>
                                    <input type="text" placeholder="John Doe"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-900">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Your Email</label>
                                    <input type="email" placeholder="john@example.com"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-900">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Your Message</label>
                                    <textarea rows="4" placeholder="I'm interested in this property..."
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-900"></textarea>
                                </div>
                                <button type="submit"
                                    class="w-full bg-red-900 text-white py-3 rounded-lg hover:bg-red-800 transition font-semibold">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

       <script>
   

        // --- Image Gallery ---
        const images = [
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
         
        ];

        let currentImageIndex = 0;
        const mainImage = document.getElementById('main-image');
        const imageCounter = document.getElementById('image-counter');
        const thumbnails = document.querySelectorAll('.thumbnail');

        function updateGallery(index) {
            // Update main image
            mainImage.src = images[index];

            // Update counter
            imageCounter.textContent = `${index + 1} / ${images.length}`;

            // Update active thumbnail
            thumbnails.forEach((thumb, i) => {
                if (i === index) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });

            // Update current index
            currentImageIndex = index;
        }

        function changeImage(index) {
            updateGallery(index);
        }

        function nextImage() {
            let nextIndex = currentImageIndex + 1;
            if (nextIndex >= images.length) {
                nextIndex = 0; // Loop back to start
            }
            updateGallery(nextIndex);
        }

        function previousImage() {
            let prevIndex = currentImageIndex - 1;
            if (prevIndex < 0) {
                prevIndex = images.length - 1; // Loop to end
            }
            updateGallery(prevIndex);
        }

        // Initialize gallery
        updateGallery(0);

    </script>


</x-guest-layout>