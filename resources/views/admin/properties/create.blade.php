<x-app-layout>
    <x-page-title title="Create New Property" />
    <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Property Details</h3>
                    <div class="space-y-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="label"> Name/Title <span class="text-red-600"> *</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="input @error('name') border-red-500 @enderror" />
                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Short Description -->
                            <div>
                                <label for="short_description" class="label">Short Description</label>
                                <input type="text" name="short_description" id="short_description"
                                    value="{{ old('short_description') }}"
                                    class="input @error('short_description') border-red-500 @enderror" />
                                @error('short_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="label">Status</label>
                                <select name="status" id="status"
                                    class="input @error('status') border-red-500 @enderror">
                                    <option value="">Select status</option>
                                    <option value="on_sale" {{ old('status')=='on_sale' ? 'selected' : '' }}>On Sale
                                    </option>
                                    <option value="sold" {{ old('status')=='sold' ? 'selected' : '' }}>Sold</option>
                                </select>

                                @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>





                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- location -->
                            <div>
                                <label for="location" class="label">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location') }}"
                                    class="input @error('location') border-red-500 @enderror" />
                                @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Directions -->
                            <div>
                                <label for="directions" class="label">Directions</label>
                                <textarea name="directions" id="directions"
                                    class="input @error('directions') border-red-500 @enderror">{{ old('directions') }}</textarea>
                                @error('directions')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <!-- Latitude -->
                            <div>
                                <label for="latitude" class="label">Latitude</label>
                                <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}"
                                    class="input @error('latitude') border-red-500 @enderror" />
                                @error('latitude')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Longitude -->
                            <div>
                                <label for="longitude" class="label">Longitude</label>
                                <input type="text" name="longitude" id="longitude" value="{{ old('longitude') }}"
                                    class="input @error('longitude') border-red-500 @enderror" />
                                @error('longitude')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1  gap-4">
                            <div>
                                <label for="description" class="label">Full Description</label>
                                <textarea name="description" id="description" rows="5"
                                    class="input @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Image Upload Section -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Featured Image
                        <span class="text-gray-500 font-normal">(Main property photo)</span>
                    </label>

                    <!-- Upload Button -->
                    <div class="mb-4">
                        <label for="featured_image" class="btn">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Choose Featured Image
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*" class="hidden"
                            onchange="previewFeaturedImage(event)">
                        <span class="ml-3 text-sm text-gray-500" id="featured-file-name">No file chosen</span>
                    </div>

                    <!-- Preview Container -->
                    <div id="featured-preview-container" class="hidden">
                        <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200">
                            <div class="flex items-start justify-between mb-2">
                                <h4 class="text-sm font-semibold text-gray-700">Preview:</h4>
                                <button type="button" onclick="removeFeaturedPreview()"
                                    class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Remove
                                </button>
                            </div>
                            <div id="featured-preview" class="flex justify-center">
                                <!-- Preview image will be inserted here -->
                            </div>
                            <div id="featured-info" class="mt-3 text-xs text-gray-600">
                                <!-- File info will be inserted here -->
                            </div>
                        </div>
                    </div>

                    @error('featured_image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Gallery Images Upload Section -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Gallery Images
                        <span class="text-gray-500 font-normal">(Upload multiple images)</span>
                    </label>

                    <!-- Upload Button -->
                    <div class="mb-4">
                        <label for="gallery_images"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg cursor-pointer hover:bg-green-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Choose Gallery Images
                        </label>
                        <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                            class="hidden" onchange="previewGalleryImages(event)">
                        <span class="ml-3 text-sm text-gray-500" id="gallery-file-count">No files chosen</span>
                    </div>

                    <!-- Gallery Preview Container -->
                    <div id="gallery-preview-container" class="hidden">
                        <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-sm font-semibold text-gray-700">Preview (<span
                                        id="gallery-count">0</span> images):</h4>
                                <button type="button" onclick="clearAllGalleryPreviews()"
                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    Clear All
                                </button>
                            </div>
                            <div id="gallery-preview" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <!-- Preview images will be inserted here -->
                            </div>
                        </div>
                    </div>

                    @error('gallery_images.*')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Status</h3>
                    <label for="is_published" class="label">Publish Status <span class="text-red-600">*</span></label>
                    <select name="is_published" id="is_published"
                        class="input @error('is_published') border-red-500 @enderror">
                        <option value="1" {{ old('is_published')=='1' ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', '0' )=='0' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('is_published')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Categories <span
                            class="text-red-600">*</span></h3>
                    <div
                        class="space-y-2 h-48 overflow-y-auto border rounded-md p-3 @error('categories')  @enderror @error('categories.*') border-red-500 @enderror">
                        @forelse($categories as $category)
                        <div class="flex items-center">
                            <input type="checkbox" name="categories[]" id="category_{{ $category->id }}"
                                value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ?
                            'checked' : '' }}
                            class="h-4 w-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                            <label for="category_{{ $category->id }}" class="ml-3 block text-sm text-gray-700">
                                {{ $category->name }}
                            </label>
                        </div>
                        @empty
                        <p class="text-gray-500 text-sm">No categories found.</p>
                        @endForelse
                    </div>
                    @error('categories')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @error('categories.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">

                    <!-- Features (Dynamic Key-Value Pairs) -->
                    <div x-data="{ features: @json(old('features', [])) }">
                        <label class="label">Features & Custom Fields</label>
                        <template x-for="(value, key) in features" :key="key">
                            <div class="flex space-x-2 mb-2">
                                <input type="text" :name="'features[' + key + '][key]'" placeholder="Field Name"
                                    x-model="features[key].key" class="input flex-1" />
                                <input type="text" :name="'features[' + key + '][value]'" placeholder="Value"
                                    x-model="features[key].value" class="input flex-1" />
                                <button type="button" @click="features.splice(key, 1)" class="btn">Remove</button>
                            </div>
                        </template>
                        <button type="button" @click="features.push({key: '', value: ''})" class="btn mt-2">Add
                            Feature</button>
                        @error('features')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6 border-t pt-6">
            <a href="{{ route('admin.properties.index') }}" class="btn-gray">
                Cancel
            </a>
            <button type="submit" class="btn">
                Save Property <i data-lucide="save" class="w-4 h-4 ml-2"></i>
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        // Store gallery files for management
    let galleryFiles = [];
    let galleryDataTransfer = new DataTransfer();

    // Preview Featured Image
    function previewFeaturedImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('featured-preview-container');
        const preview = document.getElementById('featured-preview');
        const fileName = document.getElementById('featured-file-name');
        const fileInfo = document.getElementById('featured-info');
        
        if (file) {
            // Update file name
            fileName.textContent = file.name;
            
            // Create preview
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}" 
                         class="max-w-md w-full h-64 object-cover rounded-lg shadow-md border-2 border-gray-300">
                `;
                
                // Display file info
                const fileSize = (file.size / 1024).toFixed(2);
                fileInfo.innerHTML = `
                    <div class="flex items-center space-x-4">
                        <span><strong>Name:</strong> ${file.name}</span>
                        <span><strong>Size:</strong> ${fileSize} KB</span>
                        <span><strong>Type:</strong> ${file.type}</span>
                    </div>
                `;
                
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Remove Featured Image Preview
    function removeFeaturedPreview() {
        const input = document.getElementById('featured_image');
        const previewContainer = document.getElementById('featured-preview-container');
        const fileName = document.getElementById('featured-file-name');
        
        input.value = '';
        fileName.textContent = 'No file chosen';
        previewContainer.classList.add('hidden');
    }

    // Preview Gallery Images
    function previewGalleryImages(event) {
        const files = Array.from(event.target.files);
        const previewContainer = document.getElementById('gallery-preview-container');
        const preview = document.getElementById('gallery-preview');
        const fileCount = document.getElementById('gallery-file-count');
        const galleryCount = document.getElementById('gallery-count');
        
        if (files.length === 0) return;
        
        // Add new files to existing ones
        files.forEach((file, index) => {
            galleryFiles.push(file);
            galleryDataTransfer.items.add(file);
            
            const reader = new FileReader();
            reader.onload = function(e) {
                const fileIndex = galleryFiles.length - files.length + index;
                const div = document.createElement('div');
                div.className = 'relative group';
                div.dataset.index = fileIndex;
                div.innerHTML = `
                    <div class="relative">
                        <img src="${e.target.result}" 
                             class="w-full h-32 object-cover rounded-lg shadow-md border-2 border-gray-300 transition-transform duration-200 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <button type="button" 
                                    onclick="removeGalleryPreview(${fileIndex})"
                                    class="opacity-0 group-hover:opacity-100 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-600 truncate px-1" title="${file.name}">
                        ${file.name}
                    </div>
                    <div class="text-xs text-gray-500 px-1">
                        ${(file.size / 1024).toFixed(2)} KB
                    </div>
                `;
                preview.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
        
        // Update UI
        fileCount.textContent = `${galleryFiles.length} file(s) selected`;
        galleryCount.textContent = galleryFiles.length;
        previewContainer.classList.remove('hidden');
        
        // Update the input files
        document.getElementById('gallery_images').files = galleryDataTransfer.files;
    }

    // Remove Single Gallery Preview
    function removeGalleryPreview(index) {
        // Remove from arrays
        galleryFiles.splice(index, 1);
        
        // Rebuild DataTransfer
        galleryDataTransfer = new DataTransfer();
        galleryFiles.forEach(file => {
            galleryDataTransfer.items.add(file);
        });
        
        // Update input
        document.getElementById('gallery_images').files = galleryDataTransfer.files;
        
        // Rebuild preview
        rebuildGalleryPreview();
    }

    // Clear All Gallery Previews
    function clearAllGalleryPreviews() {
        galleryFiles = [];
        galleryDataTransfer = new DataTransfer();
        document.getElementById('gallery_images').value = '';
        document.getElementById('gallery_images').files = galleryDataTransfer.files;
        document.getElementById('gallery-file-count').textContent = 'No files chosen';
        document.getElementById('gallery-preview-container').classList.add('hidden');
        document.getElementById('gallery-preview').innerHTML = '';
    }

    // Rebuild Gallery Preview
    function rebuildGalleryPreview() {
        const preview = document.getElementById('gallery-preview');
        const fileCount = document.getElementById('gallery-file-count');
        const galleryCount = document.getElementById('gallery-count');
        const previewContainer = document.getElementById('gallery-preview-container');
        
        if (galleryFiles.length === 0) {
            previewContainer.classList.add('hidden');
            fileCount.textContent = 'No files chosen';
            return;
        }
        
        preview.innerHTML = '';
        
        galleryFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative group';
                div.dataset.index = index;
                div.innerHTML = `
                    <div class="relative">
                        <img src="${e.target.result}" 
                             class="w-full h-32 object-cover rounded-lg shadow-md border-2 border-gray-300 transition-transform duration-200 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-200 rounded-lg flex items-center justify-center">
                            <button type="button" 
                                    onclick="removeGalleryPreview(${index})"
                                    class="opacity-0 group-hover:opacity-100 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-600 truncate px-1" title="${file.name}">
                        ${file.name}
                    </div>
                    <div class="text-xs text-gray-500 px-1">
                        ${(file.size / 1024).toFixed(2)} KB
                    </div>
                `;
                preview.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
        
        fileCount.textContent = `${galleryFiles.length} file(s) selected`;
        galleryCount.textContent = galleryFiles.length;
    }
    </script>
    @endpush
</x-app-layout>