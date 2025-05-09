<div class="p-6 md:p-8">
    <div class="flex items-center space-x-4 mb-6">
        <img class="h-12 w-12 rounded-full"
            src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&size=128' }}"
            alt="{{ $post->user->name }}">
        <div>
            <h3 class="text-sm font-medium">{{ $post->user->name }}</h3>
            <div class="flex items-center text-sm text-gray-500">
                <i class="far fa-calendar-alt mr-1"></i>
                <span>{{ $post->created_at->format('M d, Y') }}</span>
                <span class="mx-2">•</span>
                <i class="far fa-clock mr-1"></i>
                <span>{{ $post->reading_time }} min for read</span>
            </div>
        </div>
    </div>

    <h1 class="text-3xl md:text-4xl font-bold mb-6">{{ $post->title }}</h1>

    <div class="prose max-w-none mb-8">
        {!! $post->body !!}
    </div>

    <!-- Social Sharing -->
    <div class="border-t border-gray-200 pt-6 flex flex-wrap items-center justify-between">
        <div class="flex items-center space-x-6 mb-4 md:mb-0">
            <span class="text-gray-700 font-medium">Share this post:</span>
            <a href="#" class="text-gray-500 hover:text-indigo-600">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 hover:text-indigo-600">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 hover:text-indigo-600">
                <i class="fab fa-linkedin-in text-xl"></i>
            </a>
            <a href="#" class="text-gray-500 hover:text-indigo-600">
                <i class="far fa-envelope text-xl"></i>
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="flex items-center space-x-2 text-gray-600 hover:text-indigo-600">
                <i class="far fa-eye mr-1"></i>
                <span>{{ number_format($post->views) }} views</span>
            </button>
        </div>
    </div>
</div>
