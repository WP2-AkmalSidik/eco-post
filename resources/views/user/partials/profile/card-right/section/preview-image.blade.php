<div class="relative group">
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
            <input type="file" id="photo" name="photo" class="hidden" accept="image/*" onchange="previewImage(this)">
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
