@extends('layouts.app')

@section('title', 'Buat Postingan Baru')

@section('content')
<div class="max-w-2xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Tulis Postingan Baru</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Konten</label>
            <textarea name="content" rows="6" class="w-full border rounded p-2" required></textarea>
            @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection