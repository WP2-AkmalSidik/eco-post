@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <div class="rounded-full bg-blue-100 p-3 mr-4">
                <i class="fas fa-file-alt text-blue-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Posts</h3>
                <p class="text-2xl font-bold">24</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <div class="rounded-full bg-green-100 p-3 mr-4">
                <i class="fas fa-comments text-green-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Comments</h3>
                <p class="text-2xl font-bold">142</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                <i class="fas fa-users text-yellow-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Users</h3>
                <p class="text-2xl font-bold">15</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <div class="rounded-full bg-purple-100 p-3 mr-4">
                <i class="fas fa-eye text-purple-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Views</h3>
                <p class="text-2xl font-bold">3,542</p>
            </div>
        </div>
    </div>

    <!-- Recent Comments Section -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Recent Comments</h2>
            <p class="text-gray-500 text-sm">Latest comments from your blog posts</p>
        </div>

        <div class="p-4 space-y-4">
            <!-- Comment 1 -->
            <div class="border-b border-gray-100 pb-4">
                <div class="flex items-start">
                    <div
                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-bold flex-shrink-0">
                        AM
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Alex Morgan</h4>
                                <p class="text-xs text-gray-500">On: The Future of AI in Content Creation</p>
                            </div>
                            <span class="text-xs text-gray-500">2 hours ago</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-600">Great article! I've been using AI tools for my
                            content and they've been a game changer.</p>
                        <div class="mt-2 flex items-center space-x-4">
                            <button class="text-xs text-indigo-600 hover:text-indigo-800">
                                <i class="fas fa-reply mr-1"></i> Reply
                            </button>
                            <button class="text-xs text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </div>

                        <!-- Nested Reply -->
                        <div class="mt-3 ml-6 pl-4 border-l-2 border-gray-100">
                            <div class="flex items-start">
                                <div
                                    class="h-8 w-8 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold flex-shrink-0">
                                    JD
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">John Doe <span
                                                    class="text-xs bg-blue-100 text-blue-800 px-1 rounded">Author</span>
                                            </h4>
                                        </div>
                                        <span class="text-xs text-gray-500">1 hour ago</span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600">Thanks Alex! I'm glad you found it
                                        helpful. Which tools are you using currently?</p>
                                    <div class="mt-2 flex items-center space-x-4">
                                        <button class="text-xs text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment 2 -->
            <div class="border-b border-gray-100 pb-4">
                <div class="flex items-start">
                    <div
                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-bold flex-shrink-0">
                        TS
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Tom Smith</h4>
                                <p class="text-xs text-gray-500">On: The Best Travel Destinations for 2025</p>
                            </div>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-600">I've been to three of these places and they're
                            amazing! I would add Bali to this list though.</p>
                        <div class="mt-2 flex items-center space-x-4">
                            <button class="text-xs text-indigo-600 hover:text-indigo-800">
                                <i class="fas fa-reply mr-1"></i> Reply
                            </button>
                            <button class="text-xs text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment 3 -->
            <div>
                <div class="flex items-start">
                    <div
                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-bold flex-shrink-0">
                        LJ
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Lisa Johnson</h4>
                                <p class="text-xs text-gray-500">On: 10 Tips for Better Blog Writing</p>
                            </div>
                            <span class="text-xs text-gray-500">2 days ago</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-600">These tips are really helpful for beginners like
                            me. I'm going to implement them in my next blog post!</p>
                        <div class="mt-2 flex items-center space-x-4">
                            <button class="text-xs text-indigo-600 hover:text-indigo-800">
                                <i class="fas fa-reply mr-1"></i> Reply
                            </button>
                            <button class="text-xs text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 bg-gray-50 border-t border-gray-200 text-center">
            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                View All Comments <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
@endsection
