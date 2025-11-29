<!-- Modern Sidebar - Accountant Theme -->
    <aside class="bg-white border-end shadow-sm" style="width: 280px;">
        <div class="p-3 text-center border-bottom">
            <div class="d-flex flex-column align-items-center gap-3">
                <div class="bg-purple text-white rounded-3 p-3 shadow-sm">
                    <i class="fas fa-calculator fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Accountant Portal</h5>
                    <small class="text-purple text-capitalize">{{Auth::guard('staff')->user()->role}} Dashboard</small>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">

                    <a href="{{ route('staff.dashboard') }}" class="nav-link active_purple d-flex align-items-center gap-3 px-4 py-2 rounded-3">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="fw-semibold">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-arrow-trend-up text-success"></i>
                        <span class="fw-semibold">Income</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-arrow-trend-down text-danger"></i>
                        <span class="fw-semibold">Expenses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-users"></i>
                        <span class="fw-semibold">Students / Parents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-building"></i>
                        <span class="fw-semibold">Vendors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-money-check-alt"></i>
                        <span class="fw-semibold">Payroll</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-university"></i>
                        <span class="fw-semibold">Bank Accounts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span class="fw-semibold">Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-cog"></i>
                        <span class="fw-semibold">Settings</span>
                    </a>
                </li>
            </ul>

            <hr class="my-4 border-muted">

            <div class="px-2">
                <a href="{{ route('profile.staff') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 hover-bg">
                    <img src="{{ Auth::guard('staff')->user()->photo
                        ? asset('media/staff/'.Auth::guard('staff')->user()->photo)
                        : asset('assets/image/default-profile.png') }}"
                        class="rounded-circle shadow-sm" width="48" height="48" style="object-fit: cover;">
                    <div>
                        <div class="fw-bold text-dark">{{ Auth::guard('staff')->user()->name }}</div>
                        <small class="text-purple">Accountant</small>
                    </div>
                </a>
            </div>
        </nav>
    </aside>
