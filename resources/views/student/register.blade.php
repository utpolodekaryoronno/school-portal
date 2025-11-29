@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <h2 class="mb-4 text-center fw-bold text-primary"><i class="fas fa-user-plus me-3"></i> Register Student</h2>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf

                            <!-- Row 1: Name + Username -->
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-user text-primary"></i> Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" placeholder="John Doe">

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-at text-primary"></i> Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ old('username') }}" placeholder="johndoe123">

                                </div>
                            </div>

                            <!-- Row 2: Email + Phone -->
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-envelope text-primary"></i> Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="john@example.com">

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-phone text-primary"></i> Phone Number</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone') }}" placeholder="+1234567890">
                                </div>
                            </div>

                            <!-- Row 3: Password + Confirm Password -->
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-lock text-primary"></i> Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control pe-5"
                                            id="password" placeholder="••••••••">
                                        <i class="fa fa-eye position-absolute top-50 end-0 translate-middle-y me-3 toggle-password"
                                        data-target="#password" style="cursor: pointer; z-index: 10;"></i>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label fw-semibold"><i class="fas fa-lock text-primary"></i> Confirm Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password_confirmation"
                                            class="form-control pe-5" id="confirmpassword"
                                            placeholder="••••••••">
                                        <i class="fa fa-eye position-absolute top-50 end-0 translate-middle-y me-3 toggle-password"
                                        data-target="#confirmpassword" style="cursor: pointer; z-index: 10;"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg fw-semibold">
                                    Register Now
                                </button>
                            </div>
                        </form>

                        <p class="text-center mt-4 text-muted">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login here</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


