@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="d-flex min-vh-100 bg-gray-50">


    {{-- staff sidebar --}}
    @include('staff.sidebar')

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
                <div class="row g-3 mb-4">
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

            <!-- Stats Cards Library Only-->
            <!-- Librarian Dashboard Stats Cards -->
            @if(Auth::guard('staff')->user()->role === "librarian")
                <div class="row g-3 mb-4">

                    <!-- Total Books -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Total Books</p>
                                        <h3 class="fw-bold mb-0">8,542</h3>
                                        <small class="text-success">
                                            <i class="fas fa-arrow-up"></i> +128 this month
                                        </small>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                        <i class="fas fa-book-open fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Books Issued Today -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Issued Today</p>
                                        <h3 class="fw-bold mb-0">47</h3>
                                        <small class="text-info">
                                            <i class="fas fa-clock"></i> Active now
                                        </small>
                                    </div>
                                    <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                        <i class="fas fa-exchange-alt fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Returns -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Pending Returns</p>
                                        <h3 class="fw-bold mb-0">18</h3>
                                        <small class="text-warning">
                                            <i class="fas fa-hourglass-half"></i> Due this week
                                        </small>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                        <i class="fas fa-undo-alt fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Available Books -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Available Now</p>
                                        <h3 class="fw-bold mb-0">7,890</h3>
                                        <small class="text-success">92% availability</small>
                                    </div>
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                        <i class="fas fa-check-circle fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            <!-- Charts Section -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold mb-0"><i class="fas fa-chart-line text-success me-2"></i> Financial Overview (2025)</h5>
                        </div>
                        <div class="card-body p-4">
                            <canvas id="financialChart" height="120"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold mb-0"><i class="fas fa-chart-pie text-success me-2"></i> Income Sources</h5>
                        </div>
                        <div class="card-body p-4 text-center">
                            <canvas id="incomeChart" height="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions (Manager Only) -->
            @if(Auth::guard('staff')->user()->role === 'manager')
            <div class="mt-5">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 py-4">
                        <h5 class="fw-bold mb-0"><i class="fas fa-history text-success me-2"></i> Recent Transactions</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025-11-20</td>
                                        <td>Tuition Fee - Class 10</td>
                                        <td><span class="badge bg-success">Income</span></td>
                                        <td class="fw-bold">৳85,000</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-11-18</td>
                                        <td>Teacher Salary - Nov</td>
                                        <td><span class="badge bg-danger">Expense</span></td>
                                        <td class="fw-bold">৳320,000</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-11-15</td>
                                        <td>Library Fine Collection</td>
                                        <td><span class="badge bg-success">Income</span></td>
                                        <td class="fw-bold">৳8,500</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </main>
    </div>
</div>

<script>
    // Financial Line Chart
    new Chart(document.getElementById('financialChart'), {
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

    // Income Sources Doughnut
    new Chart(document.getElementById('incomeChart'), {
        type: 'doughnut',
        data: {
            labels: ['Tuition Fees', 'Admission Fees', 'Fines & Others', 'Donations'],
            datasets: [{
                data: [65, 20, 10, 5],
                backgroundColor: ['#10b981', '#4361ee', '#f59e0b', '#8b5cf6'],
                borderWidth: 0,
                cutout: '70%'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        },
        plugins: [{
            beforeDraw: function(chart) {
                var width = chart.width,
                    height = chart.height,
                    ctx = chart.ctx;
                ctx.restore();
                var fontSize = (height / 160).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#1f2937";
                var text = "100%",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
    });
</script>

@endsection
