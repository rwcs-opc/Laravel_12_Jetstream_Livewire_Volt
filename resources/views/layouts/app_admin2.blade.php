<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/css/styles.min.css') }}" />
    @stack('styles')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!--  App Topstrip -->
        <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
                <a class="d-flex justify-content-center" href="#">
                    <img src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/images/logos/logo-wrappixel.svg') }}"
                        alt="" width="150">
                </a>


            </div>

            <div class="d-lg-flex align-items-center gap-2">
                <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">Check Flexy Premium Version</h3>
                <div class="d-flex align-items-center justify-content-center gap-2">

                    <div class="dropdown d-flex">
                        <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-shopping-cart fs-5"></i>
                            Buy Now
                            <i class="ti ti-chevron-down fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Sidebar Start -->
        @include('partials.admin2.sidebar')
        <!-- Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('partials.admin2.header')
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <!--  Main content begins -->
                    @yield('content')
                    {{-- Main content ends --}}

                    {{-- Main sample content begins --}}
                    {{-- @include('partials.admin2.original_index') --}}
                    {{-- Main content ends --}}

                    {{-- footer begin --}}
                    @include('partials.admin2.footer')
                    {{-- footer end --}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script
        src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/libs/apexcharts/dist/apexcharts.min.js') }}">
    </script>
    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('templates/flexy-bootstrap-lite-1.0.0/assets/js/dashboard.js') }}"></script>
    <!-- solar icons -->

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    @stack('scripts')
</body>

</html>