<!-- Sidebar -->
<div class="sidebar text-white bg-gray-800">
    <div class="sidebar-header">
        <h3>CVM Thonburi</h3>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
            <a href="#">  
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/settings*') ? 'active' : '' }}">
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
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