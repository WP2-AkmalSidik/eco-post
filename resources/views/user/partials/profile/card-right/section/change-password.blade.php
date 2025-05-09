<div class="space-y-6 pt-4">
    <div class="flex items-center space-x-3 border-b border-gray-200 pb-4">
        <i class="fas fa-lock text-indigo-600 text-xl"></i>
        <h3 class="text-lg font-semibold text-gray-900">Change Password</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                    <i class="far fa-eye-slash text-gray-400 hover:text-gray-600 toggle-password"></i>
                </div>
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="space-y-3">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 flex items-center">
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
                    <i class="far fa-eye-slash text-gray-400 hover:text-gray-600 toggle-password"></i>
                </div>
            </div>
        </div>
    </div>
</div>
