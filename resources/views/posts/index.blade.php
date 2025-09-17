@extends('layouts.app')

@section('title', 'Daftar Postingan')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Postingan</h1>

        {{-- Tombol Create --}}
        @auth
            <a href="{{ route('posts.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                + Buat Postingan
            </a>
        @endauth
    </div>

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

            <div class="flex gap-3 mt-3">
                {{-- Lihat detail --}}
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Lihat</a>

                {{-- Edit/Hapus hanya untuk pemilik --}}
                @auth
                    @if ($post->user_id === Auth::id())
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Edit</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin mau hapus?')"
                                class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    @endif
                @endauth
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
