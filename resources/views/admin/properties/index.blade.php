<x-app-layout>

    <x-page-title title="Manage Property listings" />

    <!-- Controls -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">

          <a class="btn" href="{{ route('admin.properties.create') }}">  
             <i data-lucide="plus" class="w-4 h-4 mr-2"></i>Add New Property</a>

        </div>


    </div>

    @if ($properties->isEmpty())


    <x-empty-state message="No properties found" />


    @else

    <x-table :headers="['#', 'property','Slug', 'Properties', 'Created At' ]" showActions="false">
        @foreach ($properties as $index => $property)

        <x-table.row>
            <x-table.cell>{{ $index +1 }}</x-table.cell>
            <x-table.cell>{{ $property->name ?? '' }}</x-table.cell>
            <x-table.cell>{{ $property->slug ?? '' }}</x-table.cell>
            <x-table.cell>-</x-table.cell>
            <x-table.cell>{{ $property->created_at ?? '' }}</x-table.cell>
            <x-table.cell>
                <div class="flex items-center space-x-2">
                  <a class="btn" href="{{ route('admin.properties.show', $property->id) }}">
             <i data-lucide="eye" class="w-4 h-4 "></i></a>

                  </a>

                    <x-confirm-modal :action="route('admin.properties.destroy', $property->id)"
                        warning="Are you sure you want to delete this property? This action cannot be undone."
                        triggerIcon="trash-2" />

                </div>

            </x-table.cell>

        </x-table.row>
        @endforeach
    </x-table>
    @endif
</x-app-layout>