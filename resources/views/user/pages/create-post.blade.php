@extends('layouts.user')
@section('title', 'Creating Post')

@section('content')
    <!-- Header Banner -->
    <div class="bg-indigo-700 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-2xl font-bold">Create New Blog Post</h1>
                <p class="mt-2">Share your thoughts with the world</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- validation messages -->
        @include('user.partials.create-post.validation-messages')

        <!-- Form Blog -->
        @include('user.partials.create-post.form-blog')
    </div>

    <!-- Preview Modal -->
    @include('user.partials.create-post.modal-preview')

    <!-- script -->
    @include('user.partials.create-post.assets.script')
@endsection
