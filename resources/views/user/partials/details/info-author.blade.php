<div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
    <div class="flex items-center mb-4">
        <img class="h-12 w-12 rounded-full"
            src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&size=128' }}"
            alt="{{ $post->user->name }}">
        <div class="ml-4">
            <h3 class="font-bold text-lg">{{ $post->user->name }}</h3>
            <p class="text-gray-600">Member since {{ $post->user->created_at->format('M Y') }}</p>
        </div>
    </div>
    <p class="text-gray-700 mb-4">{{ $post->user->bio ?? 'No bio available' }}</p>
    <div class="flex space-x-3">
        <a href="#" class="text-gray-600 hover:text-indigo-600">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-gray-600 hover:text-indigo-600">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="#" class="text-gray-600 hover:text-indigo-600">
            <i class="fab fa-github"></i>
        </a>
    </div>
</div>
