<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- Google Font: Fira Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backends/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backends/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.cs') }}s">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backends/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backends//plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backends/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backends/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backends/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('backends/dist/css/custom.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backends/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('backend.includes.navigation')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backends/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backends/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backends/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backends/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backends/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backends/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backends/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backends/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backends/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backends/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backends/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('backends/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backends/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backends/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backends/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('backends/dist/js/pages/dashboard.js') }}"></script> --}}
</body>

</html>
