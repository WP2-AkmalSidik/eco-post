<nav class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="#" class="flex-shrink-0 flex items-center text-indigo-600 font-bold text-xl">
                    <i class="fas fa-feather-alt mr-2"></i>
                    ModernBlog
                </a>
            </div>

            <div class="hidden md:flex items-center flex-1 max-w-lg mx-8">
                <div class="w-full relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" placeholder="Search posts..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Home</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Topics</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">About</a>
                <a href="#" class="ml-4 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Write Post</a>

                <!-- User Dropdown -->
                <div class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button
                            type="button"
                            class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="profileMenuOpen = !profileMenuOpen"
                            id="user-menu-button"
                            aria-expanded="false"
                            aria-haspopup="true">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="User profile">
                        </button>
                    </div>

                    <!-- Profile dropdown menu -->
                    <div
                        x-show="profileMenuOpen"
                        @click.outside="profileMenuOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-30"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <div class="py-1">
                            <div class="px-4 py-2">
                                <p class="text-sm font-medium text-gray-900">John Doe</p>
                                <p class="text-xs text-gray-500 truncate">john.doe@example.com</p>
                            </div>
                        </div>
                        <div class="py-1">
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                                <i class="fas fa-user-circle mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                Your Profile
                            </a>
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                                <i class="fas fa-cog mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                Settings
                            </a>
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                                <i class="fas fa-bookmark mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                My Posts
                            </a>
                        </div>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('dropdown-logout-form').submit();"
                        class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                            <i class="fas fa-sign-out-alt mr-3 text-gray-400 group-hover:text-gray-500"></i>
                            Sign out
                        </a>
                        <form id="dropdown-logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button
                    type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    @click="mobileMenuOpen = !mobileMenuOpen">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile search - shown below navbar on small screens -->
    <div class="md:hidden border-t border-gray-200 py-2 px-4">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" placeholder="Search posts..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
        </div>
    </div>
</nav>

<!-- Mobile Menu Slide-in -->
<div
    class="mobile-menu fixed top-0 right-0 bg-white shadow-lg h-full w-80 z-30 md:hidden overflow-y-auto"
    :class="{'open': mobileMenuOpen}">

    <!-- Mobile menu header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="User profile">
            <div>
                <p class="text-sm font-medium text-gray-900">John Doe</p>
                <p class="text-xs text-gray-500 truncate">john.doe@example.com</p>
            </div>
        </div>
        <button
            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
            @click="mobileMenuOpen = false">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Mobile menu content -->
    <nav class="mt-2 px-4">
        <div class="py-3 border-b border-gray-200">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-home mr-3 text-gray-500"></i>
                Home
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-list-alt mr-3 text-gray-500"></i>
                Topics
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-info-circle mr-3 text-gray-500"></i>
                About
            </a>
        </div>

        <div class="py-3 border-b border-gray-200">
            <p class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Account</p>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                Your Profile
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-cog mr-3 text-gray-500"></i>
                Settings
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
                <i class="fas fa-bookmark mr-3 text-gray-500"></i>
                My Posts
            </a>
        </div>

        <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();"
        class="block px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
            <i class="fas fa-sign-out-alt mr-3"></i>
            Sign out
        </a>
        <form id="mobile-logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>
</div>
