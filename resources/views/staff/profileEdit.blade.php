@extends('layouts.app')

@section('title', 'Profile Edit')


@section('content')
<div class="d-flex min-vh-100 bg-gray-50">


        @if (!in_array(Auth::guard('staff')->user()->role, ['manager', 'librarian']))
            {{-- sidebar accountent --}}
            @include("staff.accountant.sidebarAccountant")

        @else
            {{-- staff sidebar --}}
            @include('staff.sidebar')
        @endif

    <!-- Main Content -->
    <div class="flex-grow-1 overflow-auto">
        <!-- Top Header -->
        <header class="bg-white border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center p-4 px-5">
                <div>
                    <h2 class="fw-bold mb-1">Welcome back, {{ Auth::guard('staff')->user()->name }}!</h2>
                    <p class="text-muted mb-0">Here's what's happening in your school today</p>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <!-- Notifications -->
                    <button class="btn btn-outline-secondary position-relative">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            5
                        </span>
                    </button>

                    <!-- User Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ Auth::guard('staff')->user()->photo
                                ? asset('media/staff/'.Auth::guard('staff')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle border shadow" width="50" height="50" style="object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                            <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.staff') }}"><i class="fas fa-user me-3"></i> My Profile</a></li>
                            <li><a class="dropdown-item rounded-2 py-2" href="#"><i class="fas fa-cog me-3"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.staff') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger rounded-2 py-2">
                                        <i class="fas fa-sign-out-alt me-3"></i> Logout
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

            <!-- Finance & Stats Cards Manager Only-->
            @if(Auth::guard('staff')->user()->role === "manager")
                <div class="row g-4 mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Income</p>
                                        <h5 class="fw-bold mb-0">৳1,200,000</h5>
                                        <small class="text-success">+12% from last month</small>
                                    </div>
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                        <i class="fas fa-arrow-trend-up fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Expenses</p>
                                        <h5 class="fw-bold mb-0">৳820,000</h5>
                                        <small class="text-warning">-5% from last month</small>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                        <i class="fas fa-arrow-trend-down fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Net Profit</p>
                                        <h5 class="fw-bold mb-0">৳380,000</h5>
                                        <small class="text-success">Healthy margin</small>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                        <i class="fas fa-sack-dollar fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Pending Payments</p>
                                        <h5 class="fw-bold mb-0">৳60,000</h5>
                                        <small class="text-danger">Requires attention</small>
                                    </div>
                                    <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3">
                                        <i class="fas fa-exclamation-triangle fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


             <!-- Profile Edit Section -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="card shadow-lg border-0">
                            <div class="d-flex justify-content-between card-header align-items-center pt-4  px-5 pb-4 w-100">
                                <a href="{{ route('profile.staff') }}" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Back to Profile
                                </a>
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body p-5">
                                <form action="{{ route('update.staff') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $staff->name) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', $staff->phone) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            @if($staff->photo)
                                <div class="mb-3">
                                    <img src="{{ asset('media/staff/'.$staff->photo)}}" width="100" height="100"
                                        class="rounded-circle mb-3" alt="Profile Photo">
                                </div>
                            @else
                                <img src="{{ asset('assets/image/default-profile.png') }}" alt="Default" width="100" class="rounded-circle mb-3">
                            @endif

                            <button class="btn btn-primary mt-3">Update Profile</button>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>


        </main>
    </div>
</div>
@endsection
