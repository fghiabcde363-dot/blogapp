@extends('layouts.app')
@section('title', 'Blog Posts')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 text-center">
            <div class="card shadow-sm p-4" style="background-color: #ffffff;">
                <h2 class="mb-4" style="color: #2c3e50;">Blog Posts</h2>
                <p class="text-muted">You need to login or register to view and create blog posts.</p>
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>
        </div>
    </div>
@endsection