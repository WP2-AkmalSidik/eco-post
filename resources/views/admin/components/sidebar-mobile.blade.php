<div id="mobileSidebar"
    class="bg-indigo-800 text-white w-64 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out z-50 md:hidden">
    <div class="p-4">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <i class="fas fa-feather-alt mr-3"></i>Admin-MB
            </h2>
            <button id="closeMobileMenu" class="text-white focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard.admin') }}" class="flex items-center p-3 rounded-lg transition duration-150
                            {{ request()->routeIs('dashboard.admin') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }}">
                        <i class="fas fa-tachometer-alt w-6"></i>
                        <span class="ms-2">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('posts.index') }}" class="flex items-center p-3 rounded-lg transition duration-150
                            {{ request()->routeIs('posts.*') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }}">
                        <i class="fas fa-file-alt w-6"></i>
                        <span class="ms-2">Posts</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="flex items-center p-3 rounded-lg transition duration-150
                            {{ request()->routeIs('category.*') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }}">
                        <i class="fa-solid fa-icons w-6"></i>
                        <span class="ms-2">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users-management.index') }}"
                        class="flex items-center p-3 rounded-lg transition duration-150
                            {{ request()->routeIs('users-management.*') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="ms-2">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}" class="flex items-center p-3 rounded-lg transition duration-150
                            {{ request()->routeIs('profile.*') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }}">
                        <i class="fas fa-cog w-6"></i>
                        <span class="ms-2">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="mt-auto p-4 border-t border-indigo-700">
        <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();"
            class="flex items-center p-2 hover:bg-indigo-700 rounded-lg transition duration-150">
            <i class="fas fa-sign-out-alt w-6"></i>
            <span class="ms-2">Logout</span>
        </a>

        <form id="sidebar-logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</div>
