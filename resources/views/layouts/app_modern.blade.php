<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Dashboard') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #e0e6ed;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
            border-radius: 8px;
            padding: 10px 14px;
            margin: 2px 6px;
            transition: all 0.2s;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .sidebar .nav-item i {
            font-size: 1.1rem;
            margin-right: 8px;
        }

        .sidebar .bottom-section {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid #e9ecef;
        }

        .main-content {
            margin-left: 260px;
            padding: 1.5rem;
            transition: all 0.3s;
        }

        .navbar-top {
            background: #ffffff;
            border-bottom: 1px solid #e0e6ed;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }

        .table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }

        .btn-primary {
            border-radius: 10px;
            padding: 6px 14px;
            font-weight: 500;
        }

        @media (max-width: 992px) {
            .sidebar {
                left: -260px;
                position: fixed;
                z-index: 1040;
            }
            .sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column">
        <div class="p-3 border-bottom">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
                <span class="fs-5 fw-semibold text-dark">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </div>

        <ul class="nav flex-column px-2 mt-3">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i> Posts
                </a>
            </li>
        </ul>

        <div class="bottom-section">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="nav-link">
                        <i class="bi bi-github"></i> Repository
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="nav-link">
                        <i class="bi bi-book"></i> Documentation
                    </a>
                </li>
            </ul>

            <hr>

            {{-- User Dropdown --}}
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center" style="width: 36px; height: 36px;">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </span>
                    <span class="ms-2 fw-semibold text-dark">{{ auth()->user()->name ?? 'User' }}</span>
                </a>

                <ul class="dropdown-menu shadow border-0">
                    <li class="dropdown-item text-muted small">{{ auth()->user()->email ?? '' }}</li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i>Settings</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <div class="main-content">
        {{-- Top Navbar (mobile toggle) --}}
        <nav class="navbar navbar-light navbar-top sticky-top px-3 mb-4">
            <button class="btn btn-light d-lg-none" id="toggleSidebar"><i class="bi bi-list fs-4"></i></button>
            <span class="navbar-brand mb-0 h5">{{ config('app.name', 'Laravel Dashboard') }}</span>
        </nav>

        {{-- Page content --}}
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>
