@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <h2 class="mb-4 text-center fw-bold text-primary">
                    <i class="fas fa-user-shield me-3"></i> Login Staff
                </h2>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('login.store.staff') }}" method="POST">
                            @csrf

                            <!-- Login Field (Email, Username or Phone) -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-user text-primary"></i> Email, Username or Phone
                                </label>
                                <input type="text" name="email" class="form-control"
                                       value="{{ old('email') }}" placeholder="Enter email, username or phone"
                                       >
                            </div>

                            <!-- Password Field with Toggle -->
                            <div class="mb-3 position-relative">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-primary"></i> Password
                                </label>
                                <input type="password" name="password" class="form-control pe-5"
                                       id="password" placeholder="••••••••">
                                <i class="fa fa-eye position-absolute bottom-0 end-0 translate-middle-y me-3 toggle-password"
                                   data-target="#password" style="cursor: pointer; z-index: 10;"></i>
                            </div>

                            <!-- Remember Me + Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <input type="checkbox" name="remember" id="remember-staff" class="form-check-input">
                                    <label for="remember-staff" class="form-check-label fw-semibold text-dark" style="cursor: pointer;">
                                        Remember Me
                                    </label>
                                </div>
                                <a href=""
                                   class="text-decoration-none fw-semibold text-primary">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                <i class="fas fa-sign-in-alt me-2"></i> Login as Staff
                            </button>
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

                        <!-- Register Link -->
                        <p class="text-center mt-4 text-muted">
                            Don't have a staff account?
                            <a href="{{ route('register.staff') }}"
                               class="text-decoration-none fw-semibold text-primary">
                                Register here
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
