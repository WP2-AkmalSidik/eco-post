<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="space-y-3">
        <label for="name" class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
            <i class="fas fa-user mr-2 text-indigo-600"></i>
            Full Name
        </label>
        <div class="relative">
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 pl-12">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-signature text-gray-400"></i>
            </div>
        </div>
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="space-y-3">
        <label for="email" class="block text-sm font-semibold text-gray-700 uppercase tracking-wider flex items-center">
            <i class="fas fa-envelope mr-2 text-indigo-600"></i>
            Email Address
        </label>
        <div class="relative">
            <input type="text" id="email" name="email" value="{{ $user->email }}"
                class="block w-full px-5 py-3.5 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 bg-gray-50 pl-12"
                readonly>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-at text-gray-400"></i>
            </div>
        </div>
    </div>
</div>
