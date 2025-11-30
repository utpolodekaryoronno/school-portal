@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <div class="min-vh-100 bg-gray-50 d-flex align-items-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="bg-danger text-white rounded-3 p-3 d-inline-flex shadow">
                            <i class="fas fa-crown fa-2x"></i>
                        </div>
                        <h4 class="mt-2 fw-bold text-danger">Admin Login</h4>
                        <p class="text-muted">Super Administrator Access</p>
                    </div>

                    <!-- Login Card -->
                    <div class="card border-0 shadow-lg rounded-4">
                        <div class="card-body p-5">

                            <form action="{{ route('login.store.admin') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-user text-primary me-2"></i> Email, Username or Phone
                                    </label>
                                    <input type="text" name="auth" class="form-control form-control-lg rounded-3"
                                        value="{{ old('auth') }}" placeholder="Enter email or username" >
                                </div>

                                <div class="mb-4 position-relative">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-lock text-primary me-2"></i> Password
                                    </label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg rounded-3 pe-5"
                                        placeholder="Enter your password">
                                    <i class="fa fa-eye position-absolute end-0 translate-middle-y me-3 toggle-password"
                                    data-target="#password" style="cursor:pointer; bottom:7px; z-index:10;"></i>

                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label fw-medium">Remember Me</label>
                                    </div>
                                    <a href="#" class="text-primary small fw-semibold text-decoration-none">Forgot Password?</a>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 fw-bold shadow-sm">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login as Admin
                                </button>
                            </form>

                            <div class="text-center my-4">
                                <p class="text-muted small">Or continue with</p>
                                <div class="d-flex gap-3 justify-content-center">
                                    <a href="#" class="btn btn-outline-dark rounded-3 px-4"><i class="fab fa-google"></i></a>
                                    <a href="#" class="btn btn-outline-dark rounded-3 px-4"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5 text-muted small">
                        © {{ date('Y') }} {{ config('app.name') }} • All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
