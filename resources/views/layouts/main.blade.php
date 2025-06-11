<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="content-wrapper">
            <section class="content pt-3 px-3">
                @yield('content')
            </section>
        </div>

        @include('layouts.footer')

    </div>

    @yield('scripts')

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
</body>

</html>
