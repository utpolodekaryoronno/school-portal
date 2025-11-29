@extends('layouts.app')

@section('title', 'Profile')

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
                <!-- Profile section -->
                <div class="profile-container">
                    <div class="row">
                        <div class="col-12 col-md-12">

                            <div class="mb-3 text-center text-md-start">
                                <a href="{{ route('dashboard') }}"
                                class="text-bold text-dark">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Back to Dashboard
                                </a>
                            </div>

                            <div class="profile-card">

                                <!-- Header with Avatar -->
                                <div class="profile-header text-center text-md-start d-flex flex-column flex-md-row align-items-center gap-4">
                                    <div>
                                        @if ($student->photo)
                                            <img src="{{ asset('media/student/' . $student->photo) }}"
                                                alt="{{ $student->name }}" class="profile-avatar">
                                        @else
                                            <img src="{{ asset('assets/image/default-profile.png') }}"
                                                alt="Default Profile" class="profile-avatar">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 text-center text-md-start">
                                        <h1 class="profile-name mb-0">{{ $student->name }}</h1>
                                        <p class="profile-role mt-2">
                                            <i class="fas fa-user-graduate me-2"></i>
                                            {{($student->role ?? 'Student') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Body with Info -->
                                <div class="profile-body">

                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-envelope text-primary me-2"></i>Email Address
                                            </div>
                                            <div class="info-value">{{ $student->email }}</div>
                                        </div>


                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-user-tag text-primary me-2"></i>Username
                                            </div>
                                            <div class="info-value">{{ $student->username }}</div>
                                        </div>


                                        @if($student->phone)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-phone text-primary me-2"></i>Phone Number
                                            </div>
                                            <div class="info-value">{{ $student->phone }}</div>
                                        </div>
                                        @endif

                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-calendar-alt text-primary me-2"></i>Member Since
                                            </div>
                                            <div class="info-value">
                                                {{ $student->created_at->format('F j, Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="action-buttons">
                                        <a href="{{ route('profile.edit') }}" class="btn btn-custom btn-edit">
                                            <i class="fas fa-user-edit me-2"></i> Edit Profile
                                        </a>

                                        <a href="" class="btn btn-primary btn-lg px-5 btn-custom">
                                            <i class="fas fa-key me-2"></i> Change Password
                                        </a>

                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-custom btn-logout">
                                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                                            </button>
                                        </form>

                                        <form action="{{ route('profile.delete') }}" method="POST"
                                            class="delete-form"  data-message="Are you sure you want to delete this Account?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-custom btn-delete">
                                                <i class="fas fa-trash-alt me-2"></i> Delete Account
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
