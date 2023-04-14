<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset($logos->fav) }}" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/OverlayScrollbars.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/js/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/js/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/js/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/js/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/js/summernote/summernote-bs4.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets/backend/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/js/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('user.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('user.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('user.partials.controlSidebar')
        <!-- Main Footer -->
        @include('user.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/backend/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets/backend/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/backend/js/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/js/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
    {!! Toastr::message() !!}
    @yield('script')
    <script>
        $(function() {
            $(".data_tables").DataTable();
            $('.dropify').dropify();
            $('.long').summernote({
                height: 500,
                placeholder: 'Enter your text....'
            });
            $('.medium').summernote({
                height: 250,
                placeholder: 'Enter your text....'
            });
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

        });
    </script>
</body>

</html>
