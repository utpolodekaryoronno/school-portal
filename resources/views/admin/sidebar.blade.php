
<nav class="bg-dark text-white border-end shadow-sm" style="width: 280px;">
    <div class="p-4">
        <h4 class="text-white fw-bold mb-4">
            <i class="fas fa-crown text-warning me-2"></i> Admin Panel
        </h4>

        <ul class="nav flex-column">

            <!-- Dashboard -->
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard.admin') }}" class="nav-link text-white rounded-3 py-2 px-3 {{ request()->routeIs('dashboard.admin') ? 'bg-primary' : 'hover-bg-primary' }}">
                    <i class="fas fa-tachometer-alt me-3"></i> Dashboard
                </a>
            </li>

            <!-- Manage Teachers -->
            {{-- <li class="nav-item mb-2">
                <a href="{{ route('admin.teachers.index') }}" class="nav-link text-white rounded-3 py-2 px-3 {{ request()->routeIs('admin.teachers.*') ? 'bg-primary' : 'hover-bg-primary' }}">
                    <i class="fas fa-chalkboard-teacher me-3"></i> Teachers
                </a>
            </li> --}}
            <li class="nav-item mb-2">
                <a href="" class="nav-link text-white rounded-3 py-2 px-3">
                    <i class="fas fa-chalkboard-teacher me-3"></i> Teachers
                </a>
            </li>

            <!-- Manage Staff (with dropdown) -->
            {{-- <li class="nav-item dropdown mb-2">
                <a class="nav-link text-white dropdown-toggle rounded-3 py-2 px-3 d-flex justify-content-between align-items-center hover-bg-primary"
                   data-bs-toggle="collapse" href="#staffMenu" role="button">
                    <span><i class="fas fa-user-tie me-3"></i> Staff Management</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.staff.*') ? 'show' : '' }}" id="staffMenu">
                    <ul class="list-unstyled ps-5 mt-2">
                        <li><a href="{{ route('admin.staff.index') }}" class="text-white-50 small py-2 d-block hover-text-white">All Staff</a></li>
                        <li><a href="{{ route('admin.staff.create') }}" class="text-white-50 small py-2 d-block hover-text-white">Add New Staff</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Accountants</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Librarians</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Manager</a></li>
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item dropdown mb-2">
                <a class="nav-link text-white dropdown-toggle rounded-3 py-2 px-3 d-flex justify-content-between align-items-center hover-bg-primary"
                   data-bs-toggle="collapse" href="#staffMenu" role="button">
                    <span><i class="fas fa-user-tie me-3"></i> Staff Management</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
                <div class="collapse" id="staffMenu">
                    <ul class="list-unstyled ps-5 mt-2">
                        <li><a href="" class="text-white-50 small py-2 d-block hover-text-white">All Staff</a></li>
                        <li><a href="" class="text-white-50 small py-2 d-block hover-text-white">Add New Staff</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Accountants</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Librarians</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Manager</a></li>
                    </ul>
                </div>
            </li>

            <!-- Students Management -->
            {{-- <li class="nav-item mb-2">
                <a href="{{ route('admin.students.index') }}" class="nav-link text-white rounded-3 py-2 px-3 {{ request()->routeIs('admin.students.*') ? 'bg-primary' : 'hover-bg-primary' }}">
                    <i class="fas fa-user-graduate me-3"></i> Students
                </a>
            </li> --}}
            <li class="nav-item mb-2">
                <a href="" class="nav-link text-white rounded-3 py-2 px-3">
                    <i class="fas fa-user-graduate me-3"></i> Students
                </a>
            </li>

            <!-- Classes & Sections -->
            {{-- <li class="nav-item dropdown mb-2">
                <a class="nav-link text-white dropdown-toggle rounded-3 py-2 px-3 d-flex justify-content-between align-items-center hover-bg-primary"
                   data-bs-toggle="collapse" href="#classMenu" role="button">
                    <span><i class="fas fa-school me-3"></i> Classes & Sections</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.classes.*') ? 'show' : '' }}" id="classMenu">
                    <ul class="list-unstyled ps-5 mt-2">
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">All Classes</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Add Class</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Sections</a></li>
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item dropdown mb-2">
                <a class="nav-link text-white dropdown-toggle rounded-3 py-2 px-3 d-flex justify-content-between align-items-center hover-bg-primary"
                   data-bs-toggle="collapse" href="#classMenu" role="button">
                    <span><i class="fas fa-school me-3"></i> Classes & Sections</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
                <div class="collapse" id="classMenu">
                    <ul class="list-unstyled ps-5 mt-2">
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">All Classes</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Add Class</a></li>
                        <li><a href="#" class="text-white-50 small py-2 d-block hover-text-white">Sections</a></li>
                    </ul>
                </div>
            </li>

            <!-- Attendance -->
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white rounded-3 py-2 px-3 hover-bg-primary">
                    <i class="fas fa-clipboard-check me-3"></i> Attendance
                </a>
            </li>

            <!-- Reports -->
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white rounded-3 py-2 px-3 hover-bg-primary">
                    <i class="fas fa-chart-bar me-3"></i> Reports & Analytics
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white rounded-3 py-2 px-3 hover-bg-primary">
                    <i class="fas fa-cogs me-3"></i> System Settings
                </a>
            </li>

            <hr class="my-4 border-secondary">

            <!-- Logout -->
            <li class="nav-item">
                <form action="{{ route('logout.admin') }}" method="POST">
                    @csrf
                    <button class="nav-link text-white rounded-3 py-2 px-3 w-100 text-start bg-danger hover-bg-dark border-0">
                        <i class="fas fa-sign-out-alt me-3"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<style>
    .hover-bg-primary:hover { background-color: rgba(59, 130, 246, 0.3) !important; }
    .hover-text-white:hover { color: white !important; }
</style>
