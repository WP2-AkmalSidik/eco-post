<aside class="bg-indigo-800 text-white w-64 flex-shrink-0 hidden md:block">
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-6 flex items-center">
            <i class="fas fa-feather-alt mr-3"></i>Admin - MB
        </h2>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-3 bg-indigo-900 rounded-lg">
                        <i class="fas fa-tachometer-alt w-6"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 hover:bg-indigo-700 rounded-lg transition duration-150">
                        <i class="fas fa-file-alt w-6"></i>
                        <span>Posts</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 hover:bg-indigo-700 rounded-lg transition duration-150">
                        <i class="fas fa-comments w-6"></i>
                        <span>Comments</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 hover:bg-indigo-700 rounded-lg transition duration-150">
                        <i class="fas fa-users w-6"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 hover:bg-indigo-700 rounded-lg transition duration-150">
                        <i class="fas fa-cog w-6"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="mt-auto p-4 border-t border-indigo-700">
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full text-left flex items-center p-2 hover:bg-indigo-700 rounded-lg transition duration-150">
                <i class="fas fa-sign-out-alt w-6"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
