@extends('layouts.app')
@section('title', ' Admin Dashboard')



@section('content')

    <div class="d-flex min-vh-100 bg-gray-50">

        @include("admin.sidebar")

        <!-- Main Content -->
        <div class="flex-grow-1 overflow-auto">

            <header class="bg-white border-bottom shadow-sm">
                <div class="d-flex justify-content-between align-items-center p-4 px-5">
                    <div>
                        <h2 class="fw-bold mb-1">
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
                                    class="rounded-circle border border-3 border-primary shadow" width="55" height="55">
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

            <main class="p-3">
                <!-- Admin Stats Cards -->
                <div class="row g-3 mb-4">
                    <!-- Total Students -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Students</p>
                                        <h3 class="fw-bold mb-0 text-primary">1,248</h3>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +12 this month
                                        </small>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                        <i class="fas fa-user-graduate fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Teachers -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Teachers</p>
                                        <h3 class="fw-bold mb-0 text-info">68</h3>
                                        <small class="text-info">All departments active</small>
                                    </div>
                                    <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                        <i class="fas fa-chalkboard-teacher fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Staff -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Staff Members</p>
                                        <h3 class="fw-bold mb-0 text-warning">32</h3>
                                        <small class="text-warning">Accountants • Librarians • Others</small>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                        <i class="fas fa-user-tie fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Classes -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Active Classes</p>
                                        <h3 class="fw-bold mb-0 text-success">48</h3>
                                        <small class="text-success">Running this semester</small>
                                    </div>
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                        <i class="fas fa-school fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Students Related Information --}}
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

                    </div>
                </div>

                {{-- Accountant Related Information --}}

                <!-- Charts + Recent Transactions -->
                <div class="row g-4">
                    <!-- Income vs Expense Chart -->
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-header bg-white border-0 py-4">
                                <h5 class="fw-bold mb-0"><i class="fas fa-chart-area text-primary me-2"></i> Income vs Expenses (2025)</h5>
                            </div>
                            <div class="card-body p-4">
                                <canvas id="incomeExpenseChart" height="120"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-header bg-white border-0 py-4 d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0"><i class="fas fa-history text-primary me-2"></i> Recent Transactions</h5>
                                <a href="#" class="text-decoration-none small text-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Tuition Fee - Class 10</h6>
                                            <small class="text-success">+৳85,000</small>
                                        </div>
                                        <small class="text-muted">Nov 20, 2025 • Paid</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Teacher Salary (Nov)</h6>
                                            <small class="text-danger">-৳320,000</small>
                                        </div>
                                        <small class="text-muted">Nov 18, 2025 • Paid</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Library Fine Collection</h6>
                                            <small class="text-success">+৳8,500</small>
                                        </div>
                                        <small class="text-muted">Nov 15, 2025 • Paid</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    {{-- js --}}
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


        //incomeExpenseChart
        new Chart(document.getElementById('incomeExpenseChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                datasets: [
                    {
                        label: 'Income',
                        data: [800000, 920000, 880000, 1050000, 1100000, 1150000, 1200000, 1220000, 1400000, 1260000],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Expenses',
                        data: [700000, 750000, 780000, 820000, 810000, 830000, 820000, 520000, 420000, 400000],
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top' } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
@endsection
