@extends('layouts.app')

@section('title', 'Profile Edit')

@section('content')
    <div class="d-flex min-vh-100 bg-gray-50">

        <!-- Modern Sidebar -->
        @include("student.sidebar")

        <!-- Main Content Area -->
        <div class="flex-grow-1 overflow-auto">
            <!-- Top Bar -->
            <header class="bg-white border-bottom shadow-sm">
                <div class="d-flex justify-content-between align-items-center p-4 px-5">
                    <div>
                        <h2 class="fw-bold mb-1">Welcome back, {{ $student->name }}</h2>
                        <p class="text-muted mb-0">Track your academic progress and stay updated</p>
                    </div>

                    <div class="d-flex align-items-center gap-4">
                        <button class="btn btn-outline-secondary position-relative">
                            <i class="fas fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                3
                            </span>
                        </button>

                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="{{ $student->photo ? asset('media/student/'.$student->photo) : asset('assets/image/default-profile.png') }}"
                                    class="rounded-circle border border-white shadow" width="48" height="48">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                                <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile') }}"><i class="fas fa-user me-3"></i>Profile</a></li>
                                <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.edit') }}"><i class="fas fa-cog me-3"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger rounded-2 py-2">
                                            <i class="fas fa-sign-out-alt me-3"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-3">
                <!-- Profile Edit Section -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="card shadow-lg border-0">
                            <div class="d-flex justify-content-between card-header align-items-center pt-4  px-5 pb-4 w-100">
                                <a href="{{ route('profile') }}" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Back to Profile
                                </a>
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body p-5">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-user me-2 text-primary"></i> Full Name
                                        </label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $student->name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-phone me-2 text-primary"></i> Phone Number
                                        </label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $student->phone) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-camera me-2 text-primary"></i>  Photo
                                        </label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>

                                    @if($student->photo)
                                        <div class="mb-3">
                                            <img src="{{ asset('media/student/'.$student->photo)}}" width="100" height="100"
                                                class="rounded-circle mb-3" alt="Profile Photo">
                                        </div>
                                    @else
                                        <img src="{{ asset('assets/image/default-profile.png') }}" alt="Default" width="100" class="rounded-circle mb-3">
                                    @endif

                                    <button class="btn btn-primary mt-3"><i class="fas fa-save me-2"></i> Update Profile</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

