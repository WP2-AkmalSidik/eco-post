<div class="relative h-72 md:h-96">
    @if($post->image_path)
        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
    @else
        <img class="w-full h-full object-cover" src="https://picsum.photos/800/400?random={{ $post->id }}"
            alt="Post featured image">
    @endif
    <div class="absolute top-4 left-4">
        @if($post->categories->isNotEmpty())
            @php
                $colors = ['bg-indigo-600', 'bg-green-600', 'bg-amber-600', 'bg-rose-600', 'bg-purple-600', 'bg-blue-600'];
                $colorIndex = $post->categories->first()->id % count($colors);
            @endphp
            <span class="inline-block px-3 py-1 text-xs font-semibold {{ $colors[$colorIndex] }} text-white rounded-md">
                {{ $post->categories->first()->name }}
            </span>
        @endif
    </div>
</div>
