@extends('layouts.app')

@section('title', 'Profile')


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

            <!-- Back to Dashboard Button -->
                <div class="mb-3 text-center text-md-start">
                    <a href="{{ route('staff.dashboard') }}"
                       class="text-bold text-dark fw-semibold">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to Dashboard
                    </a>
                </div>

            <!-- Profile Card -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Cover & Avatar Section -->
                <div class="position-relative bg-gradient" style="height: 180px; background: linear-gradient(135deg, #198754, #20c997);">
                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
                        <div class="text-center">
                            @if (Auth::guard('staff')->user()->photo)
                                <img src="{{ asset('media/staff/' . Auth::guard('staff')->user()->photo) }}"
                                        class="rounded-circle border border-5 border-white shadow-lg"
                                        width="140" height="140" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/image/default-profile.png') }}"
                                        class="rounded-circle border border-5 border-white shadow-lg"
                                        width="140" height="140" style="object-fit: cover;">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="card-body px-4 px-md-5 pb-4 text-center text-md-start">
                    <div class="text-center mt-4">
                        <h2 class="fw-bold text-dark mb-1">{{ Auth::guard('staff')->user()->name }}</h2>
                        <p class="text-muted fs-5 mb-2">
                            <i class="fas fa-envelope text-success me-2"></i>
                            {{ Auth::guard('staff')->user()->email }}
                        </p>
                        <p class="mb-3">
                            <span class="badge bg-success text-white fs-6 px-4 py-2 rounded-pill text-capitalize">
                                <i class="fas fa-user-tie me-2"></i>
                                {{(Auth::guard('staff')->user()->role ?? 'staff') }}
                            </span>
                        </p>
                    </div>

                    <hr class="my-4">

                    <!-- Profile Details Grid -->
                    <div class="row g-4 text-start">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-id-card fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Staff ID</small>
                                    <strong>#STF{{ str_pad(Auth::guard('staff')->user()->id, 4, '0', STR_PAD_LEFT) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                    <i class="fas fa-phone fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Phone</small>
                                    <strong>{{ Auth::guard('staff')->user()->phone ?? 'Not provided' }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-user-tie fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">User ID</small>
                                    <strong>{{(Auth::guard('staff')->user()->username) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Joined Date</small>
                                    <strong>{{ Auth::guard('staff')->user()->created_at->format('d M, Y') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="{{ route('edit.staff') }}" class="btn btn-success btn-lg px-5 btn-custom ">
                            <i class="fas fa-user-edit me-2"></i> Edit Profile
                        </a>


                        <a href="" class="btn btn-primary btn-lg px-5 btn-custom">
                            <i class="fas fa-key me-2"></i> Change Password
                        </a>


                        <form action="{{ route('logout.staff') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-custom btn-logout">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>

                        <form action="{{ route('delete.staff') }}" method="POST"
                            class="delete-form"  data-message="Are you sure you want to delete this Account?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-custom btn-delete px-5">
                                <i class="fas fa-trash-alt me-2"></i> Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
