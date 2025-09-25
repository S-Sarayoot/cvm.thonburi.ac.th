<nav class="bg-gray-400 text-white px-6 py-3 flex items-center justify-between shadow">
    <div class="font-bold text-lg">
        CVM Thonburi user
    </div>
    <ul class="flex gap-6">
        <li>
            <img src="{{ asset('images/user1-160x160.svg') }}" alt="User Avatar" class="w-8 h-8 rounded-full">
        </li>
        <li class="relative group">
            <!-- Parent Link -->
            <a href="#"
                class="px-4 py-2 flex items-center justify-between text-gray-800 font-medium hover:text-yellow-400 border-[#eb3d26] rounded-lg">
                สวัสดีคุณ {{ Auth::user()->name }}
                <!-- Arrow Icon -->
                <svg class="w-4 h-4 ml-2 transition-transform duration-200 group-hover:rotate-180" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>

            <!-- Dropdown -->
            <ul
                class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 z-50">
                <li>
                    <a href="/profile"
                        class="block px-4 py-2 text-gray-800 hover:bg-yellow-100 hover:text-yellow-600 transition-colors duration-150 rounded-lg">
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="/settings"
                        class="block px-4 py-2 text-gray-800 hover:bg-yellow-100 hover:text-yellow-600 transition-colors duration-150 rounded-lg">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 text-gray-800 hover:bg-yellow-100 hover:text-yellow-600 transition-colors duration-150 rounded-lg">
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
