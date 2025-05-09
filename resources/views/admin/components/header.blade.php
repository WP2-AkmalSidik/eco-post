<header class="bg-white shadow-sm flex items-center justify-between p-4">
    <div class="flex items-center md:hidden">
        <button id="menuBtn" class="text-gray-600 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <div class="flex items-center flex-1 justify-end md:justify-between">
        <div class="hidden md:block">
            <h1 class="text-2xl font-semibold text-gray-800">@yield('title')</h1>
        </div>

        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-3">
                <span class="text-gray-700 hidden md:inline">{{ Auth::user()->name }}</span>
                <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-200">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                            class="h-full w-full object-cover">
                    @else
                        <div class="h-full w-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
