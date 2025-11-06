<x-app-layout>

    <x-page-title />
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        <!-- card -->
        <x-stat-card title="Total Properties" value="{{ $totalProperties }}" icon="house" />
        <x-stat-card title="Total Categories" value="{{ $totalCategories }}" icon="box" />
        <x-stat-card title="Total Admins" value="{{ $totalUsers }}" icon="shield-user" />
        <x-stat-card title="Services" value="" icon="shopping-bag" />

    </div>









</x-app-layout>