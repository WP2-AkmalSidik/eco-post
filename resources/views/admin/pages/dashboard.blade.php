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

    <!-- Post Management Section -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-4 border-b border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h2 class="text-xl font-semibold text-gray-800">Blog Posts</h2>
                <p class="text-gray-500 text-sm">Manage your blog posts</p>
            </div>
            <a href="#"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg inline-flex items-center hover:bg-indigo-700 transition duration-150 justify-center">
                <i class="fas fa-plus mr-2"></i>
                <span>Add New Post</span>
            </a>
        </div>

        <!-- Search and Filter -->
        <div
            class="p-4 border-b border-gray-200 flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
            <div class="flex-1 flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
                <div class="flex-1 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </span>
                    <input type="text"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Search by title...">
                </div>

                <div class="flex space-x-2">
                    <select
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">All Categories</option>
                        <option value="technology">Technology</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="travel">Travel</option>
                        <option value="food">Food</option>
                    </select>

                    <select
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="title-asc">Title (A-Z)</option>
                        <option value="title-desc">Title (Z-A)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Posts Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Post</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Comments</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Post 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 flex-shrink-0 bg-indigo-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt text-indigo-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">10 Tips for Better Blog
                                        Writing</div>
                                    <div class="text-sm text-gray-500">Draft</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">John Doe</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Technology
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            12
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            May 05, 2025
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="#" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Post 2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 flex-shrink-0 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt text-green-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">The Future of AI in Content
                                        Creation</div>
                                    <div class="text-sm text-gray-500">Published</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Jane Smith</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                Technology
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            24
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            May 02, 2025
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="#" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Post 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 flex-shrink-0 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt text-green-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">The Best Travel Destinations
                                        for 2025</div>
                                    <div class="text-sm text-gray-500">Published</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Mark Wilson</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Travel
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            36
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Apr 28, 2025
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="#" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6 flex items-center justify-between">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
                <a href="#"
                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of
                        <span class="font-medium">24</span> results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left text-xs"></i>
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-50 text-sm font-medium text-indigo-600 hover:bg-gray-50">
                            1
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            3
                        </a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            8
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </nav>
                </div>
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
