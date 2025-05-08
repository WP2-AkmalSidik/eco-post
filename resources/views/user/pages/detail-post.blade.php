@extends('layouts.user')

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
                    <a href="#" class="text-gray-500 hover:text-indigo-600">Home</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="ml-2 text-gray-500 hover:text-indigo-600">Blog</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 text-gray-700 font-medium">The Future of Web Development in 2025</span>
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
                        <img class="w-full h-full object-cover" src="{{ asset('img/bangkit.png') }}" alt="Post featured image">
                        <div class="absolute top-4 left-4">
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</span>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="p-6 md:p-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                                alt="Author">
                            <div>
                                <h3 class="text-sm font-medium">John Doe</h3>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    <span>May 5, 2025</span>
                                    <span class="mx-2">•</span>
                                    <i class="far fa-clock mr-1"></i>
                                    <span>10 min read</span>
                                </div>
                            </div>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold mb-6">The Future of Web Development in 2025</h1>

                        <div class="prose max-w-none mb-8">
                            <p class="mb-4">Web development has undergone significant transformation in recent years, with
                                technologies evolving at an unprecedented pace. As we move further into 2025, several
                                emerging trends are reshaping how developers build and maintain modern web applications.</p>

                            <h2 class="text-2xl font-bold mt-8 mb-4">The Rise of AI-Powered Development</h2>
                            <p class="mb-4">Artificial intelligence is revolutionizing the web development landscape. From
                                code generation to automated testing, AI tools are now capable of handling increasingly
                                complex tasks that once required human expertise. Developers are leveraging these
                                capabilities to accelerate development cycles while maintaining high-quality standards.</p>
                            <p class="mb-4">Machine learning models integrated into development environments can now suggest
                                optimizations, identify potential bugs, and even refactor code bases with minimal human
                                intervention.</p>

                            <h2 class="text-2xl font-bold mt-8 mb-4">WebAssembly Goes Mainstream</h2>
                            <p class="mb-4">WebAssembly (Wasm) has matured into a cornerstone technology for
                                high-performance web applications. By allowing code written in languages like Rust, C++, and
                                Go to run in browsers at near-native speed, WebAssembly has opened new possibilities for
                                web-based gaming, advanced visualizations, and complex computational tasks.</p>
                            <p class="mb-4">The ecosystem around WebAssembly has expanded dramatically, with improved
                                tooling, broader language support, and deeper integration with existing JavaScript
                                frameworks.</p>

                            <h2 class="text-2xl font-bold mt-8 mb-4">Serverless Architecture Evolution</h2>
                            <p class="mb-4">Serverless computing continues to evolve, with more sophisticated orchestration
                                options and improved developer experiences. The boundary between traditional backend
                                architectures and serverless solutions is increasingly blurred, giving teams more
                                flexibility in how they structure their applications.</p>
                            <p class="mb-4">Edge computing capabilities have enhanced serverless architectures, allowing
                                developers to run code closer to end-users and reduce latency for global applications.</p>

                            <h2 class="text-2xl font-bold mt-8 mb-4">Conclusion</h2>
                            <p class="mb-4">The web development landscape of 2025 offers exciting possibilities for
                                developers willing to embrace new technologies and methodologies. By staying informed about
                                these trends and adopting them strategically, development teams can create faster, more
                                secure, and more engaging web experiences.</p>
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
                                    <span>1,203 views</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Comment Section -->
                <div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
                    <h3 class="text-2xl font-bold mb-8">Comments (24)</h3>

                    <!-- Comment Form -->
                    <form class="mb-10 comment-form">
                        <div class="flex items-start space-x-4">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"
                                alt="Your profile">
                            <div class="flex-grow">
                                <textarea
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                    rows="3" placeholder="Share your thoughts..."></textarea>
                                <div class="mt-3 flex justify-end">
                                    <button type="submit"
                                        class="btn-submit px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-lg transition-colors">Post
                                        Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Comments List -->
                    <div class="space-y-8">
                        <!-- Comment 1 -->
                        <div class="border-b border-gray-200 pb-8 comment-container">
                            <div class="flex items-start space-x-4">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"
                                    alt="Commenter">
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="font-bold">Emma Watson</h4>
                                        <span class="text-sm text-gray-500">2 hours ago</span>
                                    </div>
                                    <p class="text-gray-800 mb-3">This is a fantastic analysis of current trends! I'm
                                        especially excited about the advancements in WebAssembly and how it's opening up new
                                        possibilities for web applications.</p>
                                    <div class="flex items-center space-x-4">

                                        <button
                                            class="reply-toggle flex items-center space-x-1 text-gray-500 hover:text-indigo-600">
                                            <i class="far fa-comment"></i>
                                            <span>Reply</span>
                                        </button>
                                    </div>

                                    <!-- Reply Form (Hidden by default) -->
                                    <div class="mt-4 hidden comment-form reply-form">
                                        <div class="flex items-start space-x-3">
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://randomuser.me/api/portraits/men/1.jpg" alt="Your profile">
                                            <div class="flex-grow">
                                                <form>
                                                    <textarea
                                                        class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                        rows="2" placeholder="Reply to Emma..." required></textarea>
                                                    <div class="mt-2 flex justify-end">
                                                        <button type="button"
                                                            class="cancel-reply mr-2 px-3 py-1 text-sm border border-gray-300 hover:bg-gray-100 rounded-lg transition-colors">Cancel</button>
                                                        <button type="submit"
                                                            class="px-3 py-1 text-sm bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Replies Container -->
                                    <div class="replies-container mt-4 pl-5 border-l-2 border-gray-100 space-y-4">
                                        <!-- Reply 1 -->
                                        <div class="comment-container flex items-start space-x-3">
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://randomuser.me/api/portraits/men/7.jpg" alt="Replier">
                                            <div class="flex-grow">
                                                <div class="flex items-center justify-between mb-1">
                                                    <h5 class="font-bold text-sm">John Doe</h5>
                                                    <span class="text-xs text-gray-500">1 hour ago</span>
                                                </div>
                                                <p class="text-gray-800 text-sm">Thanks Emma! I agree, WebAssembly is a
                                                    game-changer. Have you worked on any projects using it yet?</p>
                                                <div class="flex items-center space-x-4 mt-2">
                                                    <button
                                                        class="nested-reply-toggle flex items-center space-x-1 text-gray-500 hover:text-indigo-600 text-xs">
                                                        <i class="far fa-comment"></i>
                                                        <span>Reply</span>
                                                    </button>
                                                </div>

                                                <!-- Nested Reply Form (Hidden by default) -->
                                                <div class="mt-3 hidden comment-form nested-reply-form">
                                                    <div class="flex items-start space-x-3">
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="https://randomuser.me/api/portraits/men/1.jpg"
                                                            alt="Your profile">
                                                        <div class="flex-grow">
                                                            <form>
                                                                <textarea
                                                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                                    rows="2" placeholder="Reply to John..."
                                                                    required></textarea>
                                                                <div class="mt-2 flex justify-end">
                                                                    <button type="button"
                                                                        class="cancel-reply mr-2 px-3 py-1 text-xs border border-gray-300 hover:bg-gray-100 rounded-lg transition-colors">Cancel</button>
                                                                    <button type="submit"
                                                                        class="px-3 py-1 text-xs bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">Reply</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Replies Container -->
                                                <div class="nested-replies mt-4 pl-5 border-l-2 border-gray-100 space-y-4">
                                                    <!-- Nested replies will appear here -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Reply 2 -->
                                        <div class="comment-container flex items-start space-x-3">
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://randomuser.me/api/portraits/women/2.jpg" alt="Replier">
                                            <div class="flex-grow">
                                                <div class="flex items-center justify-between mb-1">
                                                    <h5 class="font-bold text-sm">Emma Watson</h5>
                                                    <span class="text-xs text-gray-500">30 minutes ago</span>
                                                </div>
                                                <p class="text-gray-800 text-sm">I've been experimenting with Rust and
                                                    WebAssembly for a visualization project. The performance boost is
                                                    incredible compared to plain JavaScript!</p>
                                                <div class="flex items-center space-x-4 mt-2">
                                                    <button
                                                        class="nested-reply-toggle flex items-center space-x-1 text-gray-500 hover:text-indigo-600 text-xs">
                                                        <i class="far fa-comment"></i>
                                                        <span>Reply</span>
                                                    </button>
                                                </div>

                                                <!-- Nested Reply Form (Hidden by default) -->
                                                <div class="mt-3 hidden comment-form nested-reply-form">
                                                    <div class="flex items-start space-x-3">
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="https://randomuser.me/api/portraits/men/1.jpg"
                                                            alt="Your profile">
                                                        <div class="flex-grow">
                                                            <form>
                                                                <textarea
                                                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                                    rows="2" placeholder="Reply to Emma..."
                                                                    required></textarea>
                                                                <div class="mt-2 flex justify-end">
                                                                    <button type="button"
                                                                        class="cancel-reply mr-2 px-3 py-1 text-xs border border-gray-300 hover:bg-gray-100 rounded-lg transition-colors">Cancel</button>
                                                                    <button type="submit"
                                                                        class="px-3 py-1 text-xs bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">Reply</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Replies Container -->
                                                <div class="nested-replies"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Comments -->
                    <div class="mt-8 text-center">
                        <button
                            class="px-6 py-2 border border-indigo-600 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">Load
                            More Comments</button>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-10 lg:mt-0">
                <!-- Author Info -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <img class="h-16 w-16 rounded-full" src="https://randomuser.me/api/portraits/men/7.jpg"
                            alt="Author">
                        <div class="ml-4">
                            <h3 class="font-bold text-lg">John Doe</h3>
                            <p class="text-gray-600">Member since June 2024 </p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Web development enthusiast with over 10 years of experience. Passionate
                        about emerging technologies and creating efficient, user-friendly applications.</p>
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
                        <a href="#"
                            class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <span>Technology</span>
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">42</span>
                        </a>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <span>Design</span>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">38</span>
                        </a>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <span>Business</span>
                            <span class="bg-amber-100 text-amber-800 text-xs font-medium px-2.5 py-0.5 rounded">24</span>
                        </a>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <span>Lifestyle</span>
                            <span class="bg-rose-100 text-rose-800 text-xs font-medium px-2.5 py-0.5 rounded">19</span>
                        </a>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <span>Culture</span>
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">15</span>
                        </a>
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

    <style>
        .comment-replies {
            transition: all 0.3s ease;
        }

        .comment-form:focus-within .btn-submit {
            background-color: #4338ca;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to handle all reply form toggles
            function setupReplyToggles() {
                // Primary reply toggles
                document.querySelectorAll('.reply-toggle').forEach(button => {
                    button.addEventListener('click', function () {
                        const parent = this.closest('.comment-container');
                        const replyForm = parent.querySelector('.reply-form');
                        replyForm.classList.toggle('hidden');

                        // Hide all other reply forms at the same level
                        parent.querySelectorAll('.reply-form').forEach(form => {
                            if (form !== replyForm) {
                                form.classList.add('hidden');
                            }
                        });
                    });
                });

                // Nested reply toggles (for replies to replies)
                document.querySelectorAll('.nested-reply-toggle').forEach(button => {
                    button.addEventListener('click', function () {
                        const parent = this.closest('.comment-container');
                        const replyForm = parent.querySelector('.nested-reply-form');
                        replyForm.classList.toggle('hidden');

                        // Hide all other nested reply forms at the same level
                        parent.querySelectorAll('.nested-reply-form').forEach(form => {
                            if (form !== replyForm) {
                                form.classList.add('hidden');
                            }
                        });
                    });
                });

                // Cancel buttons
                document.querySelectorAll('.cancel-reply').forEach(button => {
                    button.addEventListener('click', function () {
                        const replyForm = this.closest('.comment-form');
                        replyForm.classList.add('hidden');
                    });
                });
            }

            // Function to handle form submissions
            function setupSubmitHandlers() {
                document.querySelectorAll('.comment-form').forEach(form => {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();

                        const textarea = this.querySelector('textarea');
                        const replyContent = textarea.value.trim();

                        if (!replyContent) return;

                        // Create the new reply element
                        const newReply = createReplyElement(replyContent, this.classList.contains('nested-reply-form'));

                        // Determine where to insert the new reply
                        const parentComment = this.closest('.comment-container');
                        let repliesContainer;

                        if (this.classList.contains('nested-reply-form')) {
                            // This is a reply to a reply (nested)
                            repliesContainer = parentComment.querySelector('.nested-replies');
                            if (!repliesContainer) {
                                // Create a new nested replies container if it doesn't exist
                                repliesContainer = document.createElement('div');
                                repliesContainer.className = 'nested-replies mt-4 pl-5 border-l-2 border-gray-100 space-y-4';
                                parentComment.appendChild(repliesContainer);
                            }
                        } else {
                            // This is a reply to the main comment
                            repliesContainer = parentComment.querySelector('.replies-container');
                            if (!repliesContainer) {
                                // Create a new replies container if it doesn't exist
                                repliesContainer = document.createElement('div');
                                repliesContainer.className = 'replies-container mt-4 pl-5 border-l-2 border-gray-100 space-y-4';
                                parentComment.appendChild(repliesContainer);
                            }
                        }

                        // Insert the new reply at the top of the container
                        repliesContainer.prepend(newReply);

                        // Clear and hide the form
                        textarea.value = '';
                        this.classList.add('hidden');

                        // Setup event listeners for the new reply
                        setupReplyToggles();
                    });
                });
            }

            // Helper function to create a new reply element
            function createReplyElement(content, isNested = false) {
                const currentTime = new Date();
                const timeStr = 'Just now';

                // Create a random profile image
                const userIndex = Math.floor(Math.random() * 10) + 1;
                const gender = Math.random() > 0.5 ? 'men' : 'women';

                const replyDiv = document.createElement('div');
                replyDiv.className = 'comment-container flex items-start space-x-3';

                replyDiv.innerHTML = `
                    <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/${gender}/${userIndex}.jpg" alt="User">
                    <div class="flex-grow">
                        <div class="flex items-center justify-between mb-1">
                            <h5 class="font-bold text-sm">Current User</h5>
                            <span class="text-xs text-gray-500">${timeStr}</span>
                        </div>
                        <p class="text-gray-800 text-sm">${content}</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <button class="${isNested ? 'nested-reply-toggle' : 'reply-toggle'} flex items-center space-x-1 text-gray-500 hover:text-indigo-600 text-xs">
                                <i class="far fa-comment"></i>
                                <span>Reply</span>
                            </button>
                        </div>

                        <!-- Reply Form (Hidden by default) -->
                        <div class="mt-3 hidden comment-form ${isNested ? 'nested-reply-form' : 'reply-form'}">
                            <div class="flex items-start space-x-3">
                                <img class="h-6 w-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Your profile">
                                <div class="flex-grow">
                                    <form>
                                        <textarea class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                  rows="2" placeholder="Reply..." required></textarea>
                                        <div class="mt-2 flex justify-end">
                                            <button type="button" class="cancel-reply mr-2 px-3 py-1 text-xs border border-gray-300 hover:bg-gray-100 rounded-lg transition-colors">Cancel</button>
                                            <button type="submit" class="px-3 py-1 text-xs bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Container for nested replies -->
                        <div class="nested-replies"></div>
                    </div>
                `;

                return replyDiv;
            }

            // Initialize the event listeners
            setupReplyToggles();
            setupSubmitHandlers();
        });
    </script>

@endsection
