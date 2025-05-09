@extends('layouts.user')
@section('title', $post->title)

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">ModernBlog</h1>
                <p class="mt-3 text-lg">A place to share your thoughts, ideas, and stories with the world.</p>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="{{ route('dashboard.user') }}" class="text-gray-500 hover:text-indigo-600">Home</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('dashboard.user') }}" class="ml-2 text-gray-500 hover:text-indigo-600">Blog</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 text-gray-700 font-medium">{{ $post->title }}</span>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Blog Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Main Blog Content -->
            <div class="lg:col-span-8">
                <!-- Blog Post -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Post Header Image -->
                    <div class="relative h-72 md:h-96">
                        @if($post->image_path)
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image_path) }}"
                                alt="{{ $post->title }}">
                        @else
                            <img class="w-full h-full object-cover" src="https://picsum.photos/800/400?random={{ $post->id }}"
                                alt="Post featured image">
                        @endif
                        <div class="absolute top-4 left-4">
                            @if($post->categories->isNotEmpty())
                                @php
    $colors = ['bg-indigo-600', 'bg-green-600', 'bg-amber-600', 'bg-rose-600', 'bg-purple-600', 'bg-blue-600'];
    $colorIndex = $post->categories->first()->id % count($colors);
                                @endphp
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold {{ $colors[$colorIndex] }} text-white rounded-md">
                                    {{ $post->categories->first()->name }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="p-6 md:p-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <img class="h-12 w-12 rounded-full"
                                src="https://randomuser.me/api/portraits/men/{{ $post->user->id }}.jpg" alt="Author">
                            <div>
                                <h3 class="text-sm font-medium">{{ $post->user->name }}</h3>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <i class="far fa-clock mr-1"></i>
                                    <span>{{ $post->reading_time }} min read</span>
                                </div>
                            </div>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold mb-6">{{ $post->title }}</h1>

                        <div class="prose max-w-none mb-8">
                            {!! $post->body !!}
                        </div>

                        <!-- Social Sharing -->
                        <div class="border-t border-gray-200 pt-6 flex flex-wrap items-center justify-between">
                            <div class="flex items-center space-x-6 mb-4 md:mb-0">
                                <span class="text-gray-700 font-medium">Share this post:</span>
                                <a href="#" class="text-gray-500 hover:text-indigo-600">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-indigo-600">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-indigo-600">
                                    <i class="fab fa-linkedin-in text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-indigo-600">
                                    <i class="far fa-envelope text-xl"></i>
                                </a>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-indigo-600">
                                    <i class="far fa-eye mr-1"></i>
                                    <span>{{ number_format($post->views) }} views</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Comment Section -->
                <div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
                    <h3 class="text-2xl font-bold mb-8">Comments ({{ $post->total_comments }})</h3>
                    <!-- Comment Form -->
                    @auth
                        <form method="POST" action="{{ route('comments.store') }}" class="mb-10 comment-form">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="flex items-start space-x-4">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://randomuser.me/api/portraits/men/{{ auth()->id() }}.jpg" alt="Your profile">
                                <div class="flex-grow">
                                    <textarea name="body"
                                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                        rows="3" placeholder="Share your thoughts..." required></textarea>
                                    <div class="mt-3 flex justify-end">
                                        <button type="submit"
                                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-lg transition-colors">Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="mb-6 p-4 bg-indigo-50 rounded-lg text-center">
                            <p class="text-indigo-800">Please <a href="{{ route('login') }}"
                                    class="font-medium hover:underline">login</a> or <a href="{{ route('register') }}" class="font-medium hover:underline">register</a> to leave a comment.</p>
                        </div>
                    @endauth

                    <!-- Comments List -->
                    <div class="space-y-8" id="comments-container">
                        @foreach($post->comments as $comment)
                            @include('user.partials.comment', ['comment' => $comment])
                        @endforeach
                    </div>

                    @if($post->comments->count() > 5)
                        <!-- Load More Comments -->
                        <div class="mt-8 text-center">
                            <button id="load-more-comments"
                                class="px-6 py-2 border border-indigo-600 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">Load
                                More Comments</button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-10 lg:mt-0">
                <!-- Author Info -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <img class="h-16 w-16 rounded-full"
                            src="https://randomuser.me/api/portraits/men/{{ $post->user->id }}.jpg" alt="Author">
                        <div class="ml-4">
                            <h3 class="font-bold text-lg">{{ $post->user->name }}</h3>
                            <p class="text-gray-600">Member since {{ $post->user->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $post->user->bio ?? 'No bio available' }}</p>
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
                    <h3 class="font-bold text-xl mb-4 pb-2 border-b border-gray-200">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <a href="{{ route('dashboard.user', ['category' => $category->id]) }}"
                                class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                                <span>{{ $category->name }}</span>
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $category->posts_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
                    <h3 class="font-bold text-xl mb-4 pb-2 border-b border-gray-200">Related Posts</h3>
                    <div class="space-y-4">
                        @foreach($relatedPosts as $relatedPost)
                            <a href="{{ route('detail-post.index', ['slug' => $relatedPost->slug]) }}"
                                class="flex items-start space-x-3 group">
                                @if($relatedPost->image_path)
                                    <img class="h-16 w-16 rounded-lg object-cover"
                                        src="{{ asset('storage/' . $relatedPost->image_path) }}" alt="{{ $relatedPost->title }}">
                                @else
                                    <img class="h-16 w-16 rounded-lg object-cover"
                                        src="https://picsum.photos/100/100?random={{ $relatedPost->id }}"
                                        alt="{{ $relatedPost->title }}">
                                @endif
                                <div>
                                    <h4 class="font-medium group-hover:text-indigo-600">
                                        {{ Str::limit($relatedPost->title, 50) }}
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">{{ $relatedPost->created_at->format('M d, Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bg-indigo-700 rounded-xl shadow-md overflow-hidden p-6">
                    <h3 class="font-bold text-xl mb-3 text-white">Subscribe to Newsletter</h3>
                    <p class="text-indigo-200 mb-4">Get the latest posts delivered straight to your inbox.</p>
                    <form>
                        <div class="flex flex-col space-y-3">
                            <input type="email" placeholder="Your email address"
                                class="px-4 py-2 rounded-lg border-0 focus:ring-2 focus:ring-white w-full" required>
                            <button type="submit"
                                class="px-4 py-2 bg-white text-indigo-700 font-medium rounded-lg hover:bg-indigo-50 transition-colors">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Sistem komentar blog dimuat');

            /**
             * Fungsi utama yang menangani toggle untuk form reply
             */
            function setupReplyToggles() {
                // Bersihkan listener lama yang mungkin menumpuk
                document.querySelectorAll('.reply-toggle').forEach(btn => {
                    const newBtn = btn.cloneNode(true);
                    btn.parentNode.replaceChild(newBtn, btn);
                });

                // Cara 1: Menggunakan data-comment-id
                document.querySelectorAll('.reply-toggle').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const commentId = this.getAttribute('data-comment-id');

                        if (commentId) {
                            const replyForm = document.getElementById(`reply-form-${commentId}`);
                            if (replyForm) {
                                replyForm.classList.toggle('hidden');
                                return;
                            }
                        }

                        // Cara 2: Menggunakan traversal DOM
                        const commentContainer = this.closest('.comment-container');
                        if (commentContainer) {
                            const replyForm = commentContainer.querySelector('.reply-form');
                            if (replyForm) {
                                replyForm.classList.toggle('hidden');
                            }
                        }
                    });
                });

                // Tombol cancel untuk menutup form
                document.querySelectorAll('.cancel-reply').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const replyForm = this.closest('.reply-form');
                        if (replyForm) {
                            replyForm.classList.add('hidden');
                        }
                    });
                });
            }

            /**
             * Fungsi yang menangani submit form komentar
             */
            function setupCommentForms() {
                document.querySelectorAll('form.comment-form').forEach(form => {
                    form.addEventListener('submit', function (e) {
                        // Hanya proses form yang memiliki action di atribut
                        if (!this.action) return;

                        e.preventDefault();
                        const formData = new FormData(this);
                        const submitButton = this.querySelector('button[type="submit"]');
                        const originalText = submitButton.textContent;

                        submitButton.disabled = true;
                        submitButton.textContent = 'Posting...';

                        fetch(this.action, {
                            method: this.method || 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Reload halaman untuk menampilkan komentar baru
                                    window.location.reload();
                                } else {
                                    alert('Error posting comment: ' + (data.message || 'Unknown error'));
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error posting comment. Please try again.');
                            })
                            .finally(() => {
                                submitButton.disabled = false;
                                submitButton.textContent = originalText;
                            });
                    });
                });
            }

            /**
             * Fungsi yang menangani load more comments
             */
            function setupLoadMoreComments() {
                const loadMoreBtn = document.getElementById('load-more-comments');
                if (loadMoreBtn) {
                    loadMoreBtn.addEventListener('click', function () {
                        const commentsContainer = document.getElementById('comments-container');
                        const currentCount = commentsContainer.querySelectorAll('.comment-container').length;

                        // Cari post_id dari form komentar atau URL
                        let postId;
                        const postIdInput = document.querySelector('input[name="post_id"]');
                        if (postIdInput) {
                            postId = postIdInput.value;
                        } else {
                            // Coba ambil dari URL jika tidak ada di form
                            const urlParams = new URLSearchParams(window.location.search);
                            postId = urlParams.get('post_id');
                        }

                        if (!postId) {
                            console.error('Post ID tidak ditemukan');
                            return;
                        }

                        this.disabled = true;
                        this.textContent = 'Loading...';

                        fetch(`/user/comments/load-more?post_id=${postId}&offset=${currentCount}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success && data.html) {
                                    commentsContainer.insertAdjacentHTML('beforeend', data.html);

                                    // Re-initialize event handlers for new comments
                                    setupReplyToggles();

                                    if (data.remaining <= 0) {
                                        this.style.display = 'none';
                                    }
                                }
                            })
                            .catch(error => {
                                console.error('Error loading more comments:', error);
                            })
                            .finally(() => {
                                this.disabled = false;
                                this.textContent = 'Load More Comments';
                            });
                    });
                }
            }

            /**
             * Fungsi untuk memeriksa struktur DOM komentar
             * Jika ada masalah dengan struktur, coba perbaiki
             */
            function checkAndFixCommentStructure() {
                document.querySelectorAll('.comment-container').forEach((container, index) => {
                    // Pastikan setiap container memiliki tombol reply
                    const replyButton = container.querySelector('.reply-toggle');
                    if (replyButton && !replyButton.hasAttribute('data-comment-id')) {
                        // Jika tombol tidak memiliki data-comment-id, cari dari struktur DOM
                        const commentId = container.id ? container.id.replace('comment-', '') : `temp-${index}`;
                        replyButton.setAttribute('data-comment-id', commentId);
                    }

                    // Pastikan setiap container memiliki form reply
                    const replyForm = container.querySelector('.reply-form');
                    if (replyForm) {
                        // Pastikan form memiliki id yang cocok dengan tombol
                        const commentId = replyButton ? replyButton.getAttribute('data-comment-id') : `temp-${index}`;
                        replyForm.id = `reply-form-${commentId}`;

                        // Pastikan form disembunyikan di awal
                        if (!replyForm.classList.contains('hidden')) {
                            replyForm.classList.add('hidden');
                        }
                    }
                });
            }

            // Inisialisasi semua fungsi
            checkAndFixCommentStructure();
            setupReplyToggles();
            setupCommentForms();
            setupLoadMoreComments();

            // Tambahkan indikator visual ketika tombol reply diklik
            document.querySelectorAll('.reply-toggle').forEach(button => {
                button.addEventListener('click', function () {
                    // Buat efek visual
                    this.style.backgroundColor = 'rgba(79, 70, 229, 0.1)';
                    setTimeout(() => {
                        this.style.backgroundColor = '';
                    }, 300);
                });
            });
        });
    </script>
@endsection
