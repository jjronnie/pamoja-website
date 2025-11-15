<x-guest-layout>

    <x-breadcrumb :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Property Categories','url' => route('properties') ],
         ['label' => $category->name]
    ]" />




    <!--  Properties -->
    <section id="properties" class="py-10 md:py-14">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2 uppercase">Category: {{ $category->name }} </p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Exclusive
                    Listings to Explore in Category: {{ $category->name }}</h2>
                
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
                            class="absolute top-4 right-4 bg-green-700 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
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


        </div>
    </section>


</x-guest-layout>