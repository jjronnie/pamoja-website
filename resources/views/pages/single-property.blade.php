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
                                    <span class="px-4 py-1 rounded-lg text-sm font-semibold
    {{ $property->status === 'sold'
        ? 'bg-red-100 text-red-800'
        : 'bg-green-100 text-green-800' }}">
                                        {{ $property->status === 'sold' ? 'SOLD' : 'ON SALE' }}
                                    </span>

                                    @if($property->is_featured)
                                    <span class="bg-red-900 text-white px-4 py-1 rounded-lg text-sm font-semibold">
                                        Featured
                                    </span>
                                    @endif

                                </div>
                                <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">{{ $property->name }}
                                </h1>
                                <div class="flex items-center text-gray-600 space-x-2">
                                    <span class="text-sm md:text-base">{{ $property->short_description ?? '' }}</span>
                                </div>
                            </div>
                            <div class="text-right hidden md:block">
                                <p class="text-sm text-gray-600 mb-1 mr-4">Category:</p>

                                @php
                                $category = $property->categories->first();
                                @endphp

                                <p class="text-2xl md:text-2xl font-bold text-red-900">
                                    <a href="{{ route('categories.show', $category->slug) }}">
                                        {{ $category?->name ?? '-' }}
                                    </a>
                                </p>
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


                    </div>

                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Property Details</h2>

                        @php
                        $features = json_decode($property->features ?? '{}', true) ?: [];
                        @endphp

                        @if(count($features))
                        <div class="space-y-2">
                            @foreach($features as $key => $value)
                            <div class="border-b pb-1">
                                <span class="text-gray-600 font-semibold">{{ $key }}:</span>
                                <span class="text-gray-900 ml-1">{{ $value }}</span>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-gray-500">No features added for this property.</p>
                        @endif
                    </div>






                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Property Description</h2>
                        <div class="prose max-w-none text-gray-600 space-y-4">
                            <p>{{ $property->description ?? '' }}</p>


                        </div>
                    </div>




                    <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Location</h2>
                        <div class="mb-6">
                            <div class="flex items-start space-x-3 mb-4">
                                <i class="fas fa-map-marker-alt text-red-900 text-xl mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $property->location ?? '' }}</p>
                                    <p class="text-gray-600">{{ $property->directions ?? '' }}</p>
                                </div>
                            </div>

                        </div>


                        @if($property->latitude && $property->longitude)
                        <div class="map-container rounded-xl w-full h-80">
                            <div id="map" class="w-full h-full rounded-xl"></div>

                            <!-- Leaflet CSS -->
                            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

                            <!-- Leaflet JS -->
                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                const propertyLocation = [{{ $property->latitude }}, {{ $property->longitude }}];

                const map = L.map('map').setView(propertyLocation, 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.marker(propertyLocation)
                    .addTo(map)
                    .bindPopup("{{ $property->name }}")
                    .openPopup();
            });
                            </script>
                        </div>
                        @endif


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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">You may also Like </h2>
                        <div class="grid sm:grid-cols-2 gap-6">
                            @foreach ($relatedProperties as $property)


                            <!-- Property  -->
                            <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                                <div class="relative">

                                    @if($property->hasFeaturedImage())
                                    <img src="{{ $property->getFeaturedImageUrl('preview') }}"
                                        alt="{{ $property->name }} "
                                        class="w-full h-56 md:h-72 object-cover  brightness-50" loading="lazy">
                                    @else
                                    <x-empty-state message="No Image." />
                                    @endif

                                    <div class="absolute top-4 right-4 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm
    {{ $property->status === 'sold' ? 'bg-red-600' : 'bg-green-600' }}">
                                        {{ $property->status === 'sold' ? 'Sold' : 'On Sale' }}
                                    </div>

                                    <div
                                        class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $property->location ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="p-4 md:p-6">
                                    <div class="flex justify-between items-start mb-3 md:mb-4">
                                        <h3 class="text-lg md:text-xl font-bold text-gray-900">{{ $property->name }}
                                        </h3>

                                    </div>


                                    <p class="text-gray-600 mb-4 text-sm md:text-base">{{ $property->short_description
                                        ?? ''
                                        }}</p>



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
                                        <a href="mailto:pamojachambers@gmail.com">pamojachambers@gmail.com</a>
                                    </p>

                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <a href="tel:+256 393 243 211"
                                    class="flex items-center justify-center space-x-2 bg-red-900 text-white py-3 rounded-lg hover:bg-red-800 transition">
                                    <i class="fas fa-phone"></i>
                                    <span>+256 393 243 211</span>
                                </a>
                                @php
                                $message = urlencode("Hi Pamoja Chambers, I have seen this property on your website
                                and I'm
                                interested in it. I'd like to discuss further: " . route('properties.show',
                                $property->slug));
                                @endphp

                                <a href="https://wa.me/+256776141212?text={{ $message }}" target="_blank"
                                    class="flex items-center justify-center space-x-2 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition w-full">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>

                                <a href="mailto:pamojachambers@gmail.com?subject=Property%20Inquiry&body={{ urlencode('Hello Pamoja Chambers, I’m interested in this property: ' . route('properties.show', $property->slug)) }} "
                                    target="_blank"
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