<!-- Teacher Sidebar -->
    <aside class="bg-white border-end shadow-sm" style="width: 280px;">
        <div class="p-4 text-center border-bottom">
            <div class="d-flex flex-column align-items-center gap-3">
                <div class="bg-primary text-white rounded-3 p-3 shadow-sm">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Teacher Portal</h5>
                    <small class="text-muted">Classroom Management</small>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('dashboard.teacher') }}" class="nav-link active d-flex align-items-center gap-3 px-4 py-2 rounded-3">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="fw-semibold">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-book-open text-success"></i>
                        <span class="fw-semibold">My Classes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-users text-info"></i>
                        <span class="fw-semibold">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-clipboard-check text-primary"></i>
                        <span class="fw-semibold">Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-calendar-alt text-warning"></i>
                        <span class="fw-semibold">Schedule</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-file-alt text-purple"></i>
                        <span class="fw-semibold">Assignments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-cog"></i>
                        <span class="fw-semibold">Settings</span>
                    </a>
                </li>
            </ul>

            <hr class="my-4">

            <div class="px-2">
                <a href="{{ route('profile.teacher') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 hover-bg">
                    <img src="{{ Auth::guard('teacher')->user()->photo
                        ? asset('media/teacher/'.Auth::guard('teacher')->user()->photo)
                        : asset('assets/image/default-profile.png') }}"
                         class="rounded-circle shadow-sm" width="50" height="50" style="object-fit: cover;">
                    <div>
                        <div class="fw-bold text-dark">{{ Auth::guard('teacher')->user()->name }}</div>
                        <small class="text-primary">Class Teacher</small>
                    </div>
                </a>
            </div>
        </nav>
    </aside>
