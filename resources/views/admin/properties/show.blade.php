<x-app-layout>

    {{-- Title and Action Buttons --}}
    <div class="flex justify-between items-center mb-6">
        <x-page-title title="Property Details: {{ $property->name }}" />
        <div class="space-x-2">
            <a href="{{ route('admin.properties.edit', $property) }}" class="btn">
                Edit Property <i data-lucide="pencil" class="w-4 h-4 ml-2"></i>
            </a>
            <a href="{{ route('admin.properties.index') }}" class="btn-gray">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- 1. Main Content Area (Details & Gallery) --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- Property Description Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Description</h2>
                @if ($property->description)
                    <p class="text-gray-600 leading-relaxed">{{ $property->description }}</p>
                @else
                    <p class="text-gray-500 italic">No detailed description provided.</p>
                @endif
            </div>

            {{-- Property Gallery Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Property Gallery</h2>
                @php
                    // Get all media in the 'photos' collection
                    $photos = $property->getMedia('photos');
                @endphp

                @if ($photos->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach ($photos as $photo)
                            <div class="relative overflow-hidden rounded-lg shadow-md aspect-square">
                                <img 
                                    src="{{ $photo->getUrl() }}" 
                                    alt="Property Photo {{ $loop->iteration }}" 
                                    class="w-full h-full object-cover transition duration-300 hover:scale-105"
                                >
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 italic">No gallery photos uploaded yet.</p>
                @endif
            </div>

        </div>

        {{-- 2. Sidebar Area (Featured Image, Attributes, Status) --}}
        <div class="lg:col-span-1 space-y-8">

            {{-- Featured Image Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Featured Image</h3>
                @php
                    // Get the first item in the 'featured_image' collection
                    $featuredImage = $property->getFirstMedia('featured_image');
                @endphp

                @if ($featuredImage)
                    <div class="aspect-video overflow-hidden rounded-lg shadow-md">
                        <img 
                            src="{{ $featuredImage->getUrl() }}" 
                            alt="Featured Image of {{ $property->name }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                @else
                    <div class="w-full h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border-2 border-dashed">
                        <span>No Featured Image</span>
                    </div>
                @endif
            </div>

            {{-- Core Attributes and Status Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6 space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Attributes & Status</h3>
                
                <p class="detail-row">
                    <span class="font-medium text-gray-500">Slug:</span>
                    <span class="text-sm bg-gray-100 px-2 py-0.5 rounded">{{ $property->slug }}</span>
                </p>

                <p class="detail-row">
                    <span class="font-medium text-gray-500">Status:</span>
                    <span class="text-sm font-semibold {{ $property->is_published ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ $property->is_published ? 'Published' : 'Draft' }}
                    </span>
                </p>

                <p class="detail-row">
                    <span class="font-medium text-gray-500">Size:</span>
                    <span class="text-gray-700">{{ $property->size ?? 'N/A' }}</span>
                </p>
                
                <p class="detail-row">
                    <span class="font-medium text-gray-500">Ownership:</span>
                    <span class="text-gray-700">{{ $property->ownership ?? 'N/A' }}</span>
                </p>

                <p class="detail-row">
                    <span class="font-medium text-gray-500">Created By:</span>
                    <span class="text-gray-700">{{ $property->creator->name ?? 'System' }}</span>
                </p>
                
                <p class="detail-row">
                    <span class="font-medium text-gray-500">Last Updated:</span>
                    <span class="text-gray-700">{{ $property->updated_at->diffForHumans() }}</span>
                </p>
            </div>

            {{-- Categories Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Categories</h3>
                @if ($property->categories->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach ($property->categories as $category)
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-primary-100 text-primary-800 rounded-full">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 italic">No categories assigned.</p>
                @endif
            </div>

        </div>
    </div>
    
 
    <style>
        .detail-row {
            @apply flex justify-between items-center border-b border-gray-100 pb-2 last:border-b-0 last:pb-0;
        }
    </style>


</x-app-layout>