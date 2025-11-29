@extends('layouts.app')
@section('title', ' Admin Dashboard')



@section('content')

{{-- <div class="d-flex min-vh-100 bg-gray-50">

    @include("teacher.sidebar")

    <!-- Main Content -->
    <div class="flex-grow-1 overflow-auto">
         <header class="bg-white border-bottom shadow-sm">
                <div class="d-flex justify-content-between align-items-center p-4 px-5">
                    <div>
                        <h2 class="fw-bold mb-1">Welcome back, {{ $teacher->name }}</h2>
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
                                <img src="{{ $teacher->photo ? asset('media/teacher/'.$teacher->photo) : asset('assets/image/default-profile.png') }}"
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

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Total Students</p>
                                    <h3 class="fw-bold mb-0">320</h3>
                                    <small class="text-success">Across 12 classes</small>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-user-graduate fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Active Classes</p>
                                    <h3 class="fw-bold mb-0">12</h3>
                                    <small class="text-info">This semester</small>
                                </div>
                                <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                    <i class="fas fa-chalkboard fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Today's Attendance</p>
                                    <h3 class="fw-bold mb-0 text-success">88%</h3>
                                    <small class="text-success">Great turnout!</small>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-check-circle fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Pending Tasks</p>
                                    <h3 class="fw-bold mb-0 text-warning">4</h3>
                                    <small class="text-danger">2 due today</small>
                                </div>
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                    <i class="fas fa-exclamation-triangle fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts + Recent Students -->
            <div class="row g-4">

                <!-- LEFT COLUMN: Enhanced with 3 Stacked Cards -->
                <div class="col-lg-8">

                    <!-- 1. Student Performance Trend (Line Chart) -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-4 d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Student Performance Trend</h5>
                            <small class="text-muted">Last 6 Months • Average Grade</small>
                        </div>
                        <div class="card-body p-4">
                            <canvas id="performanceChart" height="130"></canvas>
                        </div>
                    </div>

                    <!-- 2. Today's Class Schedule (Compact Timeline) -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-4 d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Today's Classes</h5>
                            <small class="text-success"><i class="fas fa-clock me-1"></i> {{ now()->format('l, j F') }}</small>
                        </div>
                        <div class="card-body p-4">
                            <div class="timeline">
                                <div class="d-flex align-items-center mb-4 position-relative">
                                    <div class="bg-primary rounded-circle" style="width:12px;height:12px;"></div>
                                    <div class="ms-4 flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 fw-bold">Mathematics - Class 10A</h6>
                                            <span class="text-success small fw-semibold">08:00 AM - 09:30 AM</span>
                                        </div>
                                        <small class="text-muted">Room 205 • 38 students</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-4 position-relative">
                                    <div class="bg-info rounded-circle" style="width:12px;height:12px;"></div>
                                    <div class="ms-4 flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 fw-bold">Physics - Class 9B</h6>
                                            <span class="text-info small fw-semibold">10:00 AM - 11:30 AM</span>
                                        </div>
                                        <small class="text-muted">Lab Room 301 • 35 students</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-4 position-relative">
                                    <div class="bg-warning rounded-circle" style="width:12px;height:12px;"></div>
                                    <div class="ms-4 flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 fw-bold">Extra Class - Class 12</h6>
                                            <span class="text-warning small fw-semibold">02:00 PM - 03:30 PM</span>
                                        </div>
                                        <small class="text-muted">Room 108 • Exam Prep</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="bg-success rounded-circle" style="width:12px;height:12px;"></div>
                                    <div class="ms-4 flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1 fw-bold text-success">Free Period</h6>
                                            <span class="text-success small fw-semibold">03:30 PM onwards</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Keep your existing Attendance Pie + Recent Students -->
                <div class="col-lg-4">
                    <!-- Attendance Pie Chart -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-4">
                            <h6 class="fw-bold mb-0">Attendance Breakdown (This Week)</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="attendancePie" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Recent Students -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 py-4 d-flex justify-content-between">
                            <h6 class="fw-bold mb-0">Recent Active Students</h6>
                            <a href="#" class="small text-primary">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:40px;height:40px;background:#10b981;">R</div>
                                            <div>
                                                <h6 class="mb-0">Rahim Khan</h6>
                                                <small class="text-muted">Class 10-A • Last seen 2 mins ago</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success rounded-pill">A-</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:40px;height:40px;background:#10b981;">R</div>
                                            <div>
                                                <h6 class="mb-0">Rahim Khan</h6>
                                                <small class="text-muted">Class 10-A • Last seen 2 mins ago</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success rounded-pill">A+</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:40px;height:40px;background:#10b981;">R</div>
                                            <div>
                                                <h6 class="mb-0">Rahim Khan</h6>
                                                <small class="text-muted">Class 10-A • Last seen 2 mins ago</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success rounded-pill">A+</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:40px;height:40px;background:#10b981;">R</div>
                                            <div>
                                                <h6 class="mb-0">Rahim Khan</h6>
                                                <small class="text-muted">Class 10-A • Last seen 2 mins ago</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-danger rounded-pill">C</span>
                                    </div>
                                </a>
                                <!-- Repeat for others -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script>
    // Performance Line Chart
    new Chart(document.getElementById('performanceChart'), {
        type: 'line',
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Average Grade',
                data: [78, 82, 85, 81, 88, 90],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });


    // Attendance Pie Chart
    new Chart(document.getElementById('attendancePie'), {
        type: 'doughnut',
        data: {
            labels: ['Present', 'Absent', 'Late'],
            datasets: [{
                data: [88, 8, 4],
                backgroundColor: ['#10b981', '#ef4444', '#f59e0b'],
                borderWidth: 0
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
</script> --}}



<div class="d-flex min-vh-100 bg-gray-50">

    @include("admin.sidebar")

    <!-- Main Content -->
    <div class="flex-grow-1 overflow-auto">

        <header class="bg-white border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center p-4 px-5">
                <div>
                    <h2 class="fw-bold mb-1 text-danger">
                        <i class="fas fa-crown me-2"></i> Welcome back, {{ auth('admin')->user()->name }}
                    </h2>
                    <p class="text-muted mb-0">Manage your school with full control</p>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-outline-secondary position-relative">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            8
                        </span>
                    </button>

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ auth('admin')->user()->photo
                                ? asset('media/admin/'.auth('admin')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle border border-4 border-danger shadow" width="55" height="55">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                            <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.admin') }}"><i class="fas fa-user me-3"></i>Profile</a></li>
                            <li><a class="dropdown-item rounded-2 py-2" href="#"><i class="fas fa-cog me-3"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.admin') }}" method="POST">
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

        <main class="p-5">

            <!-- Admin Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-primary text-white">
                        <div class="card-body p-4">
                            <h5>Total Students</h5>
                            <h2 class="fw-bold">1,245</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-success text-white">
                        <div class="card-body p-4">
                            <h5>Teachers</h5>
                            <h2 class="fw-bold">68</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-info text-white">
                        <div class="card-body p-4">
                            <h5>Staff Members</h5>
                            <h2 class="fw-bold">32</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 bg-warning text-white">
                        <div class="card-body p-4">
                            <h5>Classes Running</h5>
                            <h2 class="fw-bold">48</h2>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add your charts or tables below -->
        </main>
    </div>
</div>

@endsection
