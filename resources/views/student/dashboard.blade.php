@extends('layouts.app')
@section('title', 'Student Dashboard')

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

                <!-- Stats Cards -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Courses</p>
                                        <h3 class="fw-bold mb-0">8</h3>
                                        <small class="text-success">+2 this semester</small>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                        <i class="fas fa-book-open fa-xl"></i>
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
                                        <p class="text-muted fw-medium mb-1">Completed</p>
                                        <h3 class="fw-bold mb-0">5</h3>
                                        <small class="text-success">Great progress!</small>
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
                                        <p class="text-muted fw-medium mb-1">Pending Assign</p>
                                        <h3 class="fw-bold mb-0">3</h3>
                                        <small class="text-warning">Due this week</small>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                        <i class="fas fa-exclamation-triangle fa-xl"></i>
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
                                        <p class="text-muted fw-medium mb-1">Attendance Rate</p>
                                        <h3 class="fw-bold mb-0">96%</h3>
                                        <small class="text-success">Excellent!</small>
                                    </div>
                                    <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                        <i class="fas fa-calendar-check fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-header bg-white border-0 py-4">
                                <h5 class="fw-bold mb-0"><i class="fas fa-chart-line text-primary me-2"></i> Academic Performance</h5>
                            </div>
                            <div class="card-body p-4">
                                <canvas id="performanceChart" height="120"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-header bg-white border-0 py-4">
                                <h5 class="fw-bold mb-0"><i class="fas fa-chart-pie text-primary me-2"></i> Course Status</h5>
                            </div>
                            <div class="card-body p-4 text-center">
                                <canvas id="courseChart" height="280"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        // Performance Line Chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'GPA Trend',
                    data: [3.1, 3.4, 3.6, 3.7, 3.9, 4.0, 4.1],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#4361ee',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: false, max: 4.3 } }
            }
        });

        // Course Status Doughnut
        const ctx2 = document.getElementById('courseChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Upcoming'],
                datasets: [{
                    data: [5, 3, 2],
                    backgroundColor: ['#10b981', '#4361ee', '#e2e8f0'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    tooltip: { callbacks: { label: ctx => ctx.label + ': ' + ctx.parsed + ' courses' } }
                }
            },
            plugins: [{
                beforeDraw: chart => {
                    const { width, height, ctx } = chart;
                    ctx.restore();
                    const fontSize = (height / 150).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = "#64748b";
                    const text = "10 Total";
                    const textX = Math.round((width - ctx.measureText(text).width) / 2);
                    const textY = height / 2;
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
    </script>
@endsection
