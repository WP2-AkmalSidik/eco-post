@extends('layouts.admin')
@section('title', 'Edit Profile')

@section('content')
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card Kiri: Informasi Profil -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-indigo-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white">Profile Information</h2>
            </div>

            <div class="p-6">
                <div class="flex flex-col items-center space-y-4">
                    <!-- Foto Profil -->
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                            class="h-40 w-40 rounded-full border-4 border-white shadow-lg">
                    </div>

                    <!-- Informasi User -->
                    <div class="text-center space-y-2 w-full">
                        <h3 class="text-2xl font-semibold text-gray-800" id="display-name">John Doe</h3>
                        <p class="text-gray-600" id="display-email">john.doe@example.com</p>
                        <p class="text-sm text-gray-500 mt-4">Member since: June 2023</p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 w-full mt-6">
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Posts</p>
                            <p class="font-semibold">24</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Comments</p>
                            <p class="font-semibold">56</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Following</p>
                            <p class="font-semibold">18</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Kanan: Form Edit -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-indigo-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white">Edit Profile</h2>
            </div>

            <form class="p-6 space-y-4">
                <!-- Upload Foto -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Profile Picture</label>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Current"
                                class="h-16 w-16 rounded-full border-2 border-gray-200">
                        </div>
                        <div class="flex-1">
                            <input type="file" id="profile-photo" class="hidden" accept="image/*">
                            <label for="profile-photo"
                                class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Change Photo
                            </label>
                            <p class="text-xs text-gray-500 mt-3">JPG, PNG max 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" value="John Doe"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" value="john.doe@example.com"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Leave blank to keep current"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm new password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="resetForm()"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                        Reset
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk preview gambar dan update card kiri
        document.getElementById('profile-photo').addEventListener('change', function (e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    // Update foto di card kanan
                    document.querySelector('#profile-photo + label ~ div img').src = event.target.result;
                    // Update foto di card kiri
                    document.querySelector('.relative > img').src = event.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Fungsi untuk update card kiri saat form diubah
        document.querySelector('form').addEventListener('input', function (e) {
            if (e.target.name === 'name') {
                document.getElementById('display-name').textContent = e.target.value;
            }
            if (e.target.name === 'email') {
                document.getElementById('display-email').textContent = e.target.value;
            }
        });

        // Fungsi reset form
        function resetForm() {
            document.querySelector('form').reset();
            document.getElementById('display-name').textContent = 'John Doe';
            document.getElementById('display-email').textContent = 'john.doe@example.com';
            document.querySelector('.relative > img').src = 'https://randomuser.me/api/portraits/men/32.jpg';
            document.querySelector('#profile-photo + label ~ div img').src = 'https://randomuser.me/api/portraits/men/32.jpg';
        }
    </script>
@endsection
