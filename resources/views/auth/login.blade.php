@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <!-- Left Side - Image -->
    <div class="hidden lg:block lg:w-1/2 bg-indigo-600 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 opacity-90"></div>
        <div class="absolute inset-0 flex items-center justify-center p-12">
            <div class="max-w-md text-white text-center">
                <div class="text-5xl font-bold mb-6 flex justify-center">
                    <i class="fas fa-feather-alt mr-3"></i>
                    ModernBlog
                </div>
                <h1 class="text-3xl font-bold mb-6">Welcome back to your creative community</h1>
                <p class="text-xl opacity-80">Share your ideas, connect with others, and discover amazing content.
                </p>
                <div class="mt-12 grid grid-cols-2 gap-4">
                    <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                        <div class="text-2xl mb-2"><i class="fas fa-pen-fancy"></i></div>
                        <h3 class="font-medium mb-1">Create Posts</h3>
                        <p class="text-sm opacity-80">Express yourself through engaging blogs</p>
                    </div>
                    <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                        <div class="text-2xl mb-2"><i class="fas fa-comments"></i></div>
                        <h3 class="font-medium mb-1">Join Discussions</h3>
                        <p class="text-sm opacity-80">Engage in meaningful conversations</p>
                    </div>
                    <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                        <div class="text-2xl mb-2"><i class="fas fa-bookmark"></i></div>
                        <h3 class="font-medium mb-1">Save Favorites</h3>
                        <p class="text-sm opacity-80">Bookmark posts to read later</p>
                    </div>
                    <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                        <div class="text-2xl mb-2"><i class="fas fa-user-friends"></i></div>
                        <h3 class="font-medium mb-1">Build Network</h3>
                        <p class="text-sm opacity-80">Connect with like-minded people</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-8">
                <div class="text-3xl font-bold text-indigo-600 flex items-center justify-center">
                    <i class="fas fa-feather-alt mr-2"></i>
                    ModernBlog
                </div>
                <p class="text-gray-500 mt-1">Welcome back to your creative community</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Sign in to your account</h2>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <button
                        class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white hover:bg-gray-50 transition-colors">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">Google</span>
                    </button>
                    <button
                        class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white hover:bg-gray-50 transition-colors">
                        <i class="fab fa-github text-gray-800 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">GitHub</span>
                    </button>
                </div>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                            address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="you@example.com">
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <a href="#" class="text-xs font-medium text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer"
                                onclick="togglePasswordVisibility('password')">
                                <i id="password-toggle-icon" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Create one
                            now</a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-xs text-gray-500">
                    &copy; 2025 ModernBlog. All rights reserved.
                </p>
                <div class="flex justify-center space-x-4 mt-2">
                    <a href="#" class="text-gray-400 hover:text-gray-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
