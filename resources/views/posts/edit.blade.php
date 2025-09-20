@extends('layouts.app')

@section('title', 'Edit Postingan')

@section('content')
<div class="max-w-2xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Postingan</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded p-2" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Konten</label>
            <textarea name="content" rows="6" class="w-full border rounded p-2" required>{{ old('content', $post->content) }}</textarea>
            @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @selected($post->category_id == $category->id)>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="draft" @selected($post->status === 'draft')>Draft</option>
                <option value="published" @selected($post->status === 'published')>Publish</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection