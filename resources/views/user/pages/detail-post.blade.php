@extends('layouts.user')
@section('title', $post->title)

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">ModernBlog</h1>
                <p class="mt-3 text-lg">A place to share your thoughts, ideas, and stories with the world.</p>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    @include('user.partials.details.breadcrumbs')

    <!-- Blog Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Main Blog Content -->
            <div class="lg:col-span-8">
                <!-- Blog Post -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Post Header Image -->
                    @include('user.partials.details.header-image')

                    <!-- Post Content -->
                    @include('user.partials.details.post-content')
                </article>

                <!-- Comment Section -->
                @include('user.partials.details.comment')
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-10 lg:mt-0">
                <!-- Author Info -->
                @include('user.partials.details.info-author')

                <!-- Categories -->
                @include('user.partials.details.categories')

                <!-- Related Posts -->
                @include('user.partials.details.related-post')

                <!-- Newsletter -->
                @include('user.partials.details.newsletter')
            </div>
        </div>
    </div>
    @include('user.partials.details.assets.script')
@endsection
