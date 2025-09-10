@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
    <h1 class="text-center mb-4" style="color: #2c3e50;">Edit Post</h1>
    <div class="card shadow-sm p-4" style="background-color: #ffffff;">
        <form method="POST" action="{{ route('posts.update', $post['id']) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post['title'] }}" required>
                <div class="invalid-feedback">Please enter a title.</div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="4" required>{{ $post['content'] }}</textarea>
                <div class="invalid-feedback">Please enter content.</div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script>
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection