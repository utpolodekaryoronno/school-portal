   <!-- Modern Staff Sidebar -->
    <aside class="bg-white border-end shadow-sm" style="width: 280px;">
        <div class="p-3 text-center border-bottom">
            <div class="d-flex flex-column align-items-center gap-3">
                <div class=" @if(Auth::guard('staff')->user()->role === 'manager')
                    bg-success
                    @else
                    bg-primary
                    @endif text-white rounded-3 p-2 px-3 shadow-sm">
                    <i class="fas fa-user-tie fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Staff Portal</h5>
                    <small class="
                    @if(Auth::guard('staff')->user()->role === 'manager')
                    text-success
                    @else
                    text-primary
                    @endif  text-capitalize">{{ Auth::guard('staff')->user()->role }} Dashboard</small>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('staff.dashboard') }}"
                    class="nav-link
                    @if(Auth::guard('staff')->user()->role === 'manager')
                    active_green
                    @else
                    active
                    @endif
                    d-flex align-items-center gap-3 px-4 py-2 rounded-3">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="fw-semibold">Dashboard</span>
                    </a>
                </li>

                <!-- Common for Manager, Librarian, Accountant -->
                @if(in_array(Auth::guard('staff')->user()->role, ['manager', 'librarian', 'accountant']))
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-users"></i>
                            <span class="fw-semibold">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-book"></i>
                            <span class="fw-semibold">Library Books</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-exchange-alt"></i>
                            <span class="fw-semibold">Issue / Return</span>
                        </a>
                    </li>
                @endif

                <!-- Manager Only -->
                @if(Auth::guard('staff')->user()->role === 'manager')
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="fw-semibold">Finance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-chart-pie"></i>
                            <span class="fw-semibold">Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-cogs"></i>
                            <span class="fw-semibold">Settings</span>
                        </a>
                    </li>
                @endif
            </ul>

            <hr class="my-4 border-muted">

            <!-- Profile Section -->
            <div class="px-2">
                <a href="{{ route('profile.staff') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 hover-bg transition">
                    <img src="{{ Auth::guard('staff')->user()->photo
                        ? asset('media/staff/'.Auth::guard('staff')->user()->photo)
                        : asset('assets/image/default-profile.png') }}"
                        class="rounded-circle border shadow-sm" width="48" height="48" style="object-fit: cover;">
                    <div>
                        <div class="fw-bold text-dark">{{ Auth::guard('staff')->user()->name }}</div>
                        <small class="
                        @if(Auth::guard('staff')->user()->role === 'manager')
                    text-success
                    @else
                    text-primary
                    @endif text-capitalize">{{ Auth::guard('staff')->user()->role }}</small>
                    </div>
                </a>
            </div>
        </nav>
    </aside>
