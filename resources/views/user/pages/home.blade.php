@extends('layouts.user')
@section('title', 'Home')

@section('content')
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
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        <option>All Categories</option>
                        <option>Technology</option>
                        <option>Design</option>
                        <option>Business</option>
                        <option>Lifestyle</option>
                    </select>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-700">Sort by:</span>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
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
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="{{ route('detail-post.index') }}">The Future of Web Development in 2025</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">Exploring the latest trends and technologies shaping the future of
                        web development...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
                            <span class="text-sm text-gray-600">John Doe</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>May 5, 2025</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <a href="{{ route('detail-post.index') }}"
                            class="flex items-center mr-4 hover:text-indigo-600 transition">
                            <i class="far fa-comment mr-1"></i>
                            <span>24 comments</span>
                        </a>

                        <div class="flex items-center">
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Post Card 2 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t=9{{ time() }}" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-green-600 text-white rounded-md">Design</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="#">UI/UX Design Principles Every Developer Should Know</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">Understanding the fundamental principles that lead to better user
                        experiences...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
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
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Post Card 3 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t=2{{ time() }}" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-amber-600 text-white rounded-md">Business</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="#">How to Scale Your Startup in a Competitive Market</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">Strategic approaches to grow your business while navigating fierce
                        competition...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
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
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Post Card 4 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t=3{{ time() }}" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-rose-600 text-white rounded-md">Lifestyle</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="#">Maintaining Work-Life Balance in a Remote World</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">Practical tips for finding harmony between professional and
                        personal life...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
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
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Post Card 5 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t=4{{ time() }}" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="#">The Rise of AI in Content Creation</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">How artificial intelligence is revolutionizing the way we create
                        and consume content...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
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
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Post Card 6 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t=5{{ time() }}" alt="Post image">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold bg-purple-600 text-white rounded-md">Culture</span>
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="#">Building Inclusive Teams in Tech</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">Strategies for creating diverse and inclusive environments in the
                        technology sector...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
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
                            <i class="far fa-eye mr-1"></i>
                            <span>1,203 views</span>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-10">
            <nav class="inline-flex rounded-md shadow">
                <a href="#"
                    class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#"
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-indigo-600 hover:bg-gray-50">1</a>
                <a href="#"
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">2</a>
                <a href="#"
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">3</a>
                <span
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500">...</span>
                <a href="#"
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">8</a>
                <a href="#"
                    class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">9</a>
                <a href="#"
                    class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>

@endsection
