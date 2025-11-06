<div class="w-80 lg:w-64 bg-[#001529] text-white flex flex-col fixed top-0 left-0 h-screen z-40 lg:z-[10000] transform transition-transform duration-300 -translate-x-full lg:translate-x-0"
    id="sidebar">

     <div class="sidebar-header">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10  rounded-lg flex items-center justify-center text-white font-bold text-lg">
                <span>
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logom.png') }}" alt="LOGO">
                    </a>
                </span>
            </div>
            <div class="flex flex-col">
                <span class="text-center whitespace-nowrap text-white font-bold">Pamoja Chambers</span>

                <span class="text-xs text-center">Admin Panel</span>
            </div>
        </div>
        <button class="lg:hidden p-1 rounded-md hover:bg-blue-900 transition-colors" id="closeSidebar">

            <i data-lucide="x" class="w-4 h-4  text-white"></i>
        </button>
    </div>

    

    <!-- Scrollable Navigation Area -->



    <div class="flex-1 overflow-y-auto no-scrollbar">
        <nav class="p-4 space-y-1">
            {{-- Dashboard --}}

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 text-white"></i>
                <span>Dashboard</span>
            </a>
            <div class="space-y-1">
                <a href="{{ route('admin.categories.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'sidebar-link-active' : '' }}">
                    <i data-lucide="package" class="w-4 h-4 text-white"></i>
                    <span>Categories</span>
                </a>

                <a href="{{ route('admin.properties.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.properties.*') ? 'sidebar-link-active' : '' }}">
                    <i data-lucide="house" class="w-4 h-4 text-white"></i>
                    <span>Properties</span>
                </a>


                {{-- Users --}}
                <a href="{{ route('admin.users.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'sidebar-link-active' : '' }}">
                    <i data-lucide="shield" class="w-4 h-4 text-white"></i>
                    <span>Admins</span>
                </a>


                {{-- Settings --}}
                <a href="{{ route('profile.edit') }}"
                    class="sidebar-link {{ request()->routeIs('profile.*') ? 'sidebar-link-active' : '' }}">
                    <i data-lucide="settings" class="w-4 h-4 text-white"></i>
                    <span>Settings</span>
                </a>

            </div>
    </div>
    </nav>

</div>