<!-- Modern Sidebar -->
        <aside class="bg-white border-end shadow-sm" style="width: 280px;">
            <div class="p-3 text-center border-bottom">
                <div class="d-flex flex-column align-items-center justify-content-center gap-3">
                    <div class="bg-primary text-white rounded-3 p-3">
                        <i class="fas fa-graduation-cap fa-xl"></i>
                    </div>
                    <div class="text-start">
                        <h5 class="mb-0 fw-bold">Student Portal</h5>
                        <small class="text-muted">Academic Dashboard</small>
                    </div>
                </div>
            </div>

            <nav class="p-4">
                <ul class="nav nav-pills flex-column gap-2">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active d-flex align-items-center gap-3 px-4 py-2 rounded-3">
                            <i class="fas fa-home"></i>
                            <span class="fw-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-book-open"></i>
                            <span class="fw-semibold">My Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-chart-bar"></i>
                            <span class="fw-semibold">Grades & Results</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-clipboard-list"></i>
                            <span class="fw-semibold">Assignments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="fw-semibold">Attendance</span>
                        </a>
                    </li>
                </ul>

                <hr class="my-3 border-muted">

                <div>
                    <a href="{{ route('profile') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 hover-bg">
                        <img src="{{ $student->photo ? asset('media/student/'.$student->photo) : asset('assets/image/default-profile.png') }}"
                            class="rounded-circle" width="44" height="44" style="object-fit: cover;">
                        <div>
                            <div class="fw-bold">{{ $student->name }}</div>
                            <small class="text-muted">View Profile</small>
                        </div>
                    </a>
                </div>
            </nav>
        </aside>
