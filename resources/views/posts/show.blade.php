@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-3xl mx-auto mt-10 px-4">
    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

    <div class="text-sm text-gray-500 mb-4">
        Kategori: {{ $post->category->name ?? '-' }} |
        Penulis: {{ $post->author->name ?? 'Anonim' }} |
        {{ $post->created_at?->format('d M Y') }}
    </div>

    <div class="prose max-w-none mb-6">
        {!! nl2br(e($post->content)) !!}
    </div>

  @guest
        <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg text-center">
            <p class="mb-4 text-yellow-700">Ingin menulis artikel juga?</p>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 ml-2">Register</a>
        </div>
    @endguest

    @auth
        @if(auth()->id() === $post->user_id)
            <div class="mt-8 flex gap-3">
                <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                </form>
            </div>
        @endif
    @endauth

    <div class="mt-8">
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar</a>
    </div>
</div>
@endsection
