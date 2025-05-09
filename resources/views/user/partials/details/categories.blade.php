<div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
    <h3 class="font-bold text-xl mb-4 pb-2 border-b border-gray-200">Categories</h3>
    <div class="space-y-2">
        @foreach($categories as $category)
            <a href="{{ route('dashboard.user', ['category' => $category->id]) }}"
                class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                <span>{{ $category->name }}</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $category->posts_count }}</span>
            </a>
        @endforeach
    </div>
</div>
