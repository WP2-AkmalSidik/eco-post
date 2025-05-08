<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <title>The Future of Web Development in 2025 - ModernBlog</title>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center text-indigo-600 font-bold text-xl">
                        <i class="fas fa-feather-alt mr-2"></i>
                        ModernBlog
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex items-center flex-1 max-w-lg mx-8">
                    <div class="w-full relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search posts..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Home</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Topics</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">About</a>
                    <a href="#" class="ml-4 px-4 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Write Post</a>

                    <!-- User Dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button">
                                <img class="h-8 w-8 rounded-full" src="/api/placeholder/32/32" alt="User profile">
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile search - shown below navbar on small screens -->
        <div class="md:hidden border-t border-gray-200 py-2 px-4">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Search posts..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Post Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="#" class="inline-block px-3 py-1 text-xs font-semibold bg-indigo-600 text-white rounded-md">Technology</a>
                    <span class="mx-2 text-gray-400">•</span>
                    <span class="text-sm text-gray-600">
                        <i class="far fa-calendar-alt mr-1"></i>
                        May 5, 2025
                    </span>
                    <span class="mx-2 text-gray-400">•</span>
                    <span class="text-sm text-gray-600">
                        <i class="far fa-clock mr-1"></i>
                        8 min read
                    </span>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 md:text-4xl mb-4">The Future of Web Development in 2025</h1>
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full mr-3" src="/api/placeholder/40/40" alt="Author">
                    <div>
                        <div class="text-sm font-medium text-gray-900">John Doe</div>
                        <div class="text-sm text-gray-500">Web Developer & Tech Writer</div>
                    </div>
                    <!-- Author's post actions if logged in user is author -->
                    <div class="ml-auto flex space-x-2">
                        <a href="#" class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <button class="inline-flex items-center px-3 py-1 border border-red-300 rounded-md text-sm font-medium text-red-700 bg-white hover:bg-red-50">
                            <i class="fas fa-trash-alt mr-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="relative rounded-xl overflow-hidden mb-8 h-64 md:h-96">
                <img class="w-full h-full object-cover" src="/api/placeholder/800/384" alt="Featured image">
            </div>

            <!-- Post Content -->
            <div class="prose prose-indigo max-w-none">
                <p>The landscape of web development is constantly evolving, with new technologies, frameworks, and practices emerging at a rapid pace. As we move further into 2025, several trends are shaping the future of how we build and interact with the web.</p>

                <h2>The Rise of AI-Assisted Development</h2>
                <p>One of the most significant changes in web development is the integration of AI tools into the development workflow. From code generation to debugging, AI assistants are now capable of handling complex tasks that would have taken developers hours to complete manually.</p>

                <p>These tools analyze patterns in your codebase and suggest improvements, identify potential bugs before they cause issues, and even generate entire components based on simple descriptions. The result is a significant boost in productivity and code quality.</p>

                <h2>WebAssembly Becomes Mainstream</h2>
                <p>WebAssembly (WASM) has moved beyond experimental status to become a standard technology in web development. With near-native performance, WASM has enabled complex applications like photo and video editors, 3D modeling tools, and even full-fledged games to run directly in the browser.</p>

                <p>The interoperability between JavaScript and WebAssembly has improved significantly, making it easier than ever to incorporate high-performance modules written in languages like Rust, C++, or Go into web applications.</p>

                <h2>Server Components and Islands Architecture</h2>
                <p>The concept of server components has revolutionized how we think about rendering web applications. By moving certain components to server-side rendering while keeping interactive elements client-side, developers can create applications that are both highly interactive and extremely fast to load.</p>

                <p>Islands architecture has built on this idea, allowing developers to create isolated "islands" of interactivity within mostly static pages. This approach combines the best of both worlds: the SEO benefits and performance of static sites with the interactivity of client-side applications.</p>

                <h2>Edge Computing for Web Applications</h2>
                <p>Edge computing has transformed deployment strategies, bringing computation closer to the user. With major cloud providers offering edge function services, developers can now run code at edge locations worldwide, drastically reducing latency and improving user experience.</p>

                <p>This shift has enabled new possibilities for real-time applications, especially for users in regions with slower internet connections or far from traditional data centers.</p>

                <h2>Privacy-First Development</h2>
                <p>With increasing awareness and regulation around user privacy, web development practices have evolved to prioritize data protection. This includes adopting privacy-preserving analytics, implementing cookie-less tracking alternatives, and designing systems that minimize data collection by default.</p>

                <h2>Conclusion</h2>
                <p>As we continue through 2025, these trends will likely accelerate and evolve further. The most successful web developers will be those who embrace these changes, continuously learn new technologies, and focus on creating fast, accessible, and user-friendly experiences.</p>

                <p>What developments are you most excited about in the world of web development? Share your thoughts in the comments below!</p>
            </div>

            <!-- Social Sharing -->
            <div class="mt-8 border-t border-b border-gray-200 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-700">Share this post:</span>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="flex items-center text-gray-500 hover:text-indigo-600">
                            <i class="far fa-heart mr-1"></i>
                            <span>86 likes</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Author Bio -->
            <div class="mt-8 bg-gray-50 rounded-xl p-6">
                <div class="flex items-start">
                    <img class="h-16 w-16 rounded-full mr-4" src="/api/placeholder/64/64" alt="Author">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">About John Doe</h3>
                        <p class="mt-1 text-sm text-gray-600">John is a senior web developer with over 10 years of experience in building modern web applications. He specializes in frontend architecture and performance optimization, and is passionate about sharing his knowledge with the development community.</p>
                        <div class="mt-3 flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-github"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Comments (24)</h3>

                <!-- Comment Form -->
                <div class="mb-8 bg-white rounded-xl p-6 shadow-sm">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Leave a comment</h4>
                    <form>
                        <div class="mb-4">
                            <textarea rows="4" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Share your thoughts..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Post Comment
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Comments List -->
                <div class="space-y-6">
                    <!-- Comment 1 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-start space-x-3">
                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Commenter">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-gray-900">Emily Zhang</h4>
                                    <span class="text-xs text-gray-500">2 hours ago</span>
                                </div>
                                <p class="text-sm text-gray-700">Great article! I'm particularly excited about the advancements in WebAssembly. Have you experimented with using Rust with WASM for web applications?</p>
                                <div class="mt-3 flex items-center space-x-4">
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-thumbs-up mr-1"></i>
                                        <span>8 likes</span>
                                    </button>
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-comment mr-1"></i>
                                        <span>Reply</span>
                                    </button>
                                </div>

                                <!-- Nested Reply Form (Hidden by default, shown when reply button is clicked) -->
                                <div class="mt-4 hidden">
                                    <textarea rows="2" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Write a reply..."></textarea>
                                    <div class="mt-2 flex justify-end">
                                        <button type="button" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Reply
                                        </button>
                                    </div>
                                </div>

                                <!-- Nested Replies -->
                                <div class="mt-4 pl-6 border-l-2 border-gray-100">
                                    <!-- Reply 1 -->
                                    <div class="mt-4">
                                        <div class="flex items-start space-x-3">
                                            <img class="h-8 w-8 rounded-full" src="/api/placeholder/32/32" alt="Author">
                                            <div>
                                                <div class="flex items-center justify-between mb-1">
                                                    <h4 class="text-xs font-medium text-gray-900">John Doe <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full ml-2">Author</span></h4>
                                                    <span class="text-xs text-gray-500">1 hour ago</span>
                                                </div>
                                                <p class="text-xs text-gray-700">Yes, I've been using Rust with WASM for a few projects! The performance benefits are substantial, especially for computation-heavy applications. I'll be writing a follow-up article specifically about this topic next week.</p>
                                                <div class="mt-2 flex items-center space-x-4">
                                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                                        <i class="far fa-thumbs-up mr-1"></i>
                                                        <span>4 likes</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-start space-x-3">
                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Commenter">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-gray-900">Alex Johnson</h4>
                                    <span class="text-xs text-gray-500">5 hours ago</span>
                                </div>
                                <p class="text-sm text-gray-700">While I agree that AI-assisted development tools are powerful, I'm concerned about developers becoming too reliant on them and losing fundamental skills. What are your thoughts on balancing AI assistance with maintaining core development knowledge?</p>
                                <div class="mt-3 flex items-center space-x-4">
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-thumbs-up mr-1"></i>
                                        <span>12 likes</span>
                                    </button>
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-comment mr-1"></i>
                                        <span>Reply</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 3 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-start space-x-3">
                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Commenter">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-gray-900">Sarah Miller</h4>
                                    <span class="text-xs text-gray-500">Yesterday</span>
                                </div>
                                <p class="text-sm text-gray-700">The section on edge computing is spot on. We've been deploying our application to edge locations and have seen significant performance improvements, especially for our users in Southeast Asia and South America. It's definitely worth the investment.</p>
                                <div class="mt-3 flex items-center space-x-4">
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-thumbs-up mr-1"></i>
                                        <span>6 likes</span>
                                    </button>
                                    <button class="flex items-center text-xs text-gray-500 hover:text-indigo-600">
                                        <i class="far fa-comment mr-1"></i>
                                        <span>Reply</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Comments -->
                    <button class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Load more comments
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-8 md:mb-0">
                    <a href="#" class="flex items-center text-indigo-600 font-bold text-xl">
                        <i class="fas fa-feather-alt mr-2"></i>
                        ModernBlog
                    </a>
                    <p class="mt-2 text-sm text-gray-500">Sharing thoughts and ideas with the world.</p>
                </div>
                <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Navigate</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Home</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Categories</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Popular Posts</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Recent Posts</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Company</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">About Us</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Contact</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Careers</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Press</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase">Legal</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Privacy Policy</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Terms of Service</a></li>
                            <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">&copy; 2025 ModernBlog. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
