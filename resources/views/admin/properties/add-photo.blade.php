 <x-slide-form button-text="Add Image" title="Add New Gallery Image">
    <form action="{{ route('admin.properties.gallery.add', $property->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Select Image</label>
            <input type="file" name="image" id="imageUpload" accept="image/*" class="block w-full border rounded p-2" required>
        </div>

        {{-- Preview --}}
        <div id="imagePreview" class="mt-4 hidden">
            <p class="text-gray-600 mb-2">Preview:</p>
            <img id="previewImg" src="#" alt="Image Preview" class="w-40 h-40 object-cover rounded-lg shadow-md border">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Upload
            </button>
        </div>
    </form>

    <script>
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                const preview = document.getElementById('previewImg');
                preview.src = URL.createObjectURL(file);
                document.getElementById('imagePreview').classList.remove('hidden');
            }
        });
    </script>
</x-slide-form>