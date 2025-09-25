<!-- Wrapper -->
<div x-data="{ menu: false }">

    <!-- Top Navbar (Mobile Only) -->
    <nav class="bg-white text-gray-800 py-3 flex items-center border-b-2 border-gray-300 md:hidden">
        <!-- Hamburger Button -->
        <button @click="menu = !menu"
            class="inline-flex items-center justify-center py-2 px-2 rounded-md text-[#8a438f] hover:bg-[#f3eaf6] focus:outline-none transition">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <!-- Hamburger -->
                <path :class="{'hidden': menu, 'block': !menu}" class="block"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <!-- X Icon -->
                <path :class="{'hidden': !menu, 'block': menu}" class="hidden"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Title -->
        <div class="font-semibold text-2xl text-[#74097e]">
            CVM Thonburi admin
        </div>
    </nav>

    <!-- Overlay -->
    <div x-show="menu" x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden"
        @click="menu = false"></div>

    <!-- Sidebar Menu -->
    <div x-show="menu" 
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
      x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 w-[70%] h-full rounded-r-lg bg-[#74097e] text-purple-50 shadow-lg z-50 md:hidden">

        <div class="p-4 h-full">
            <!-- Logo -->
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/logo1.png') }}" alt="User Avatar" class="size-9 mr-2">
                <h3 class="font-semibold text-xl">CVM Thonburi</h3>
            </div>
            <hr class="border-white/30 mb-5">
            <div class="h-[calc(100%-80px)] justify-between flex flex-col">
                <div class="flex-1 h-full">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('welcome') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('welcome') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-newspaper mr-2"></i> หน้าข่าวสาร
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('admin/dashboard') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-home mr-2"></i> หน้าแรก
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all-media') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('admin/all-media*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-photo-video mr-2"></i> คลังสื่อ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manage-media') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('admin/manage-media*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-cogs mr-2"></i> จัดการสื่อ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('report') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('admin/report*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-chart-bar mr-2"></i> รายงานและสรุป
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manage-user') }}"
                                class="block p-2 rounded-md hover:bg-white/20 hover:shadow-inner hover:shadow-black/20 {{ request()->is('admin/manage-user*') ? 'bg-white/20' : '' }}">
                                <i class="fas fa-users mr-2"></i> จัดการผู้ใช้งาน
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-center bg-red-400/50 font-semibold hover:text-white hover:bg-red-500 text-red-200 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
    </div>
</div>
