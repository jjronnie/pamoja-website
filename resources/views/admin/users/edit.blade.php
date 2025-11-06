<x-slide-form buttonIcon="edit" title="Update Admin Details">

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label for="name" class="label">Name <span class="text-red-600">*</span></label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $user->name) }}" 
                       required
                       class="input @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="label">Email Address <span class="text-red-600">*</span></label>
                <input type="email" name="email" id="email" 
                       value="{{ old('email', $user->email) }}" 
                       required
                       class="input @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="label">Role <span class="text-red-600">*</span></label>
                <select name="role" id="role" required
                        class="input @error('role') border-red-500 @enderror">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="label">Account Status <span class="text-red-600">*</span></label>
                <select name="status" id="status" required
                        class="input @error('status') border-red-500 @enderror">
                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ old('status', $user->status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex justify-start space-x-3 mt-6">
            <button type="submit" class="btn">
                Update Admin <i data-lucide="save" class="w-4 h-4 ml-2"></i>
            </button>
        </div>

    </form>

</x-slide-form>
