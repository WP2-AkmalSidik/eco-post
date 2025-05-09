@extends('layouts.user')
@section('title', 'Home')

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Welcome to ModernBlog</h1>
                <p class="mt-3 text-lg">A place to share your thoughts, ideas, and stories with the world.</p>
            </div>
        </div>
    </div>

    <!-- Filter Options -->
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

    <!-- Posts Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div id="posts-container">
            <!-- Posts will be loaded here via AJAX -->
            <div class="text-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500 mx-auto"></div>
                <p class="mt-4 text-gray-600">Loading posts...</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const postsContainer = document.getElementById('posts-container');

            // Fungsi untuk menampilkan loading
            function showLoading() {
                postsContainer.innerHTML = `
                <div class="text-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Memuat artikel...</p>
                </div>
            `;
            }

            // Fungsi untuk menampilkan error
            function showError(message) {
                postsContainer.innerHTML = `
                <div class="text-center py-12">
                    <i class="fas fa-exclamation-triangle text-red-500 text-5xl mb-4"></i>
                    <h3 class="text-xl font-medium text-gray-900">Gagal Memuat</h3>
                    <p class="mt-2 text-gray-500">${message}</p>
                    <button onclick="loadPosts()" class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Coba Lagi
                    </button>
                </div>
            `;
            }

            // Fungsi utama untuk memuat post
            async function loadPosts(search = '') {
                showLoading();

                const category = document.getElementById('category-filter').value;
                const sort = document.getElementById('sort-filter').value;

                try {
                    const params = new URLSearchParams({
                        ajax: 1,
                        search: search,
                        category: category,
                        sort: sort
                    });

                    const response = await fetch(`{{ route('home') }}?${params.toString()}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    // Validasi response
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        const text = await response.text();
                        throw new Error(`Expected JSON, got: ${text.substring(0, 100)}...`);
                    }

                    const data = await response.json();

                    if (data.success) {
                        postsContainer.innerHTML = data.html;
                        updatePaginationLinks();
                    } else {
                        throw new Error(data.message || 'Unknown error occurred');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showError(error.message);
                }
            }

            // Fungsi untuk update pagination
            function updatePaginationLinks() {
                document.querySelectorAll('.pagination a').forEach(link => {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        loadPage(this.href);
                    });
                });
            }

            // Fungsi untuk memuat halaman dari pagination
            async function loadPage(url) {
                showLoading();

                try {
                    const response = await fetch(`${url}&ajax=1`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        postsContainer.innerHTML = data.html;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        updatePaginationLinks();
                    } else {
                        throw new Error(data.message || 'Pagination error');
                    }
                } catch (error) {
                    console.error('Pagination error:', error);
                    showError(error.message);
                }
            }

            // Event listeners
            document.getElementById('category-filter').addEventListener('change', () => loadPosts());
            document.getElementById('sort-filter').addEventListener('change', () => loadPosts());

            // Search input dengan debounce
            const searchInput = document.querySelector('nav input[type="text"]');
            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener('input', function () {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        loadPosts(this.value);
                    }, 500);
                });
            }

            // Load awal
            loadPosts();
        });

        // Membuat loadPosts tersedia secara global
        window.loadPosts = loadPosts;
    </script>
@endsection
