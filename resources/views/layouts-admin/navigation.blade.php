<nav class="bg-white text-gray-800 px-4 py-3 flex items-center md:justify-between border-b-2 border-gray-300 mb-3 max-md:hidden">
    <div class="font-semibold text-2xl text-[#74097e]">
        CVM Thonburi admin
    </div>
    <ul class="flex items-center">
        <li>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-7 text-[#74097e]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
    
        </li>
        <li class="relative" x-data="{ open: false }">
            <!-- Parent Button -->
            <button @click="open = !open" class="flex items-center">
                <a href="#" class="pl-2 pr-4 py-2 flex items-center justify-between text-[#74097e] font-semibold rounded-lg">
                    สวัสดีคุณ {{ Auth::user()->name }}
                </a>
                <!-- Arrow Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>

            <!-- Dropdown -->
            <ul x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
                <li>
                    <a href="/profile"
                        class="block px-4 py-2 font-semibold text-gray-800 hover:bg-purple-400/10 hover:text-purple-900">
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="/settings"
                        class="block px-4 py-2 font-semibold text-gray-800 hover:bg-purple-400/10 hover:text-purple-900">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 font-semibold hover:bg-red-400/10 text-red-800">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</nav>