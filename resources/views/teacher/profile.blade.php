@extends('layouts.app')

@section('title', 'Profile')


@section('content')
    <div class="d-flex min-vh-100 bg-gray-50">

        @include("teacher.sidebar")

        <!-- Main Content -->
        <div class="flex-grow-1 overflow-auto">
            <header class="bg-white border-bottom shadow-sm">
                <div class="d-flex justify-content-between align-items-center p-4 px-5">
                    <div>
                        <h2 class="fw-bold mb-1">Welcome back, {{ Auth::guard('teacher')->user()->name}}</h2>
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
                                <img src="{{ Auth::guard('teacher')->user()->photo ? asset('media/teacher/'. Auth::guard('teacher')->user()->photo) : asset('assets/image/default-profile.png') }}"
                                    class="rounded-circle border border-white shadow" width="48" height="48">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                                <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.teacher') }}"><i class="fas fa-user me-3"></i>Profile</a></li>
                                <li><a class="dropdown-item rounded-2 py-2" href="{{ route('edit.teacher') }}"><i class="fas fa-cog me-3"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout.teacher') }}" method="POST">
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

            <main class="p-3">

            <div class="row justify-content-center">
                <div class="col-md-10">

                    <!-- Back Button -->
                    <div class="mb-4">
                        <a href="{{ route('dashboard.teacher') }}"
                        class="btn text-dark fw-semibold">
                            <i class="fas fa-arrow-left me-2"></i>
                            Back to Dashboard
                        </a>
                    </div>

                    <!-- Profile Card -->
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden py-4">
                        <!-- Cover & Avatar -->
                        <div class="position-relative bg-gradient" style="height: 180px; background: linear-gradient(135deg, #1e40af, #3b82f6);">
                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
                                <div class="text-center">
                                    @if (Auth::guard('teacher')->user()->photo)
                                        <img src="{{ asset('media/teacher/' . Auth::guard('teacher')->user()->photo) }}"
                                            class="rounded-circle border border-5 border-white shadow-lg"
                                            width="150" height="150" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/image/default-profile.png') }}"
                                            class="rounded-circle border border-5 border-white shadow-lg"
                                            width="150" height="150" style="object-fit: cover;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="card-body px-4 px-md-5 text-center text-md-start">
                            <div class="text-center">
                                <h2 class="fw-bold text-dark mb-1">{{ Auth::guard('teacher')->user()->name }}</h2>
                                <p class="text-muted fs-5 mb-2">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    {{ Auth::guard('teacher')->user()->email }}
                                </p>
                                <p class="mb-3">
                                    <span class="badge bg-primary text-white fs-6 px-4 py-2 rounded-pill text-capitalize">
                                        <i class="fas fa-chalkboard-teacher me-2"></i>
                                        {{ ucfirst(Auth::guard('teacher')->user()->role ?? 'teacher') }}
                                    </span>
                                </p>
                            </div>

                            <hr class="my-5">

                            <!-- Profile Details Grid -->
                            <div class="row g-4 text-start">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                            <i class="fas fa-id-badge fa-lg"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Teacher ID</small>
                                            <strong>#TCH{{ str_pad(Auth::guard('teacher')->user()->id, 4, '0', STR_PAD_LEFT) }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                        <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                            <i class="fas fa-phone fa-lg"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Phone</small>
                                            <strong>{{ Auth::guard('teacher')->user()->phone ?? 'Not provided' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                            <i class="fas fa-user-tag fa-lg"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Username</small>
                                            <strong>{{ Auth::guard('teacher')->user()->username }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                            <i class="fas fa-calendar-alt fa-lg"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Joined Date</small>
                                            <strong>{{ Auth::guard('teacher')->user()->created_at->format('d M, Y') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">

                            <!-- Action Buttons -->
                            <div class="d-flex flex-wrap gap-3 justify-content-center">
                                <a href="{{ route('edit.teacher') }}" class="btn btn-success btn-lg px-5 rounded-3 shadow-sm hover-lift">
                                    <i class="fas fa-user-edit me-2"></i> Edit Profile
                                </a>

                                <a href="" class="btn btn-primary btn-lg px-5 rounded-3 shadow-sm hover-lift">
                                    <i class="fas fa-key me-2"></i> Change Password
                                </a>

                                <form action="{{ route('logout.teacher') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-lg px-5 rounded-3 shadow-sm hover-lift">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>

                                <form action="{{ route('delete.teacher') }}" method="POST"
                                    class="delete-form" data-message="Are you sure you want to permanently delete this teacher account? This cannot be undone.">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg px-5 rounded-3 shadow-sm hover-lift">
                                        <i class="fas fa-trash-alt me-2"></i> Delete Account
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </main>
        </div>
    </div>
@endsection
