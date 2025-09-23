<nav class="bg-gray-400 text-white px-6 py-3 flex items-center justify-between shadow">
    <div class="font-bold text-lg">
        CVM Thonburi Admin
    </div>
    <ul class="flex gap-6">
                <li>
            <img src="{{ asset('images/user1-160x160.svg') }}" alt="User Avatar" class="w-8 h-8 rounded-full">
        </li>
        <li><a href="#" class="hover:text-yellow-400">Profile</a></li>
        
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</nav>