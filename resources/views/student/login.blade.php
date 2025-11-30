@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <h2 class="mb-4 text-center fw-bold text-primary">Login Student</h2>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-dark"><i class="fas fa-user text-primary"></i> Email, Username or Phone</label>
                                <input type="text" name="auth" class="form-control" value="{{ old('auth') }}">
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label fw-semibold text-dark"><i class="fas fa-lock text-primary"></i> Password</label>
                                <input type="password" name="password" class="form-control pe-5" id="password" placeholder="••••••••">
                                <i class="fa fa-eye position-absolute bottom-0 end-0 translate-middle-y me-3 toggle-password"
                                data-target="#password" style="cursor: pointer;"></i>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember" class="fw-semibold text-dark" style="cursor: pointer;">Remember Me</label>
                                </div>
                                <a href="" class="text-decoration-none fw-semibold">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <p>Or login with</p>
                            <a href="" class="btn bg-white text-dark border w-100 d-flex align-items-center justify-content-center gap-3 mb-3 rounded-3 shadow-sm"
                                style="border: 1px solid #dadce0;">
                                <img src="https://www.google.com/favicon.ico" width="20" height="20" alt="Google">
                                <span class="fw-semibold">Continue with Google</span>
                            </a>

                            <a href="" class="btn btn-dark w-100 mb-2 d-flex align-items-center justify-content-center gap-3 rounded-3 shadow-sm">
                                <i class="fab fa-github fa-lg"></i>
                                Continue with GitHub
                            </a>
                        </div>

                        <p class="text-center mt-3">
                            Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

