<!-- Sidebar -->
<div class="min-w-[250px] min-h-screen bg-white px-2 pt-2 max-md:hidden">
    <div class="p-4 rounded-lg shadow-md bg-[#74097e] min-h-[680px] text-purple-50">
        <div class="flex items-center mb-4">
            <img src="{{ asset('images/logo1.png') }}" alt="User Avatar" class="size-9 mr-2">
            <h3 class="font-semibold text-xl">CVM Thonburi</h3>
        </div>
        <hr class="text-white w-full mb-5">
            <div class="h-[550px]">
                <ul>
                    <a href="{{ route('welcome') }}">
                        <li class="my-1 hover:bg-white/20 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md {{ request()->is('welcome') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>หน้าข่าวสาร</span>
                        </li>
                    </a>
                    <a href="{{ route('user') }}">
                        <li class="my-1 hover:bg-white/20 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md {{ request()->is('user/dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>หน้าแรก</span>
                        </li>
                    </a>
                    <a href="{{ route('all-media') }}">  
                        <li class="my-1 hover:bg-white/20 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md {{ request()->is('user/all-media*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>คลังสื่อ</span>
                        </li>
                    </a>
                    <a href="my-media">
                        <li class="my-1 hover:bg-white/20 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md {{ request()->is('user/my-media*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            <span>สื่อของฉัน</span>
                        </li>
                    </a>
                    <a href="profile">
                        <li class="my-1 hover:bg-white/20 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md {{ request()->is('user/edit*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            <span>โปรไฟล์ผู้ใช้</span>
                        </li>
                    </a>
                </ul>
            </div>
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="text-center bg-red-400/50 font-semibold hover:text-white hover:bg-red-500 text-red-200 p-2 hover:shadow-inner hover:shadow-black/20 rounded-md">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </a>
    </div>
</div>