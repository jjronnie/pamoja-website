<x-app-layout>

    <x-page-title title="Manage Property Categories" />

    <!-- Controls -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">

            @include('admin.categories.partials.create')

        </div>


    </div>

    @if ($categories->isEmpty())


    <x-empty-state message="No categories found" />


    @else

    <x-table :headers="['#', 'Category','Slug', 'Properties', 'Created At' ]" showActions="false">
        @foreach ($categories as $index => $category)

        <x-table.row>
            <x-table.cell>{{ $index +1 }}</x-table.cell>
            <x-table.cell>{{ $category->name ?? '' }}</x-table.cell>
            <x-table.cell>{{ $category->slug ?? '' }}</x-table.cell>
            <x-table.cell>-</x-table.cell>
            <x-table.cell>{{ $category->created_at ?? '' }}</x-table.cell>
            <x-table.cell>
                <div class="flex items-center space-x-2">
                    @include('admin.categories.partials.edit')

                    <x-confirm-modal :action="route('admin.categories.destroy', $category->id)"
                        warning="Are you sure you want to delete this Category? This action cannot be undone."
                        triggerIcon="trash-2" />

                </div>

            </x-table.cell>

        </x-table.row>
        @endforeach
    </x-table>
    @endif
</x-app-layout>