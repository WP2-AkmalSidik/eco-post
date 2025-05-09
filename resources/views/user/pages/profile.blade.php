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
            @include('user.partials.profile.card-left-profile')

            <!-- Right Panel: Content Area -->
            <div class="lg:col-span-3">
                <div id="profile-section" class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6 flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-user-edit text-white text-2xl"></i>
                            <h2 class="text-2xl font-bold text-white">Edit Your Profile</h2>
                        </div>
                    </div>

                    @include('user.partials.profile.card-right.form-edit-profile')
                </div>

                <!-- List Blogs -->
                @include('user.partials.profile.card-right.list-blog')
            </div>
        </div>
    </div>
    @include('user.partials.profile.script')
@endsection
