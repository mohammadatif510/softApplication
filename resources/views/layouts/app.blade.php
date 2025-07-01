<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="SoftApplication" name="description" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="">

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
</head>

<body id="body" class="dark-sidebar">
    @include('../../components/sidebar')
    @include('../../components/header')

    <div class="page-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid">
                @include('../../components/page-title')
                @yield('content')
            </div>

            <footer class="footer text-center text-sm-start">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> Unikit
                <span class="text-muted d-none d-sm-inline-block float-end">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes
                </span>
            </footer>
        </div>
    </div>

    <!-- JS Scripts -->

    <!-- jQuery (Required for DataTables) -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script src="{{ asset('assets/pages/form-wizard.js') }}"></script>

    <script src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightpicker/litepicker.js') }}"></script>
    <script src=" {{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/pages/projects-index.init.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap & App -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/pages/sweet-alert.init.js') }}"></script>

    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Selectr -->
    <script src="{{ asset('assets/plugins/select/selectr.min.js') }}"></script>

    <!-- Your Custom JS -->
    <script src="{{ asset('assets/js/role.js') }}"></script>
    <script src="{{ asset('assets/js/roleCategory.js') }}"></script>
    <script src="{{ asset('assets/js/permission.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
    <script src="{{ asset('assets/js/utils.js') }}"></script>
    <script src="{{ asset('assets/js/project.js') }}"></script>
    <script src="{{ asset('assets/js/client.js') }}"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            if ($.fn.DataTable.isDataTable('#datatable_2')) {
                $('#datatable_2').DataTable().destroy();
            }
            $('#datatable_2').DataTable();
        });
           document.addEventListener("DOMContentLoaded", function () {
            var selectEl = document.querySelector("#default");
                new Selectr(selectEl);
        });
    </script>
</body>

</html>