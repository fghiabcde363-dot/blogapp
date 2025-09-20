@extends('layouts.app')

@section('title', 'Daftar Postingan')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6 items-center space-x-2 bg-gray-100 p-1 rounded-xl">
        <h1 class="text-2xl font-bold">Daftar Postingan</h1>
        <div class="flex items-center space-x-2 bg-gray-100 p-1 rounded-xl">
            <a href="{{ route('posts.index', ['filter' => 'public']) }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition
              {{ ($filter ?? 'public') === 'public'
                  ? 'bg-white text-gray-800 shadow'
                  : 'text-gray-500 hover:text-gray-700 hover:bg-gray-200' }}">
                Publik
            </a>

            @auth
            <a href="{{ route('posts.index', ['filter' => 'mine']) }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition
              {{ ($filter ?? '') === 'mine'
                  ? 'bg-white text-gray-800 shadow'
                  : 'text-gray-500 hover:text-gray-700 hover:bg-gray-200' }}">
                Postingan Saya
            </a>
            @endauth
        </div>

        {{-- Tombol Create --}}
        @auth
        <a href="{{ route('posts.create') }}"
            class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition">
            + Buat Postingan
        </a>


        @endauth

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($posts as $post)
        <div
            @class([ 'p-4 bg-white shadow rounded' , 'md:col-span-2'=> strlen(strip_tags($post->content)) > 100
            ])
            >
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
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Lihat</a>

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
    </div>



    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection