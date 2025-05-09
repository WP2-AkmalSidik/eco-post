@if($posts->count() > 0)
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48">
                    @if($post->image_path)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image_path) }}"
                            alt="{{ $post->title }}">
                    @else
                        <img class="w-full h-full object-cover" src="https://picsum.photos/400/192?t={{ $loop->index }}"
                            alt="Post image">
                    @endif
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full h-1/2"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        @if($post->categories->isNotEmpty())
                            @php
            // Generate different background colors based on category
            $colors = ['bg-indigo-600', 'bg-green-600', 'bg-amber-600', 'bg-rose-600', 'bg-purple-600', 'bg-blue-600'];
            $colorIndex = $post->categories->first()->id % count($colors);
                            @endphp
                            <span
                                class="inline-block px-2 py-1 text-xs font-semibold {{ $colors[$colorIndex] }} text-white rounded-md">
                                {{ $post->categories->first()->name }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="p-5">
                    <h2 class="font-bold text-xl mb-2 hover:text-indigo-600">
                        <a href="{{ route('detail-post.index', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 100) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <img class="h-8 w-8 rounded-full"
                            src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) }}"
                            alt="{{ $post->user->name }}">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <a href="{{ route('detail-post.index', ['slug' => $post->slug]) }}#comments"
                            class="flex items-center mr-4 hover:text-indigo-600 transition">
                            <i class="far fa-comment mr-1"></i>
                            <span>{{ $post->comments->count() }} comments</span>
                        </a>

                        <div class="flex items-center">
                            <i class="far fa-eye mr-1"></i>
                            <span>{{ $post->views }} views</span>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-10">
        {{ $posts->appends(request()->query())->links() }}
    </div>

@else
    <div class="text-center py-12">
        <i class="fas fa-scroll text-gray-300 text-5xl mb-4"></i>
        <h3 class="text-xl font-medium text-gray-900">No posts found</h3>
        <p class="mt-2 text-gray-500">There are no posts matching your criteria.</p>
        <button onclick="loadPosts()"
            class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 rounded-lg text-sm font-medium text-white hover:bg-indigo-700">
            View all posts
        </button>
    </div>
@endif
