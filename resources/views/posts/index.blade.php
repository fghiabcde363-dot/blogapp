@extends('layouts.app')

@section('title', 'Daftar Postingan')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Daftar Postingan</h1>

    @forelse ($posts as $post)
        <div class="p-4 mb-4 bg-white shadow rounded">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p class="text-gray-700 mt-2">
                {{ Str::limit($post->content, 150) }}
            </p>
            <div class="text-sm text-gray-500 mt-2">
                Kategori: {{ $post->category->name ?? '-' }} |
                Penulis: {{ $post->author->name ?? 'Anonim' }} |
                {{ $post->created_at->format('d M Y') }}
            </div>
        </div>
    @empty
        <p class="text-gray-600">Belum ada postingan.</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
