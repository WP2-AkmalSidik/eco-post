<nav class="bg-white shadow-sm sticky top-0 z-10" x-data="{ mobileMenuOpen: false, searchExpanded: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center text-indigo-600 font-bold text-xl">
                    <i class="fas fa-feather-alt mr-2"></i>
                    <span class="hidden sm:inline">ModernBlog</span>
                </a>
            </div>

            <!-- Desktop Search -->
            @if(Route::currentRouteName() === 'home' || Route::currentRouteName() === 'dashboard.user')
                <div class="hidden md:flex items-center flex-1 max-w-lg mx-8">
                    <div class="w-full relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="navbar-search" placeholder="Search posts..."
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">

                        <div id="search-options"
                            class="hidden absolute z-10 mt-1 w-full bg-white shadow-lg rounded-lg p-3 border border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                                    <select id="search-category"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                        <option value="all">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Sort by</label>
                                    <select id="search-sort"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                        <option value="newest">Newest First</option>
                                        <option value="oldest">Oldest First</option>
                                        <option value="popular">Most Viewed</option>
                                        <option value="most_commented">Most Comments</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3 flex justify-end">
                                <button id="apply-search"
                                    class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Desktop Navigation -->
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
                    <a href="{{ route('post.create') }}"
                        class="ml-4 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Write
                        Post</a>

                    <!-- User Dropdown -->
                    <div class="ml-3 relative" x-data="{ profileMenuOpen: false }">
                        <div>
                            <button type="button"
                                class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                @click="profileMenuOpen = !profileMenuOpen" id="user-menu-button" aria-expanded="false"
                                aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                    alt="User profile">
                            </button>
                        </div>

                        <!-- Profile dropdown menu -->
                        <div x-show="profileMenuOpen" @click.outside="profileMenuOpen = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-gray-200 ring-opacity-50 divide-y divide-gray-100 focus:outline-none z-30"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                            <!-- Profile Info Section -->
                            <div class="py-2 px-4">
                                <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <!-- Sign Out Link -->
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('dropdown-logout-form').submit();"
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
                    <a href="{{ route('login') }}"
                        class="ml-4 px-4 py-2 rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-800">Login</a>
                    <a href="{{ route('register') }}"
                        class="ml-2 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Register</a>
                @endauth
            </div>

            <!-- Mobile menu button and search toggle -->
            <div class="flex items-center md:hidden space-x-2">
                @if(Route::currentRouteName() === 'home' || Route::currentRouteName() === 'dashboard.user')
                    <button @click="searchExpanded = !searchExpanded" type="button"
                        class="p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <i class="fas fa-search"></i>
                    </button>
                @endif

                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    @click="mobileMenuOpen = !mobileMenuOpen">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Search Expanded -->
    @if(Route::currentRouteName() === 'home' || Route::currentRouteName() === 'dashboard.user')
        <div class="md:hidden px-4 py-3 bg-gray-50 border-t border-gray-200" x-data="{ showMobileSearchOptions: false }"
            x-show="searchExpanded" x-transition>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="mobile-navbar-search" placeholder="Search posts..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    @focus="showMobileSearchOptions = true">

                <button @click="searchExpanded = false; showMobileSearchOptions = false"
                    class="absolute right-3 top-2 text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Mobile Search Options -->
            <div id="mobile-search-options" x-show="showMobileSearchOptions"
                @click.outside="showMobileSearchOptions = false"
                class="mt-2 bg-white rounded-lg shadow-lg p-3 border border-gray-200">
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                        <select id="mobile-search-category"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <option value="all">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort by</label>
                        <select id="mobile-search-sort"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="popular">Most Viewed</option>
                            <option value="most_commented">Most Comments</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3 flex justify-end">
                    <button id="mobile-apply-search"
                        class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Mobile menu content -->
    <div class="md:hidden bg-white shadow-lg" x-show="mobileMenuOpen" x-transition
        @click.outside="mobileMenuOpen = false">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <div class="flex items-center justify-between px-3 py-3 border-b border-gray-100">
                <div class="flex items-center">
                    @auth
                        <img class="h-9 w-9 rounded-full"
                            src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                            alt="User profile">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    @endauth
                </div>
                <button @click="mobileMenuOpen = false" class="p-1 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <a href="{{ route('home') }}"
                class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-home mr-3 text-indigo-500 w-5 text-center"></i>
                Home
            </a>
            <a href="{{ route('about.index') }}"
                class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-info-circle mr-3 text-indigo-500 w-5 text-center"></i>
                About
            </a>

            @auth
                <a href="{{ route('profile.users') }}"
                    class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-user mr-3 text-indigo-500 w-5 text-center"></i>
                    Profile
                </a>
                <a href="{{ route('post.create') }}"
                    class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-edit mr-3 text-indigo-500 w-5 text-center"></i>
                    Write Post
                </a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();"
                    class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-3 text-red-500 w-5 text-center"></i>
                    Logout
                </a>
                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-sign-in-alt mr-3 text-indigo-500 w-5 text-center"></i>
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="block px-3 py-3 rounded-md text-base font-medium flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-user-plus mr-3 text-indigo-500 w-5 text-center"></i>
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>
@include('user.components.assets.script-navbar')
