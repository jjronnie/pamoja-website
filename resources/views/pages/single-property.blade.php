<x-guest-layout>

    <x-breadcrumb :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Properties', 'url' => route('properties')],
    ['label' => $property->name]
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
                                <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">{{ $property->name }}
                                </h1>
                                <div class="flex items-center text-gray-600 space-x-2">
                                    <i class="fas fa-map-marker-alt text-red-900"></i>
                                    <span class="text-sm md:text-base">Plot 45, Acacia Avenue, Kololo, Kampala,
                                        Uganda</span>
                                </div>
                            </div>

                        </div>

                        <div class="mb-6">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                @if($property->hasFeaturedImage())
                                <img src="{{ $property->getFeaturedImageUrl('preview') }}" loading="lazy"
                                    alt="{{ $property->name }} Featured"
                                    class="w-full h-64 md:h-96 lg:h-[500px] object-cover">

                                @else
                                <x-empty-state message="No Image." />
                                @endif


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






                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Property Description</h2>
                        <div class="prose max-w-none text-gray-600 space-y-4">
                            <p>{{ $property->description }}</p>


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



                    <h2 class="text-3xl font-bold mb-6">Image Gallery</h2>

                    <!-- Gallery Grid -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">

                        @if($property->getMedia('gallery')->isNotEmpty())
                        @foreach($property->getMedia('gallery') as $media)
                        <img src="{{ $media->getUrl('large') }}" alt="{{ $property->name }} Image" loading="lazy"
                            class="w-full h-full object-cover rounded-md cursor-pointer" onclick="openImage(this.src)">
                        @endforeach
                        @else
                        <x-empty-state message="No Images." />
                        @endif

                    </div>



                    <!-- Full Screen Modal -->
                    <div id="imgModal"
                        class="fixed inset-0 bg-black bg-opacity-80 hidden z-[999] flex items-center justify-center"
                        onclick="closeImage()">

                        <img id="modalImg" class="max-w-[95%] max-h-[95%] rounded-lg shadow-lg" />

                        <!-- Close button -->
                        <button class="absolute top-5 right-5 text-white text-4xl font-bold"
                            onclick="closeImage()">&times;</button>
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
                            <h3 class="text-xl font-bold text-center text-gray-900 mb-4">Interested in this Property?
                                <br>Get In Touch
                            </h3>
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                    <x-logo />
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Pamoja Chambers</h4>
                                    <p class="text-sm text-gray-600">
                                        <a href="mailto:info@pamoja.com">Info@pamoja.com</a>
                                    </p>

                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <a href="tel:+256123456789"
                                    class="flex items-center justify-center space-x-2 bg-red-900 text-white py-3 rounded-lg hover:bg-red-800 transition">
                                    <i class="fas fa-phone"></i>
                                    <span>+256 123 456 789</span>
                                </a>

                                <button
                                    class="flex items-center justify-center space-x-2 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition w-full">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </button>

                                <a href="mailto:johnny.smith@pamojachambers.co.ug"
                                    class="flex items-center justify-center space-x-2 bg-gray-100 text-gray-900 py-3 rounded-lg hover:bg-gray-200 transition">
                                    <i class="fas fa-envelope"></i>
                                    <span class="text-sm">Send Email</span>
                                </a>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        function openImage(src) {
      document.getElementById('modalImg').src = src;
      document.getElementById('imgModal').classList.remove('hidden');
    }
    function closeImage() {
      document.getElementById('imgModal').classList.add('hidden');
    }

      

    </script>


</x-guest-layout>