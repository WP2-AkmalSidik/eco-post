<div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden sticky top-8">
        <div class="px-6 py-8 text-center">
            <!-- Avatar -->
            <div class="relative mx-auto w-32 h-32 mb-6">
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    alt="Profile" class="w-full h-full rounded-full border-4 border-white/20 object-cover shadow-lg">
            </div>

            <!-- User Info -->
            <h2 class="text-2xl font-bold text-white">{{ $user->name }}</h2>
            <p class="text-indigo-100 mt-1">{{ $user->email }}</p>
            <p class="text-indigo-200 text-sm mt-3">Member since {{ $user->created_at->format('F Y') }}</p>

            <div class="mt-8 flex justify-center gap-6">
                <!-- Posts -->
                <div class="text-center py-3 px-4 bg-white/10 backdrop-blur-sm rounded-lg w-28">
                    <p class="text-xs text-indigo-100">Posts</p>
                    <p class="font-bold text-white">{{ $posts->total() }}</p>
                </div>

                <!-- Comments -->
                <div class="text-center py-3 px-4 bg-white/10 backdrop-blur-sm rounded-lg w-28">
                    <p class="text-xs text-indigo-100">Comments</p>
                    <p class="font-bold text-white">0</p>
                </div>
            </div>
        </div>
    </div>
</div>
