<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
    @csrf
    @method('PUT')

    <!-- Profile Picture Section -->
    <div class="space-y-5">
        <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wider">ProfilePicture</label>
        <div class="flex items-center space-x-8">
            <!-- Current/Preview Image -->
            @include('user.partials.profile.card-right.section.preview-image')
        </div>
    </div>

    <!-- Grid for Name and Email -->
    @include('user.partials.profile.card-right.section.name-email')

    <!-- Bio Section -->
    @include('user.partials.profile.card-right.section.bio')

    <!-- Password Section -->
    @include('user.partials.profile.card-right.section.change-password')

    <div class="flex justify-end space-x-5 pt-8">
        <button type="button"
            class="px-7 py-3.5 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 shadow-sm hover:shadow-md flex items-center space-x-2">
            <i class="fas fa-times"></i>
            <span>Cancel</span>
        </button>
        <button type="submit"
            class="px-7 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
            <i class="fas fa-save"></i>
            <span>Save Changes</span>
        </button>
    </div>
</form>
