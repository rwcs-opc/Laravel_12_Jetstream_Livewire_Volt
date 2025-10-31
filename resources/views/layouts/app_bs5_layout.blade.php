<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --header-height: 60px;
            --sidebar-bg: #2c3e50;
            --sidebar-color: #e9ecef;
            --sidebar-active-bg: rgba(255, 255, 255, 0.1);
            --sidebar-hover-bg: rgba(255, 255, 255, 0.05);
            --primary-color: #3b7ddd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: var(--sidebar-color);
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
            overflow: visible;
        }

        .sidebar-header {
            padding: 0 1rem;
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo {
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar.collapsed .sidebar-logo {
            display: none;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-menu .menu-title {
            padding: 0.5rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .sidebar.collapsed .menu-title {
            display: none;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 0.7rem 1.5rem;
            color: var(--sidebar-color);
            border-left: 3px solid transparent;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover-bg);
            color: white;
        }

        .sidebar .nav-link.active {
            background: var(--sidebar-active-bg);
            color: white;
            border-left-color: var(--primary-color);
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .sidebar.collapsed .nav-link {
            padding: 0.8rem;
            justify-content: center;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            font-size: 1.3rem;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .submenu {
            padding-left: 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .sidebar .submenu.show {
            max-height: 1000px;
            transition: max-height 0.5s ease-in;
        }

        .sidebar .submenu .nav-link {
            padding: 0.5rem 1rem 0.5rem 1.5rem;
            font-size: 0.9rem;
            border-left: none;
        }

        .sidebar .has-submenu>.nav-link:after {
            content: '\F282';
            font-family: 'bootstrap-icons';
            margin-left: auto;
            transition: transform 0.3s;
        }

        .sidebar .has-submenu.show>.nav-link:after {
            transform: rotate(180deg);
        }

        .sidebar.collapsed .has-submenu>.nav-link:after {
            display: none;
        }

        .sidebar.collapsed .submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            width: 220px;
            background: var(--sidebar-bg);
            border-radius: 0 4px 4px 0;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
        }

        .sidebar.collapsed .nav-item:hover .submenu {
            display: block;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s;
            padding-top: var(--header-height);
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Header Styles */
        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--header-height);
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            z-index: 100;
            padding: 0 1.5rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar.collapsed~.topbar {
            left: var(--sidebar-collapsed-width);
        }

        .toggle-sidebar {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
        }

        .toggle-sidebar:hover {
            background: #f8f9fa;
        }

        .user-menu .dropdown-toggle {
            display: flex;
            align-items: center;
            color: #495057;
            text-decoration: none;
        }

        .user-menu .dropdown-toggle:after {
            margin-left: 0.5rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 0.5rem;
            object-fit: cover;
        }

        /* Page Content */
        .page-content {
            padding: 1.5rem;
            min-height: calc(100vh - var(--header-height) - 70px);
            /* Adjust based on your header height */
        }

        /* Footer Styles */
        /* Add these styles to your existing CSS */
        .footer {
            background-color: #2c3e50;
        }

        .footer a.hover-text-white:hover {
            color: #fff !important;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #3b7ddd;
            transform: translateY(-3px);
            color: white !important;
        }

        .footer .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .footer .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .footer .btn-primary {
            background-color: #3b7ddd;
            border-color: #3b7ddd;
        }

        .footer .btn-primary:hover {
            background-color: #2c6fd8;
            border-color: #2c6fd8;
        }

        .footer hr {
            opacity: 0.1;
        }

        /* Sidebar Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                z-index: 1050;
                box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content,
            .sidebar.collapsed~.main-content {
                margin-left: 0 !important;
            }

            .topbar {
                left: 0 !important;
            }

            /* Prevent scrolling when sidebar is open */
            body.sidebar-open {
                overflow: hidden;
                position: fixed;
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">Admin Panel</div>
        </div>

        <div class="sidebar-menu">
            <div class="menu-title">MAIN</div>

            <div class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="nav-item has-submenu">
                <a href="#" class="nav-link">
                    <i class="bi bi-layout-sidebar"></i>
                    <span>Layouts</span>
                </a>
                <div class="submenu">
                    <a href="#" class="nav-link">Vertical</a>
                    <a href="#" class="nav-link">Horizontal</a>
                    <a href="#" class="nav-link">Detached</a>
                </div>
            </div>

            <div class="nav-item has-submenu">
                <a href="#" class="nav-link">
                    <i class="bi bi-collection"></i>
                    <span>UI Elements</span>
                </a>
                <div class="submenu">
                    <a href="#" class="nav-link">Alerts</a>
                    <a href="#" class="nav-link">Buttons</a>
                    <a href="#" class="nav-link">Cards</a>
                    <a href="#" class="nav-link">Modals</a>
                    <a href="#" class="nav-link">Tabs</a>
                </div>
            </div>

            <div class="menu-title mt-4">APPS</div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-envelope"></i>
                    <span>Email</span>
                    <span class="badge bg-danger rounded-pill ms-auto">New</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-calendar3"></i>
                    <span>Calendar</span>
                </a>
            </div>

            <div class="nav-item has-submenu">
                <a href="#" class="nav-link">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
                <div class="submenu">
                    <a href="#" class="nav-link">List</a>
                    <a href="#" class="nav-link">Create</a>
                    <a href="#" class="nav-link">Profile</a>
                </div>
            </div>

            <div class="menu-title mt-4">PAGES</div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Blank Page</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-lock"></i>
                    <span>Authentication</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-question-circle"></i>
                    <span>Help Center</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Topbar -->
    <header class="topbar">
        <div>
            <button class="toggle-sidebar" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="user-menu">
            <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=3b7ddd&color=fff" alt="User"
                    class="user-avatar">
                <span class="d-none d-md-inline">John Doe</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-question-circle me-2"></i> Help</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-content">
            @yield('content')
        </div>
        <!-- Footer -->
        <footer class="footer mt-5 bg-dark text-white pt-5 pb-4">
            <div class="container">
                <div class="row g-4">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5 class="text-uppercase fw-bold mb-4">
                            <i
                                class="bi bi-{{ config('app.icon', 'rocket') }} me-2"></i>{{ config('app.name', 'Laravel') }}
                        </h5>
                        <p class="mb-4">Empowering businesses with innovative solutions and cutting-edge technology
                            to
                            drive growth and success.</p>
                        <div class="social-links">
                            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-white me-3"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-white me-3"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-white"><i class="bi bi-github"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5 class="text-uppercase fw-bold mb-4">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Home</a></li>
                            <li class="mb-2"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">About Us</a></li>
                            <li class="mb-2"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Services</a></li>
                            <li class="mb-2"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Portfolio</a></li>
                            <li><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="text-uppercase fw-bold mb-4">Contact Us</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-geo-alt-fill me-2"></i> 123 Business St, City, Country
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-envelope-fill me-2"></i> info@example.com
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-telephone-fill me-2"></i> +1 234 567 890
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="text-uppercase fw-bold mb-4">Newsletter</h5>
                        <p class="mb-3">Subscribe to our newsletter for the latest updates.</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your Email"
                                aria-label="Your Email">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </div>
                </div>

                <hr class="my-4 bg-light">

                <!-- Copyright -->
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="mb-0 text-white-50">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All
                            rights
                            reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Privacy Policy</a></li>
                            <li class="list-inline-item px-2 text-white-50">|</li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Terms of Service</a>
                            </li>
                            <li class="list-inline-item px-2 text-white-50">|</li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-white-50 text-decoration-none hover-text-white">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>



    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const submenuToggles = document.querySelectorAll('.has-submenu > .nav-link');

            // Toggle sidebar function
            function toggleSidebar() {
                if (window.innerWidth < 992) {
                    // Mobile view - toggle with overlay
                    sidebar.classList.toggle('show');
                    sidebarOverlay.classList.toggle('show');
                    document.body.classList.toggle('sidebar-open');

                    // Toggle body scroll
                    document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
                } else {
                    // Desktop view - toggle collapse
                    sidebar.classList.toggle('collapsed');
                    document.body.classList.toggle('sidebar-collapsed');
                }
            }

            // Toggle sidebar on button click
            sidebarToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleSidebar();
            });

            // Close sidebar when clicking overlay
            sidebarOverlay.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    toggleSidebar();
                }
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 992 &&
                    !sidebar.contains(e.target) &&
                    !sidebarToggle.contains(e.target) &&
                    sidebar.classList.contains('show')) {
                    toggleSidebar();
                }
            });

            // Handle submenu toggles
            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        // On mobile, only toggle submenus without following the link
                        if (this.parentElement.classList.contains('has-submenu')) {
                            e.preventDefault();
                            e.stopPropagation();
                            const parent = this.parentElement;
                            const submenu = this.nextElementSibling;

                            // Close other open submenus at the same level
                            const openSiblings = parent.parentElement.querySelectorAll(
                                '.has-submenu.show');
                            openSiblings.forEach(sibling => {
                                if (sibling !== parent) {
                                    sibling.classList.remove('show');
                                    sibling.querySelector('.submenu').classList.remove(
                                        'show');
                                }
                            });

                            // Toggle current submenu
                            parent.classList.toggle('show');
                            submenu.classList.toggle('show');
                        }
                    }
                });
            });

            // Handle window resize
            function handleResize() {
                if (window.innerWidth >= 992) {
                    // Reset mobile states when resizing to desktop
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                    document.body.classList.remove('sidebar-open');
                    document.body.style.overflow = '';

                    // Initialize desktop state
                    if (!document.body.classList.contains('sidebar-collapsed')) {
                        sidebar.classList.remove('collapsed');
                    }
                } else {
                    // Reset desktop states when resizing to mobile
                    sidebar.classList.remove('collapsed');
                    document.body.classList.remove('sidebar-collapsed');
                }
            }

            // Initial setup
            handleResize();
            window.addEventListener('resize', handleResize);
        });
    </script>
</body>

</html>
