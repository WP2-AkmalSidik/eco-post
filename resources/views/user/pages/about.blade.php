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
    @include('user.partials.about.mission')

    <!-- Values Section -->
    @include('user.partials.about.values')


    <!-- Testimonials Section -->
    @include('user.partials.about.testimonial')

    <!-- FAQ Section -->
    @include('user.partials.about.faq')

    <!-- CTA Section -->
    @include('user.partials.about.cta')

    <!-- Stats Section -->
    @include('user.partials.about.stats')
@endsection
