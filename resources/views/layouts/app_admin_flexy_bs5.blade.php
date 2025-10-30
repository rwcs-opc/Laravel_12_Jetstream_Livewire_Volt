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

        @include('partials.admin.header')

        @include('partials.admin.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('partials.admin.footer')

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