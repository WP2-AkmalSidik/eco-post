<div id="blogs-section" class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">My Blogs</h2>
        <a href="{{ route('post.create') }}"
            class="text-white bg-white/20 hover:bg-white/30 rounded-lg px-4 py-2 text-sm font-medium transition flex items-center">
            <i class="fas fa-plus mr-1"></i>
            Create New Blog
        </a>
    </div>

    <div class="p-6">
        <!-- Blog Items -->
        <div class="space-y-6">
            @forelse ($posts as $post)
                <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="grid grid-cols-1 md:grid-cols-4">
                        <div class="md:col-span-1 h-48 md:h-full">
                            <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : 'https://picsum.photos/400/192' }}"
                                alt="Blog thumbnail" class="w-full h-full object-cover">
                        </div>
                        <div class="md:col-span-3 p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 hover:text-red-600 transition">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <h3 class="mt-3 text-xl font-semibold text-gray-900 hover:text-indigo-600 transition">
                                <a href="{{ route('detail-post.index', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="mt-2 text-gray-600 line-clamp-2">
                                {{ Str::limit(strip_tags($post->body), 150) }}
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-eye mr-1"></i>
                                        {{ $post->views }} views
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-comment mr-1"></i>
                                        {{ $post->totalCommentsCount() }} comments
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ $post->reading_time }} min read
                                    </div>
                                </div>
                                <a href="{{ route('post.edit', ['slug' => $post->slug]) }}"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                                    Edit Post →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <i class="fas fa-newspaper text-gray-400 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900">No blog posts yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating your first blog post.</p>
                    <div class="mt-6">
                        <a href="{{ route('post.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-2"></i> Create Post
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($posts->hasPages())
            <div class="flex items-center justify-between border-t border-gray-200 pt-6 mt-8">
                <div class="flex items-center text-sm text-gray-500">
                    Showing <span class="font-medium mx-1">{{ $posts->firstItem() }}</span> to
                    <span class="font-medium mx-1">{{ $posts->lastItem() }}</span> of
                    <span class="font-medium mx-1">{{ $posts->total() }}</span> blogs
                </div>
                <div class="flex space-x-2">
                    @if ($posts->onFirstPage())
                        <span
                            class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-400 bg-white cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}"
                            class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                            Previous
                        </a>
                    @endif

                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <span class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-white bg-indigo-600">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}"
                            class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                            Next
                        </a>
                    @else
                        <span
                            class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-400 bg-white cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
