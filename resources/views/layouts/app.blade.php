<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blogify') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        {{-- Navigation --}}
        <nav class="bg-gray-200 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <!-- Branding -->
                <a href="{{ url('/') }}" class="text-xl font-bold tracking-wide text-gray-800">
                    Blogify
                </a>

                <!-- Search -->
<!-- Search -->
<form action="{{ route('posts.index') }}" method="GET" class="flex-1 mx-8 hidden md:flex justify-center">
    <div class="relative w-full max-w-xl">
        <!-- Input -->
        <input type="text" name="q" placeholder="Cari artikel..."
               class="w-full rounded-full border border-gray-300 pl-4 pr-10 py-2 text-base focus:ring focus:ring-gray-400 focus:outline-none shadow-sm">

        <!-- Icon di dalam input -->
        <button type="submit" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
        </button>
    </div>
</form>


                <!-- Right Menu -->
                <!-- Right Menu -->
<div class="flex items-center space-x-4 text-gray-700">
    @auth
        <!-- Dropdown Profile -->
        <div x-data="{ open: false }" class="relative">
            <!-- Tombol Avatar -->
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
<div class="rounded-full w-30 bg-gray flex items-center justify-center text-black font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                <p class="px-4 py-2 text-sm text-gray-700 border-b">
                    {{ Auth::user()->name }}
                </p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="px-3 py-1 bg-gray-700 text-black rounded hover:bg-gray-800">
            Login
        </a>
    @endauth
</div>

            </div>
        </nav>

        {{-- Page Header --}}
        @isset($header)
            <header class="bg-gradient-to-r from-gray-100 to-gray-200 border-b">
                <div class="max-w-7xl mx-auto px-4 py-6">
                    <h1 class="text-2xl font-semibold text-gray-700">
                        {{ $header }}
                    </h1>
                    <p class="text-gray-500 text-sm">Kelola artikel, kategori, dan akunmu dengan mudah ✨</p>
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-1 max-w-7xl mx-auto w-full px-4 py-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-gray-200 text-gray-700 mt-8">
            <div class="max-w-7xl mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                <div class="text-center md:text-left">
                    <p>&copy; {{ date('Y') }} Blogify. All rights reserved.</p>
                    <p class="text-gray-500">Platform sederhana untuk menulis dan berbagi cerita.</p>
                                </div>
            </div>
        </footer>
    </div>
</body>
</html>
