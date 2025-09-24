<!-- Sidebar -->
<div class="sidebar text-white bg-gray-800">
    <div class="sidebar-header">
        <h3>CVM Thonburi</h3>
    </div>

    <ul class="sidebar-menu">
          
        <li class="menu-item {{ request()->is('welcome') ? 'active' : '' }}">
            <a href="{{ route('welcome') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>หน้าข่าวสาร</span>
            </a>
        </li>
        <li class="menu-item {{ request()->is('user/dashboard') ? 'active' : '' }}">
            <a href="{{ route('user') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>หน้าแรก</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('user/all-media*') ? 'active' : '' }}">
            <a href="{{ route('all-media') }}">  
                <i class="fas fa-users"></i>
                <span>คลังสื่อ</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('user/my-media*') ? 'active' : '' }}">
            <a href="my-media">
                <i class="fas fa-cog"></i>
                <span>สื่อของฉัน</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('user/edit*') ? 'active' : '' }}">
            <a href="profile">
                <i class="fas fa-cog"></i>
                <span>โปรไฟล์ผู้ใช้</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>