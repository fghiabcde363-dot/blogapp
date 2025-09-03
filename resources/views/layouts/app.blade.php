<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Blog')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600 dark:text-blue-400">Web Blog</a>
            <div class="flex space-x-6 items-center">
                <a href="/" class="hover:text-blue-600 dark:hover:text-blue-400 transition">Home</a>
                <a href="/blog" class="hover:text-blue-600 dark:hover:text-blue-400 transition">Blog</a>
                <a href:"/about" class="hover:text-blue-600 dark:hover:text-blue-400 transition">About</a>
                <!-- Tombol Dark Mode -->
                <button id="theme-toggle" class="focus:outline-none">
                    <i class="fas fa-moon text-lg"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-900 text-white text-center py-6 mt-12">
        <div class="container mx-auto px-4">
            <p class="text-sm">&copy; {{ date('Y') }} Modern Blog. Built with <i class="fas fa-heart text-red-500"></i>.</p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-github"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script untuk Dark Mode Toggle -->
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        theme_toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            themeToggle.innerHTML = isDark ? '<i class="fas fa-sun text-lg"></i>' : '<i class="fas fa-moon text-lg"></i>';
        });
    </script>
</body>
</html>