<nav class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center text-indigo-600 font-bold text-xl">
                    <i class="fas fa-feather-alt mr-2"></i>
                    ModernBlog
                </a>
            </div>

            @if(Route::currentRouteName() === 'home' || Route::currentRouteName() === 'dashboard.user')
                <div class="hidden md:flex items-center flex-1 max-w-lg mx-8">
                    <div class="w-full relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search posts..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>
                </div>
            @endif

            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}"
                class="px-3 py-2 rounded-md text-sm font-medium {{ Route::currentRouteName() === 'home' ? 'bg-gray-100' : 'text-gray-700 hover:bg-gray-100' }}">
                    Home
                </a>

                <a href="{{ route('about.index') }}"
                class="px-3 py-2 rounded-md text-sm font-medium {{ Route::currentRouteName() === 'about.index' ? 'bg-gray-100' : 'text-gray-700 hover:bg-gray-100' }}">
                    About
                </a>

                @auth
                    <a href="{{ route('profile.users') }}"
                    class="px-3 py-2 rounded-md text-sm font-medium {{ Route::currentRouteName() === 'profile.users' ? 'bg-gray-100' : 'text-gray-700 hover:bg-gray-100' }}">
                        Profile
                    </a>
                    <a href="{{ route('post.create') }}" class="ml-4 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Write Post</a>

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
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-gray-200 ring-opacity-50 divide-y divide-gray-100 focus:outline-none z-30"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="user-menu-button"
                            tabindex="-1">

                            <!-- Profile Info Section -->
                            <div class="py-2 px-4">
                                <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <!-- Sign Out Link -->
                            <a href="#" onclick="event.preventDefault(); document.getElementById('dropdown-logout-form').submit();"
                            class="group flex items-center px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100 transition-colors duration-200"
                            role="menuitem" tabindex="-1">
                                <i class="fas fa-sign-out-alt mr-3 text-red-400 group-hover:text-red-500"></i>
                                Sign out
                            </a>

                            <!-- Hidden Form for Logout -->
                            <form id="dropdown-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="ml-4 px-4 py-2 rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-800">Login</a>
                    <a href="{{ route('register') }}" class="ml-2 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Register</a>
                @endauth
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

    <!-- Mobile menu content -->
    <div class="md:hidden" x-show="mobileMenuOpen" @click.outside="mobileMenuOpen = false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Home</a>
            <a href="{{ route('about.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">About</a>

            @auth
                <a href="{{ route('profile.users') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Profile</a>
                <a href="{{ route('post.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Write Post</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Logout</a>
                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Register</a>
            @endauth
        </div>
    </div>
</nav>
