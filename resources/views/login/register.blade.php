@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm p-4" style="background-color: #ffffff;">
                <h2 class="text-center mb-4" style="color: #2c3e50;">Register</h2>
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                    <p class="text-center mt-2">
                        Already have an account? <a href="{{ route('login') }}" style="color: #3498db;">Login here</a>
                    </p>
                </form>
            </div>
        </div>
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