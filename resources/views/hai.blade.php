<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>ModernBlog - Home</title>
    <style>
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false, profileMenuOpen: false }">
    <div
        class="menu-overlay fixed inset-0 bg-opacity-70 z-20"
        :class="{'active': mobileMenuOpen}"
        @click="mobileMenuOpen = false">
    </div>

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
                            <div class="py-1">
                                <a href="/logout" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                                    <i class="fas fa-sign-out-alt mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                    Sign out
                                </a>
                            </div>
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

            <div class="py-3">
                <a href="/logout" class="block px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign out
                </a>
            </div>

            <div class="mt-6">
                <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    <i class="fas fa-pencil-alt mr-2"></i>
                    Write Post
                </a>
            </div>
        </nav>
    </div>
    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <div class="bg-indigo-700 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Welcome to ModernBlog</h1>
                    <p class="mt-3 text-lg">A place to share your thoughts, ideas, and stories with the world.</p>
                </div>
            </div>
        </div>

        <!-- Filter Options -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-3 flex flex-wrap justify-between items-center">
                    <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                        <span class="text-sm font-medium text-gray-700">Filter by:</span>
                        <select class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
                            <option>All Categories</option>
                            <option>Technology</option>
                            <option>Design</option>
                            <option>Business</option>
                            <option>Lifestyle</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-700">Sort by:</span>
                        <select class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Post Card 1 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">The Future of Web Development in 2025</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">Exploring the latest trends and technologies shaping the future of web development...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">John Doe</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>May 5, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>24 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>86 likes</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 2 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-600 text-white rounded-md">Design</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">UI/UX Design Principles Every Developer Should Know</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">Understanding the fundamental principles that lead to better user experiences...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">Jane Smith</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>May 3, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>18 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>42 likes</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 3 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-amber-600 text-white rounded-md">Business</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">How to Scale Your Startup in a Competitive Market</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">Strategic approaches to grow your business while navigating fierce competition...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">Michael Johnson</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>May 1, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>31 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>65 likes</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 4 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-rose-600 text-white rounded-md">Lifestyle</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">Maintaining Work-Life Balance in a Remote World</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">Practical tips for finding harmony between professional and personal life...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">Sarah Williams</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Apr 28, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>47 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>103 likes</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 5 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">The Rise of AI in Content Creation</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">How artificial intelligence is revolutionizing the way we create and consume content...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">Robert Chen</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Apr 25, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>39 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>78 likes</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 6 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48">
                        <img class="w-full h-full object-cover" src="/api/placeholder/400/192" alt="Post image">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-purple-600 text-white rounded-md">Culture</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                            <a href="#">Building Inclusive Teams in Tech</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">Strategies for creating diverse and inclusive environments in the technology sector...</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg" alt="Author">
                                <span class="text-sm text-gray-600">Lisa Zhang</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Apr 22, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <div class="flex items-center mr-4">
                                <i class="far fa-comment mr-1"></i>
                                <span>52 comments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-heart mr-1"></i>
                                <span>124 likes</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-indigo-600 hover:bg-gray-50">1</a>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">2</a>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">3</a>
                    <span class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500">...</span>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">8</a>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">9</a>
                    <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-8 md:mb-0">
                    <a href="#" class="flex items-center text-indigo-600 font-bold text-xl">
                        <i class="fas fa-feather-alt mr-2"></i>
                        ModernBlog
                    </a>
                    <p class="mt-2 text-sm text-gray-500">Sharing thoughts and ideas with the world.</p>
                </div>
                <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Navigate</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Home</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Categories</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Popular Posts</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Recent Posts</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Company</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">About Us</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Contact</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Careers</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Press</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Legal</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Privacy Policy</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Terms of Service</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">&copy; 2025 ModernBlog. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
