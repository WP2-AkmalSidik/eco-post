<div class="border-b border-gray-200 pb-8 comment-container" id="comment-{{ $comment->id }}">
    <div class="flex items-start space-x-4">
        <img class="h-10 w-10 rounded-full"
            src="{{ $comment->user->photo ? asset('storage/' . $comment->user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) }}"
            alt="{{ $comment->user->name }}">
        <div class="flex-grow">
            <div class="flex items-center justify-between mb-1">
                <h4 class="font-bold">{{ $comment->user->name }}</h4>
                <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-800 mb-3">{{ $comment->body }}</p>

            @auth
                <div class="flex items-center space-x-4">
                    <button data-comment-id="{{ $comment->id }}"
                        class="reply-toggle flex items-center space-x-1 text-gray-500 hover:text-indigo-600">
                        <i class="far fa-comment"></i>
                        <span>Reply</span>
                    </button>

                    @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                        <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-600 text-sm"
                                onclick="return confirm('Are you sure you want to delete this comment?')">
                                <i class="far fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    @endif
                </div>

                <!-- Reply Form (Hidden by default) -->
                <div id="reply-form-{{ $comment->id }}" class="mt-4 hidden reply-form">
                    <form method="POST" action="{{ route('comments.store') }}" class="comment-form">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <div class="flex items-start space-x-3">
                            <img class="h-8 w-8 rounded-full"
                                src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                alt="Your profile">
                            <div class="flex-grow">
                                <textarea name="body"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                    rows="2" placeholder="Reply to {{ $comment->user->name }}..." required></textarea>
                                <div class="mt-2 flex justify-end">
                                    <button type="button"
                                        class="cancel-reply mr-2 px-3 py-1 text-sm border border-gray-300 hover:bg-gray-100 rounded-lg transition-colors">Cancel</button>
                                    <button type="submit"
                                        class="px-3 py-1 text-sm bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">Reply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endauth

            <!-- Replies Container -->
            @if($comment->replies->count() > 0)
                <div class="replies-container mt-4 pl-5 border-l-2 border-gray-100 space-y-4">
                    @foreach($comment->replies as $reply)
                        @include('user.partials.comment', ['comment' => $reply])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
