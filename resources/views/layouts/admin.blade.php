<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <title>Admin @yield('title') Modern Blog</title>
</head>

<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    @include('admin.components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Header -->
        @include('admin.components.header')

        <!-- Mobile Sidebar -->
        @include('admin.components.sidebar-mobile')

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 md:p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('admin.components.footer')
    </div>
</body>

<script>
    // Mobile menu functionality
    const menuBtn = document.getElementById('menuBtn');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const mobileSidebar = document.getElementById('mobileSidebar');

    menuBtn.addEventListener('click', () => {
        mobileSidebar.classList.remove('-translate-x-full');
    });

    closeMobileMenu.addEventListener('click', () => {
        mobileSidebar.classList.add('-translate-x-full');
    });
</script>

</html>
