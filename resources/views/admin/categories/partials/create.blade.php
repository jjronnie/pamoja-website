<x-slide-form button-text="Add New Category" title="Create New Category Form">
    <form method="POST" action="{{ route('admin.categories.store' ) }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 ">

            <div>
                <label for="name" class="label"> Name <span class="text-red-600"> *</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="input @error('name') border-red-500 @enderror" />
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="label">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="input @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <button type="submit" class="btn">
                Save <i data-lucide="save" class="w-4 h-4 ml-2"></i>
            </button>
        </div>
    </form>
</x-slide-form>