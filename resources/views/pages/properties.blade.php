<x-guest-layout>

    <x-breadcrumb :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Properties'],
]" />


    <!-- Featured Properties -->
    <section id="properties" class="py-14 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">PROPERTIES</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Exclusive
                    Listings to Explore</h2>
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
                            class="w-full h-56 md:h-64 object-cover" loading="lazy">
                        @else
                        <x-empty-state message="No Image." />
                        @endif

                        <div
                            class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            {{ $property->ownership ?? '' }}
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kampala, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">{{ $property->name ?? '' }}</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX
                                850M</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">{{ $property->description ?? '' }}</p>
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
                @endforeach




            </div>


        </div>
    </section>


</x-guest-layout>