@extends('layouts.user')
@section('title', 'My Profile')

@section('content')
    <div class="bg-gradient-to-r from-indigo-700 to-purple-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">My Profile</h1>
                <p class="mt-3 text-lg">Manage your account settings and view your content</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Left Panel: Profile Summary -->
            <div class="lg:col-span-1">
                <div
                    class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden sticky top-8">
                    <div class="px-6 py-8 text-center">
                        <!-- Avatar -->
                        <div class="relative mx-auto w-32 h-32 mb-6">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                alt="Profile"
                                class="w-full h-full rounded-full border-4 border-white/20 object-cover shadow-lg">
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

                    <!-- Profile Menu -->
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-4">
                        <ul class="space-y-2">
                            <li>
                                <a href="#profile-section"
                                    class="flex items-center space-x-3 text-white/90 hover:text-white px-3 py-2 rounded-lg bg-white/5">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Profile Information</span>
                                </a>
                            </li>
                            <li>
                                <a href="#blogs-section"
                                    class="flex items-center space-x-3 text-white/70 hover:text-white px-3 py-2 rounded-lg hover:bg-white/5 transition">
                                    <i class="fas fa-blog"></i>
                                    <span>My Blogs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings-section"
                                    class="flex items-center space-x-3 text-white/70 hover:text-white px-3 py-2 rounded-lg hover:bg-white/5 transition">
                                    <i class="fas fa-cog"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="#security-section"
                                    class="flex items-center space-x-3 text-white/70 hover:text-white px-3 py-2 rounded-lg hover:bg-white/5 transition">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Security</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Content Area -->
            <div class="lg:col-span-3">
                <!-- Profile Section -->
                <div id="profile-section"
                    class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
                    <!-- Header with gradient background -->
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6 flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-user-edit text-white text-2xl"></i>
                            <h2 class="text-2xl font-bold text-white">Edit Your Profile</h2>
                        </div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="p-8 space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture Section -->
                        <div class="space-y-5">
                            <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wider">Profile
                                Picture</label>
                            <div class="flex items-center space-x-8">
                                <div class="relative group">
                                    <!-- Current/Preview Image -->
                                    <img id="profile-preview"
                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                        alt="Profile Preview"
                                        class="h-24 w-24 rounded-full border-4 border-white object-cover shadow-lg transform group-hover:scale-105 transition duration-300">
                                    <div
                                        class="absolute inset-0 bg-black/30 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300 cursor-pointer">
                                        <i class="fas fa-camera text-white text-2xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-4">
                                        <label for="photo"
                                            class="cursor-pointer bg-white py-2.5 px-5 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 flex items-center space-x-2">
                                            <i class="fas fa-sync-alt text-indigo-600"></i>
                                            <span>Change Photo</span>
                                            <input type="file" id="photo" name="photo" class="hidden" accept="image/*"
                                                onchange="previewImage(this)">
                                        </label>
                                        <button type="button" onclick="removePhoto()"
                                            class="text-sm font-medium text-gray-500 hover:text-red-600 transition duration-300 flex items-center space-x-1">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-3 flex items-center">
                                        <i class="fas fa-info-circle mr-1.5"></i>
                                        JPG, GIF or PNG. Max size of 2MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Grid for Name and Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Full Name -->
                            <div class="space-y-3">
                                <label for="name"
                                    class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
                                    <i class="fas fa-user mr-2 text-indigo-600"></i>
                                    Full Name
                                </label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                        class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 pl-12">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-signature text-gray-400"></i>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="space-y-3">
                                <label for="email"
                                    class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
                                    <i class="fas fa-envelope mr-2 text-indigo-600"></i>
                                    Email Address
                                </label>
                                <div class="relative">
                                    <input type="text" id="email" name="email" value="{{ $user->email }}"
                                        class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 bg-gray-50 pl-12"
                                        readonly>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-at text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bio Section -->
                        <div class="space-y-3">
                            <label for="bio"
                                class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
                                <i class="fas fa-pencil-alt mr-2 text-indigo-600"></i>
                                Bio
                            </label>
                            <div class="relative">
                                <textarea id="bio" name="bio" rows="4"
                                    class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 pl-12">{{ old('bio', $user->bio) }}</textarea>
                                <div class="absolute top-3.5 left-3 flex items-center">
                                    <i class="fas fa-align-left text-gray-400"></i>
                                </div>
                            </div>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Section -->
                        <div class="space-y-6 pt-4">
                            <div class="flex items-center space-x-3 border-b border-gray-200 pb-4">
                                <i class="fas fa-lock text-indigo-600 text-xl"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Change Password</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- New Password -->
                                <div class="space-y-3">
                                    <label for="password" class="block text-sm font-medium text-gray-700 flex items-center">
                                        <i class="fas fa-key mr-2 text-indigo-600"></i>
                                        New Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password"
                                            class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 pl-12">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                            <i
                                                class="far fa-eye-slash text-gray-400 hover:text-gray-600 toggle-password"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="space-y-3">
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700 flex items-center">
                                        <i class="fas fa-key mr-2 text-indigo-600"></i>
                                        Confirm Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 pl-12">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                            <i
                                                class="far fa-eye-slash text-gray-400 hover:text-gray-600 toggle-password"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-5 pt-8">
                            <button type="button"
                                class="px-7 py-3.5 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 shadow-sm hover:shadow-md flex items-center space-x-2">
                                <i class="fas fa-times"></i>
                                <span>Cancel</span>
                            </button>
                            <button type="submit"
                                class="px-7 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                                <i class="fas fa-save"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Blogs Section -->
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
                                <div
                                    class="border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                                    <div class="grid grid-cols-1 md:grid-cols-4">
                                        <div class="md:col-span-1 h-48 md:h-full">
                                            <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : 'https://picsum.photos/400/192' }}"
                                                alt="Blog thumbnail" class="w-full h-full object-cover">
                                        </div>
                                        <div class="md:col-span-3 p-6">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <span
                                                        class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</span>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-500 hover:text-red-600 transition">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <h3
                                                class="mt-3 text-xl font-semibold text-gray-900 hover:text-indigo-600 transition">
                                                <a
                                                    href="{{ route('detail-post.index', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
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
                                            <span
                                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-white bg-indigo-600">
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
            </div>
        </div>
    </div>
    <script>
        // Function to preview selected image
        function previewImage(input) {
            const preview = document.getElementById('profile-preview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}";
            }
        }

        // Function to remove selected image
        function removePhoto() {
            const input = document.getElementById('photo');
            const preview = document.getElementById('profile-preview');

            // Reset file input
            input.value = '';

            // Reset preview to default image
            preview.src = "{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}";

            // Show success message
            alert('Photo selection removed. Remember to save changes to update your profile.');
        }
    </script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(function (icon) {
            icon.addEventListener('click', function () {
                const input = this.closest('.relative').querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
                this.classList.toggle('fa-eye');
            });
        });

        // Preview image when photo is selected
        document.getElementById('photo').addEventListener('change', function (e) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.querySelector('.group img').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endsection
