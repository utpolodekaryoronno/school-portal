<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Auth')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    {{-- chart js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- style css  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light shadow-sm mb-4" style="background-color: #fff;">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/image/logo.png') }}" alt="School Logo" style="height: 60px;">
            </a>

            <!-- Right Menu -->
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- GUEST: Not logged in -->
                @if(!auth('student')->check() && !auth('teacher')->check() && !auth('staff')->check() && !auth('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary px-4 me-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary px-4" href="{{ route('register') }}">Register</a>
                    </li>
                @endif

                <!-- STUDENT LOGGED IN -->
                @if(auth('student')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline fw-semibold">{{ auth()->user()->name }}</span>
                            <small class="text-success ms-2 me-2">(Student)</small>
                            <img src="{{ auth()->user()->photo
                                ? asset('media/student/'.auth()->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle " width="40" height="40" style="object-fit: cover;">

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a></li>
                            <li><a class="dropdown-item my-2" href="{{ route('profile') }}">
                                <i class="fas fa-user me-2"></i> Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- TEACHER LOGGED IN -->
                @if(auth('teacher')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline fw-semibold">{{ auth('teacher')->user()->name }}</span>
                            <small class="text-primary ms-2 me-2">(Teacher)</small>
                            <img src="{{ auth('teacher')->user()->photo
                                ? asset('media/teacher/'.auth('teacher')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle " width="40" height="40" style="object-fit: cover;">

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2">
                            <li><a class="dropdown-item" href="{{ route('dashboard.teacher') }}">
                                <i class="fas fa-chalkboard-teacher me-2"></i> Dashboard
                            </a></li>
                            <li><a class="dropdown-item my-2" href="{{ route('profile.teacher') }}">
                                <i class="fas fa-user me-2"></i> Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.teacher') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- STAFF LOGGED IN -->
                @if(auth('staff')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline fw-semibold">{{ auth('staff')->user()->name }}</span>
                            <small class="text-info ms-2 me-2">(Staff)</small>
                            <img src="{{ auth('staff')->user()->photo
                                ? asset('media/staff/'.auth('staff')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle " width="40" height="40" style="object-fit: cover;">

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2">
                            <li><a class="dropdown-item" href="{{ route('staff.dashboard') }}">
                                <i class="fas fa-briefcase me-2"></i> Dashboard
                            </a></li>
                            <li><a class="dropdown-item my-2" href="{{ route('profile.staff') }}">
                                <i class="fas fa-user me-2"></i> Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.staff') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- ADMIN LOGGED IN -->
                @if(auth('admin')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline fw-semibold">{{ auth('admin')->user()->name }}</span>
                            <small class="text-danger ms-2 me-2">(Admin)</small>
                            <img src="{{ auth('admin')->user()->photo
                                ? asset('media/admin/'.auth('admin')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle " width="40" height="40" style="object-fit: cover;">

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2">
                            <li><a class="dropdown-item" href="{{ route('dashboard.admin') }}">
                                <i class="fas fa-crown me-2"></i> Admin Panel
                            </a></li>
                            <li><a class="dropdown-item my-2" href="{{ route('profile.admin') }}">
                                <i class="fas fa-user-shield me-2"></i> Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.admin') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </header>


    <section>
        @yield('content')
    </section>



    {{-- script js  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- fullcalendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Toastr JS -->
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        }

        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

    </script>



    {{-- password toggle script  --}}
    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function () {
            const target = document.querySelector(this.dataset.target);
            const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
            target.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

     {{-- Dynamic Delete Confirmation with SweetAlert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-form").forEach(form => {
                form.addEventListener("submit", function (e) {
                    e.preventDefault(); // stop form submission

                    let message = form.getAttribute("data-message") || "Are you sure you want to delete this Account?";

                    Swal.fire({
                        title: "Confirm Delete",
                        text: message,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // finally submit if confirmed
                        }
                    });
                });
            });
        });
    </script>


</body>
</html>
