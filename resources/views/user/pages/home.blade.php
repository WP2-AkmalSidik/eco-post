@extends('layouts.user')
@section('title', 'Home')

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Welcome to ModernBlog</h1>
                <p class="mt-3 text-lg">A place to share your thoughts, ideas, and stories with the world.</p>
            </div>
        </div>
    </div>

    <!-- Filter Options -->
    @include('user.partials.home.filter-option')

    <!-- Posts Loader -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div id="posts-container">
            <div class="text-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500 mx-auto"></div>
                <p class="mt-4 text-gray-600">Loading posts...</p>
            </div>
        </div>
    </div>

    @include('user.partials.home.script')

@endsection
