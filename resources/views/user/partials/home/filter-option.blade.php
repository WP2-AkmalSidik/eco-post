<div class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-3 flex flex-wrap justify-between items-center">
            <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                <span class="text-sm font-medium text-gray-700">Filter by:</span>
                <div class="inline">
                    <select id="category-filter"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        <option value="all">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" id="current-sort" value="newest">
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-700">Sort by:</span>
                <div class="inline">
                    <select id="sort-filter"
                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="popular">Most Viewed</option>
                        <option value="most_commented">Most Commented</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
