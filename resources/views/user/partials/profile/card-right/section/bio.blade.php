<div class="space-y-3">
    <label for="bio" class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
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
