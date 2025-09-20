@extends('layouts.app')
@section('title', 'Login / Register')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm p-4" style="background-color: #ffffff;">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="authTabsContent">
                <!-- Login Form -->
                <div class="tab-pane fade show active" id="login" role="tabpanel">
                    <h2 class="text-center mb-4" style="color: #2c3e50;">Login</h2>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate autocomplete="off">
                        @csrf

                        <!-- Dummy input biar auto-fill nggak nempel -->
                        <input type="text" name="fake_username" id="fake_username" class="d-none" autocomplete="username">
                        <input type="password" name="fake_password" id="fake_password" class="d-none" autocomplete="new-password">

                        <div class="mb-3">
                            <label for="login_email" class="form-label">Email</label>
                            <input type="email" name="email" id="login_email" class="form-control" required autocomplete="off">
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="login_password" class="form-label">Password</label>
                            <input type="password" name="password" id="login_password" class="form-control" required autocomplete="new-password">
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <!-- Ganti Remember me jadi ini -->
                    <p class="text-center mt-3">
                        Don’t have an account?
                        <a href="#register" class="text-decoration-none" data-bs-toggle="tab">Register</a>
                    </p>
                </div>

                <!-- Register Form -->
                <div class="tab-pane fade" id="register" role="tabpanel">
                    <h2 class="text-center mb-4" style="color: #2c3e50;">Register</h2>
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required autocomplete="off">
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="register_email" class="form-label">Email</label>
                            <input type="email" name="email" id="register_email" class="form-control" required autocomplete="off">
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="register_password" class="form-label">Password</label>
                            <input type="password" name="password" id="register_password" class="form-control" required autocomplete="new-password">
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                            <div class="invalid-feedback">Please confirm your password.</div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>
                </div>
            </div>
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