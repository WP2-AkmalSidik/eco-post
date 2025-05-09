<div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
    <h3 class="text-2xl font-bold mb-8">Comments ({{ $post->total_comments }})</h3>
    <!-- Comment Form -->
    @auth
        <form method="POST" action="{{ route('comments.store') }}" class="mb-10 comment-form">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="flex items-start space-x-4">
                <img class="h-10 w-10 rounded-full"
                    src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=random' }}"
                    alt="Your profile">
                <div class="flex-grow">
                    <textarea name="body"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                        rows="3" placeholder="Share your thoughts..." required></textarea>
                    <div class="mt-3 flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-lg transition-colors">Post
                            Comment</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="mb-6 p-4 bg-indigo-50 rounded-lg text-center">
            <p class="text-indigo-800">Please <a href="{{ route('login') }}" class="font-medium hover:underline">login</a>
                or <a href="{{ route('register') }}" class="font-medium hover:underline">register</a> to leave a comment.
            </p>
        </div>
    @endauth

    <!-- Comments List -->
    <div class="space-y-8" id="comments-container">
        @foreach($post->comments as $comment)
            @include('user.partials.comment', ['comment' => $comment])
        @endforeach
    </div>

    @if($post->comments->count() > 5)
        <!-- Load More Comments -->
        <div class="mt-8 text-center">
            <button id="load-more-comments"
                class="px-6 py-2 border border-indigo-600 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">Load
                More Comments</button>
        </div>
    @endif
</div>
