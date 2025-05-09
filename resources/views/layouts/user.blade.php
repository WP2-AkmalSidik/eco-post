<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>ModernBlog - @yield('title')</title>
    <style>
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false, profileMenuOpen: false }">
    <div
        class="menu-overlay fixed inset-0 bg-opacity-70 z-20"
        :class="{'active': mobileMenuOpen}"
        @click="mobileMenuOpen = false">
    </div>
    @include('user.components.navbar')
    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        @yield('content')
    </main>

    <!-- Footer -->
    @include('user.components.footer')
</body>
</html>
