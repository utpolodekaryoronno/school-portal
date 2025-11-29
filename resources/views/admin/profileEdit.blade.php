@extends('layouts.app')

@section('title', 'Profile Edit')

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
                <div class="row justify-content-center mt-3">
                    <div class="col-md-10">

                        <!-- Back Button + Title -->
                        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                            <a href="{{ route('profile.teacher') }}"
                            class="text-bold text-dark fw-semibold">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </a>
                            <h3 class=" text-mute mb-0">Edit Profile</h3>
                        </div>

                        <!-- Edit Profile Card -->
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <div class="card-body p-5">
                                <form action="{{ route('update.teacher') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Photo Field (Correctly inside form) -->
                                    <div class="text-center mb-5">
                                        <div class="position-relative d-inline-block">
                                            <img src="{{ $teacher->photo
                                                ? asset('media/teacher/'.$teacher->photo)
                                                : asset('assets/image/default-profile.png') }}"
                                                id="profilePreview"
                                                class="rounded-circle border border-5 border-white shadow-lg"
                                                width="140" height="140" style="object-fit: cover;">

                                            <label for="photo" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-3 shadow cursor-pointer hover-lift d-flex align-items-center justify-content-center">
                                                <i class="fas fa-camera"></i>
                                                <input type="file" name="photo" id="photo" class="d-none" accept="image/*">
                                            </label>
                                        </div>
                                        <p class="text-muted small mt-3">Click the camera to change photo</p>
                                    </div>

                                    <!-- Name & Phone -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold"><i class="fas fa-user text-primary me-2"></i> Full Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg rounded-3"
                                            value="{{ old('name', $teacher->name) }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold"><i class="fas fa-phone text-primary me-2"></i> Phone</label>
                                        <input type="text" name="phone" class="form-control form-control-lg rounded-3"
                                            value="{{ old('phone', $teacher->phone) }}">
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-bold shadow-sm hover-lift">
                                            <i class="fas fa-save me-2"></i> Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>

        <!-- Optional: Live Preview of Selected Photo -->
    <script>
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    document.getElementById('profilePreview').src = ev.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection

