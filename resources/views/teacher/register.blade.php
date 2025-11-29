@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-vh-100 bg-gray-50 d-flex align-items-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">

                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="bg-primary text-white rounded-4 p-3 d-inline-flex shadow-lg">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h2 class="mt-4 fw-bold text-dark">Register as Teacher</h2>

                </div>

                <!-- Registration Card -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-5">

                        <form action="{{ route('register.store.teacher') }}" method="POST">
                            @csrf

                            <!-- Full Name -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-user text-primary me-2"></i> Full Name
                                </label>
                                <input type="text" name="name" class="form-control rounded-3 "
                                       value="{{ old('name') }}" placeholder="Enter your full name"  >

                            </div>

                            <!-- Username -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-at text-primary me-2"></i> Username
                                </label>
                                <input type="text" name="username" class="form-control rounded-3 "
                                       value="{{ old('username') }}" placeholder="Choose a unique username" >

                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-envelope text-primary me-2"></i> Email Address
                                </label>
                                <input type="email" name="email" class="form-control rounded-3 "
                                       value="{{ old('email') }}" placeholder="teacher@example.com" >

                            </div>

                            <!-- Phone -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-phone text-primary me-2"></i> Phone Number
                                </label>
                                <input type="text" name="phone" class="form-control rounded-3 "
                                       value="{{ old('phone') }}" placeholder="+880 1XXX-XXXXXX" >

                            </div>

                            <!-- Password -->
                            <div class="mb-4 position-relative">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-primary me-2"></i> Password
                                </label>
                                <input type="password" name="password" id="password"
                                       class="form-control rounded-3 pe-5"
                                       placeholder="Create a strong password">
                                <i class="fa fa-eye toggle-password text-muted position-absolute bottom-0 end-0 translate-middle-y me-4"
                                   data-target="#password" style="cursor:pointer; z-index:10; font-size:1.1rem;"></i>

                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4 position-relative">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock text-primary me-2"></i> Confirm Password
                                </label>
                                <input type="password" name="password_confirmation" id="confirmpassword"
                                       class="form-control rounded-3 pe-5"
                                       placeholder="Re-type your password">
                                <i class="fa fa-eye toggle-password text-muted position-absolute bottom-0 end-0 translate-middle-y me-4"
                                   data-target="#confirmpassword" style="cursor:pointer; z-index:10; font-size:1.1rem;"></i>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success btn-lg w-100 rounded-3 fw-bold shadow-sm">
                                <i class="fas fa-user-plus me-2"></i>
                                Create Teacher Account
                            </button>
                        </form>

                        <!-- Social Register Option -->
                       <div class="text-center my-3">
                            <p class="text-muted small mb-3">Or continue with</p>
                            <div class="d-flex gap-3 justify-content-center flex-wrap">

                                <!-- Google Button -->
                                <a href=""
                                class="btn border rounded-4 px-5 py-2 d-flex align-items-center gap-3 text-dark">
                                    <img src="https://www.google.com/favicon.ico" width="20" height="20" alt="Google">
                                    <span>Google</span>
                                </a>

                                <!-- GitHub Button -->
                                <a href=""
                                class="btn border rounded-4 px-5 py-2 d-flex align-items-center gap-3 text-dark">
                                    <i class="fab fa-github fa-lg"></i>
                                    <span>GitHub</span>
                                </a>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <p class="text-center mt-3 text-muted">
                            Already have an account?
                            <a href="{{ route('login.teacher') }}" class="fw-bold text-primary text-decoration-none">
                                Login here
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-5 text-muted small">
                    © {{ date('Y') }} {{ config('app.name', 'School Portal') }} • Secure Registration
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
