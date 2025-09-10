@extends('layouts.app')
@section('title', $post['title'])
@section('content')
    <h1 class="text-center mb-4" style="color: #2c3e50;">{{ $post['title'] }}</h1>
    <div class="card shadow-sm p-4" style="background-color: #ffffff;">
        <div class="card-body">
            <p class="text-muted mb-3">Published on: Sample Date</p>
            <p>{{ $post['content'] }}</p>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>
@endsection