<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const postsContainer = document.getElementById('posts-container');

        function showLoading() {
            postsContainer.innerHTML = `
                <div class="text-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Memuat artikel...</p>
                </div>
            `;
        }

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

        function updatePaginationLinks() {
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    loadPage(this.href);
                });
            });
        }

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

        document.getElementById('category-filter').addEventListener('change', () => loadPosts());
        document.getElementById('sort-filter').addEventListener('change', () => loadPosts());

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
        loadPosts();
    });

    window.loadPosts = loadPosts;
</script>
