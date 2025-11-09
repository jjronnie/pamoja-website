<x-app-layout>

    {{-- Title and Action Buttons --}}
    <div class="flex justify-between items-center mb-6">
        <x-page-title title="Property Details: {{ $property->name }}" />

</div>
 <div class="flex items-center space-x-2 mb-6">
    <a href="{{ route('admin.properties.toggleFeatured', $property) }}"
       class="btn {{ $property->is_featured ? 'btn' : 'btn-gray' }}">
        {{ $property->is_featured ? 'Remove from Featured' : 'Add to Featured' }}
        <i data-lucide="star" class="w-4 h-4 ml-2"></i>
    </a>

    @include('admin.properties.edit-form')
</div>

    

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- 1. Main Content Area (Details & Gallery) --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- Property Description Card --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Description</h2>
                @if ($property->description)
                <p class="text-gray-600 leading-relaxed">{{ $property->description }}</p>
                @else
                <p class="text-gray-500 italic">No detailed description provided.</p>
                @endif
            </div>

            {{-- Property Gallery Card --}}
            <div class="bg-white rounded-lg shadow-md p-6">

                @include('admin.properties.add-photo')


                <h2 class="text-2xl font-bold text-gray-800 mt-4 mb-4">
                    Property Gallery
                    <span class="text-sm">( {{ $property->getMedia('gallery')->count() }} images)</span>
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($property->getMedia('gallery') as $media)
                    <div class="relative overflow-hidden rounded-lg shadow-md aspect-square group">
                        <img src="{{ $media->getUrl('large') }}" alt="{{ $property->name }} Image"
                            class="w-full h-full object-cover">

                        {{-- Delete trigger on hover --}}
                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition">
                            <x-confirm-modal
                                :action="route('admin.properties.gallery.remove', ['property' => $property->id, 'media' => $media->id])"
                                warning="Are you sure you want to delete this image? This action cannot be undone."
                                triggerIcon="trash" />
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>



        </div>

        {{-- 2. Sidebar Area (Featured Image, Attributes, Status) --}}
        <div class="lg:col-span-1 space-y-8">

            {{-- Featured Image Card --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Featured Image</h3>

                @if($property->hasFeaturedImage())
                <img src="{{ $property->getFeaturedImageUrl('preview') }}" alt="{{ $property->name }} Featured">
                @else
                <x-empty-state message="No Image." />
                @endif

            </div>

            {{-- Core Attributes and Status Card --}}
            <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Attributes & Status</h3>

                <p class="detail-row">
                    <span class="font-medium text-gray-500">Slug:</span>
                    <span class="text-sm bg-gray-100 px-2 py-0.5 rounded">{{ $property->slug }}</span>
                </p>

                <p class="detail-row">
                    <span class="font-medium text-gray-500">Status:</span>
                    <span
                        class="text-sm font-semibold {{ $property->is_published ? 'text-green-600' : 'text-yellow-600' }}">
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
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Categories</h3>
                @if ($property->categories->count() > 0)
                <div class="flex flex-wrap gap-2">
                    @foreach ($property->categories as $category)
                    <span
                        class="inline-flex items-center px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
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

    </style>


</x-app-layout>