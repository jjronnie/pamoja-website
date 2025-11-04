<x-app-layout>

    <x-page-title title="Manage Property Categories" />

    <!-- Controls -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            
  <a class="btn" href="{{ route('categories.create') }}"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Create New Category</a>


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
                <a class="btn" href=""> <i data-lucide="eye" class="w-4 h-4"></i></a>
                <a class="btn" href=""> <i data-lucide="edit" class="w-4 h-4"></i></a>


            </x-table.cell>

        </x-table.row>
        @endforeach
    </x-table>
    @endif
</x-app-layout>