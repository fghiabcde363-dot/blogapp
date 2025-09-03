@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <section class="mb-12">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text">
            Our Latest Blog Posts
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300">
                    <img src="https://via.placeholder.com/400x200" alt="Blog Image" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Blog Post Title {{ $i }}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div class="flex items-center justify-between">
                            <a href="/blog/{{ $i }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">Read More</a>
                            <span class="text-sm text-gray-500 dark:text-gray-400">August {{ $i }}, 2025</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection