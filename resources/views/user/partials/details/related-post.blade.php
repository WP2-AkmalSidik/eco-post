<div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
    <h3 class="font-bold text-xl mb-4 pb-2 border-b border-gray-200">Related Posts</h3>
    <div class="space-y-4">
        @foreach($relatedPosts as $relatedPost)
            <a href="{{ route('detail-post.index', ['slug' => $relatedPost->slug]) }}"
                class="flex items-start space-x-3 group">
                @if($relatedPost->image_path)
                    <img class="h-16 w-16 rounded-lg object-cover" src="{{ asset('storage/' . $relatedPost->image_path) }}"
                        alt="{{ $relatedPost->title }}">
                @else
                    <img class="h-16 w-16 rounded-lg object-cover"
                        src="https://picsum.photos/100/100?random={{ $relatedPost->id }}" alt="{{ $relatedPost->title }}">
                @endif
                <div>
                    <h4 class="font-medium group-hover:text-indigo-600">
                        {{ Str::limit($relatedPost->title, 50) }}
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">{{ $relatedPost->created_at->format('M d, Y') }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
