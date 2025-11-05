<x-app-layout>

    <x-page-title title="Edit Property - {{ $property->name }}" />

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <style>
        .input-file {
            @apply block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100;
        }
        .filepond--root {
            font-family: inherit;
        }
        .filepond--panel-root {
            @apply bg-gray-50 border-gray-300;
        }
    </style>

    <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left Column --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Featured Image --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Featured Image <span class="text-red-600">*</span></h3>

                    <div class="mt-2">
                        @if ($property->featured_image)
                            <img id="featured_image_preview" src="{{ asset('storage/' . $property->featured_image) }}" alt="Current Image" class="w-full h-40 object-cover rounded-lg" />
                            <div id="featured_image_placeholder" class="hidden w-full h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border-2 border-dashed">
                                <span>Image Preview</span>
                            </div>
                        @else
                            <div id="featured_image_placeholder" class="w-full h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border-2 border-dashed">
                                <span>Image Preview</span>
                            </div>
                            <img id="featured_image_preview" src="#" alt="Preview" class="w-full h-40 object-cover rounded-lg hidden" />
                        @endif
                    </div>

                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="input-file mt-4 @error('featured_image') border-red-500 @enderror" />
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Property Details --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Property Details</h3>
                    <div class="space-y-4">

                        <div>
                            <label for="name" class="label">Name <span class="text-red-600">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $property->name) }}" required
                                class="input @error('name') border-red-500 @enderror" />
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="label">Description</label>
                            <textarea name="description" id="description" rows="5"
                                class="input @error('description') border-red-500 @enderror">{{ old('description', $property->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="size" class="label">Size (e.g., 1200 sqft)</label>
                                <input type="text" name="size" id="size" value="{{ old('size', $property->size) }}"
                                    class="input @error('size') border-red-500 @enderror" />
                                @error('size')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="ownership" class="label">Ownership (e.g., Freehold)</label>
                                <input type="text" name="ownership" id="ownership" value="{{ old('ownership', $property->ownership) }}"
                                    class="input @error('ownership') border-red-500 @enderror" />
                                @error('ownership')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Gallery --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Property Gallery</h3>
                    <div>
                        <label for="photos" class="label">Photos (Drag & Drop, Max 5)</label>
                        <input type="file" name="photos[]" id="photos" multiple>
                        @error('photos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('photos.*')
                            <p class="text-red-500 text-sm mt-1">One or more photos is invalid. {{ $message }}</p>
                        @enderror
                    </div>

                    @if($property->photos && count($property->photos))
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-4">
                            @foreach($property->photos as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Property Photo" class="rounded-lg shadow-sm h-32 w-full object-cover">
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

            {{-- Right Column --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- Status --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Status</h3>
                    <label for="is_published" class="label">Publish Status <span class="text-red-600">*</span></label>
                    <select name="is_published" id="is_published" class="input @error('is_published') border-red-500 @enderror">
                        <option value="1" {{ old('is_published', $property->is_published) == '1' ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', $property->is_published) == '0' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('is_published')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Categories --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Categories <span class="text-red-600">*</span></h3>
                    <div class="space-y-2 h-48 overflow-y-auto border rounded-md p-3 @error('categories') border-red-500 @enderror">
                        @forelse($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', $property->categories->pluck('id')->toArray())) ? 'checked' : '' }}
                                    class="h-4 w-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                                <label for="category_{{ $category->id }}" class="ml-3 block text-sm text-gray-700">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">No categories found.</p>
                        @endforelse
                    </div>
                    @error('categories')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6 border-t pt-6">
            <a href="{{ route('admin.properties.index') }}" class="btn-gray">Cancel</a>
            <button type="submit" class="btn">
                Update Property <i data-lucide="save" class="w-4 h-4 ml-2"></i>
            </button>
        </div>
    </form>

    {{-- FilePond Scripts --}}
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- Featured Image Preview ---
            const featuredImageInput = document.getElementById('featured_image');
            const featuredImagePreview = document.getElementById('featured_image_preview');
            const featuredImagePlaceholder = document.getElementById('featured_image_placeholder');

            featuredImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        featuredImagePreview.src = e.target.result;
                        featuredImagePreview.classList.remove('hidden');
                        featuredImagePlaceholder.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // --- FilePond Gallery Initialization ---
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(document.getElementById('photos'), {
                allowMultiple: true,
                maxFiles: 5,
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/gif', 'image/webp'],
                labelIdle: 'Drag & Drop your photos or <span class="filepond--label-action">Browse</span>',
                instantUpload: false,
                allowProcess: false
            });
        });
    </script>

</x-app-layout>
