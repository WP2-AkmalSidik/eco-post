@extends('layouts.user')
@section('title', 'About')

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">About ModernBlog</h1>
                <p class="mt-3 text-lg">Driven by sharing knowledge and creating a learner-innovator community.</p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Mission</h2>
                <p class="text-lg text-gray-600 mb-6">ModernBlog was founded with a simple yet powerful mission: to create a
                    platform where ideas can flourish and knowledge can be shared freely.</p>
                <p class="text-lg text-gray-600 mb-6">We believe that everyone has valuable insights to share, and by
                    bringing diverse perspectives together, we can learn from each other and grow as a community.</p>
                <div class="flex items-center space-x-4 text-indigo-600">
                    <div class="flex items-center">
                        <i class="fas fa-users mr-2 text-2xl"></i>
                        <span class="text-lg font-medium">15K+ Community Members</span>
                    </div>
                </div>
            </div>
            <div class="mt-10 lg:mt-0">
                <img class="rounded-xl shadow-lg object-cover w-full h-96" src="https://picsum.photos/600/480"
                    alt="Team collaboration">
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Our Core Values</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">The principles that guide everything we do at
                    ModernBlog.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-lightbulb text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600">We constantly strive to push boundaries and explore new ideas, technologies,
                        and approaches.</p>
                </div>

                <!-- Value 2 -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hands-helping text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Collaboration</h3>
                    <p class="text-gray-600">We believe in the power of working together, sharing knowledge, and supporting
                        each other.</p>
                </div>

                <!-- Value 3 -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-balance-scale text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Integrity</h3>
                    <p class="text-gray-600">We uphold the highest standards of honesty, transparency, and ethical behavior
                        in all our actions.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonials Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">What Our Community Says</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Don't just take our word for it - hear what our users
                have to say.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="text-indigo-600 mb-4">
                    <i class="fas fa-quote-left text-3xl"></i>
                </div>
                <p class="text-gray-600 mb-6 italic">"ModernBlog has completely transformed how I consume content online.
                    The quality of articles and the community discussions are unmatched."</p>
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/12.jpg"
                        alt="Testimonial author">
                    <div class="ml-3">
                        <h4 class="font-medium text-gray-900">Amanda Peterson</h4>
                        <p class="text-sm text-gray-500">Web Developer</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="text-indigo-600 mb-4">
                    <i class="fas fa-quote-left text-3xl"></i>
                </div>
                <p class="text-gray-600 mb-6 italic">"As a contributor, I've found ModernBlog to be an incredible platform
                    to share my ideas and connect with like-minded professionals."</p>
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg"
                        alt="Testimonial author">
                    <div class="ml-3">
                        <h4 class="font-medium text-gray-900">James Thompson</h4>
                        <p class="text-sm text-gray-500">UX Designer</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="text-indigo-600 mb-4">
                    <i class="fas fa-quote-left text-3xl"></i>
                </div>
                <p class="text-gray-600 mb-6 italic">"The content on ModernBlog has helped me stay current with industry
                    trends and has been instrumental in my professional growth."</p>
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/67.jpg"
                        alt="Testimonial author">
                    <div class="ml-3">
                        <h4 class="font-medium text-gray-900">Michelle Nguyen</h4>
                        <p class="text-sm text-gray-500">Product Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Everything you need to know about ModernBlog.</p>
            </div>
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-6">
                    <h3
                        class="flex items-center justify-between text-lg font-medium text-gray-900 cursor-pointer hover:text-indigo-600 transition-colors">
                        <span>How can I become a contributor?</span>
                        <i class="fas fa-chevron-down text-indigo-600"></i>
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>To become a contributor, you can apply through our "Write for Us" page. We review all
                            applications and typically respond within 5-7 business days.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="mb-6">
                    <h3
                        class="flex items-center justify-between text-lg font-medium text-gray-900 cursor-pointer hover:text-indigo-600 transition-colors">
                        <span>Is ModernBlog free to use?</span>
                        <i class="fas fa-chevron-down text-indigo-600"></i>
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>Yes, ModernBlog is completely free to read and participate in community discussions. We also
                            offer premium memberships with additional features.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="mb-6">
                    <h3
                        class="flex items-center justify-between text-lg font-medium text-gray-900 cursor-pointer hover:text-indigo-600 transition-colors">
                        <span>How often is new content published?</span>
                        <i class="fas fa-chevron-down text-indigo-600"></i>
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>We publish new articles daily across various categories. Premium content is typically released
                            weekly.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="mb-6">
                    <h3
                        class="flex items-center justify-between text-lg font-medium text-gray-900 cursor-pointer hover:text-indigo-600 transition-colors">
                        <span>Can I share articles on social media?</span>
                        <i class="fas fa-chevron-down text-indigo-600"></i>
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>Absolutely! We encourage sharing our content on social media. Each article has convenient share
                            buttons for various platforms.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div>
                    <h3
                        class="flex items-center justify-between text-lg font-medium text-gray-900 cursor-pointer hover:text-indigo-600 transition-colors">
                        <span>How can I contact the editorial team?</span>
                        <i class="fas fa-chevron-down text-indigo-600"></i>
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>You can reach our editorial team through the contact form on our website or by emailing
                            hello@modernblog.com.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
                    <p class="text-lg text-indigo-100 mb-6">Become a part of our growing network of writers, readers, and
                        innovators.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50 transition-colors">
                            Sign Up Now
                        </a>
                        <a href="#"
                            class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="mt-10 lg:mt-0 lg:flex lg:justify-end">
                    <div class="bg-white p-6 rounded-xl shadow-lg max-w-md">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Subscribe to Our Newsletter</h3>
                        <p class="text-gray-600 mb-4">Get the latest articles, resources, and news delivered to your inbox.
                        </p>
                        <form class="space-y-4">
                            <div>
                                <label for="email" class="sr-only">Email address</label>
                                <input id="email" type="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 px-4 py-3 text-lg" placeholder="Your email address">
                            </div>
                            <button type="submit"
                                class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-indigo-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">15K+</div>
                    <div class="text-indigo-200">Monthly Readers</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-indigo-200">Articles Published</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">50+</div>
                    <div class="text-indigo-200">Expert Contributors</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">10+</div>
                    <div class="text-indigo-200">Categories Covered</div>
                </div>
            </div>
        </div>
    </div>
@endsection
