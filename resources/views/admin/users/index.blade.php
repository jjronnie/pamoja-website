<x-app-layout>

    <x-page-title title="Manage Admins" />

    @if (session('status'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  " role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  " role="alert">
        {{ session('error') }}
    </div>
    @endif

    <!-- Controls -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">

            @include('admin.users.create')


        </div>


    </div>

    @if ($users->isEmpty())


    <x-empty-state message="No users found" />


    @else

    <x-table :headers="['#', 'user', 'Role','status', 'Created by' ]" showActions="false">
        @foreach ($users as $index => $user)

        <x-table.row>
            <x-table.cell>{{ $index +1 }}</x-table.cell>

            <x-table.cell>
                <div class="flex items-center">
                    <div class="">
                        <div class="text-sm font-medium text-gray-900">{{ $user->name}}</div>
                        <div class="text-sm text-gray-500">{{ $user->email}}</div>
                    </div>
                </div>
            </x-table.cell>
            <x-table.cell>{{ ucfirst($user ->role )}}</x-table.cell>


            <x-table.cell>
                <x-status-badge :status="$user->status" />
            </x-table.cell>


            <x-table.cell>
                <div class="flex items-center">
                    <div class="">
                        <div class="text-sm font-medium text-gray-900"> {{ $user->creator->name ?? 'System' }}</div>
                        <div class="text-sm text-gray-500"> {{ $user->created_at ?? '' }}</div>
                    </div>
                </div>
            </x-table.cell>

            <x-table.cell>
                <div class="flex items-center space-x-2">
                    <a class="btn" href="{{ route('admin.users.show', $user->id) }}">
                        <i data-lucide="eye" class="w-4 h-4 "></i></a>


                    @include('admin.users.edit')

                    <x-confirm-modal :action="route('admin.users.destroy', $user->id)"
                        warning="Are you sure you want to delete this user? This action cannot be undone."
                        triggerIcon="trash-2" />

                </div>

            </x-table.cell>

        </x-table.row>
        @endforeach
    </x-table>
    @endif
</x-app-layout>