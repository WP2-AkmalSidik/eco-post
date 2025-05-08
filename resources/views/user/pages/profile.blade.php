@extends('layouts.user')
@section('title', 'My Profile')

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">My Profile</h1>
                <p class="mt-3 text-lg">Manage your account settings and profile information</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Panel Kiri: Ringkasan Profil -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden">
                    <div class="px-6 py-8 text-center">
                        <!-- Avatar -->
                        <div class="relative mx-auto w-32 h-32 mb-6">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                                class="w-full h-full rounded-full border-4 border-white/20 object-cover shadow-lg">
                            <button
                                class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Info User -->
                        <h2 class="text-2xl font-bold text-white">John Doe</h2>
                        <p class="text-indigo-100 mt-1">john.doe@example.com</p>
                        <p class="text-indigo-200 text-sm mt-3">Member since June 2023</p>

                        <!-- Stats -->
                        <div class="mt-8 grid grid-cols-3 gap-4">
                            <div class="text-center py-3 bg-white/10 backdrop-blur-sm rounded-lg">
                                <p class="text-xs text-indigo-100">Posts</p>
                                <p class="font-bold text-white">24</p>
                            </div>
                            <div class="text-center py-3 bg-white/10 backdrop-blur-sm rounded-lg">
                                <p class="text-xs text-indigo-100">Comments</p>
                                <p class="font-bold text-white">56</p>
                            </div>
                            <div class="text-center py-3 bg-white/10 backdrop-blur-sm rounded-lg">
                                <p class="text-xs text-indigo-100">Following</p>
                                <p class="font-bold text-white">18</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Profil -->
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-4">
                        <ul class="space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center space-x-3 text-white/90 hover:text-white px-3 py-2 rounded-lg bg-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Profile Information</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center space-x-3 text-white/70 hover:text-white px-3 py-2 rounded-lg hover:bg-white/5 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center space-x-3 text-white/70 hover:text-white px-3 py-2 rounded-lg hover:bg-white/5 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Security</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Panel Kanan: Form Edit -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
                        <h2 class="text-xl font-semibold text-white">Edit Profile</h2>
                    </div>

                    <form class="p-6 space-y-6">
                        <!-- Foto Profil -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                            <div class="flex items-center space-x-6">
                                <div class="relative group">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Current"
                                        class="h-20 w-20 rounded-full border-2 border-gray-200 object-cover shadow-sm">
                                    <div
                                        class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3">
                                        <label for="profile-photo"
                                            class="cursor-pointer bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                            Change
                                            <input type="file" id="profile-photo" class="hidden" accept="image/*">
                                        </label>
                                        <button type="button"
                                            class="text-sm font-medium text-gray-500 hover:text-gray-700 transition">Remove</button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">JPG, GIF or PNG. Max size of 2MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name" value="John Doe"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" id="email" name="email" value="john.doe@example.com"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-500 cursor-default focus:ring-0 focus:border-gray-300 transition"
                                readonly>
                        </div>

                        <!-- Bio -->
                        <div class="space-y-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea id="bio" name="bio" rows="3"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">Digital designer & front-end developer. Creating beautiful interfaces since 2015.</textarea>
                        </div>

                        <!-- Password -->
                        <div class="space-y-4 pt-4">
                            <h3 class="text-lg font-medium text-gray-900">Password Settings</h3>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label for="current-password" class="block text-sm font-medium text-gray-700">Current
                                        Password</label>
                                    <input type="password" id="current-password" name="current-password"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="new-password" class="block text-sm font-medium text-gray-700">New
                                            Password</label>
                                        <input type="password" id="new-password" name="new-password"
                                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    </div>
                                    <div class="space-y-2">
                                        <label for="confirm-password"
                                            class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                        <input type="password" id="confirm-password" name="confirm-password"
                                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <button type="button"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition shadow-md">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
