<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- Bootstrap Social CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">

        <style>
            .main-content {
                padding-top: 70px;
            }
            .section {
                padding: 1.5rem;
            }
            .card {
                box-shadow: 0 4px 8px rgba(0,0,0,.03);
                background-color: #fff;
                border-radius: 3px;
                border: none;
                position: relative;
                margin-bottom: 30px;
            }
            .card .card-header {
                background-color: transparent;
                border-bottom: 1px solid #f9f9f9;
                padding: 15px 20px;
                position: relative;
            }
            .card .card-body {
                padding: 20px;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
                line-height: 1.5;
                border-radius: 0.25rem;
            }
            .btn-icon {
                padding: 0.5rem;
            }
            .form-control {
                height: calc(2.25rem + 2px);
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
                line-height: 1.5;
                border-radius: 0.25rem;
            }
            .badge {
                padding: 0.5em 0.75em;
                font-size: 75%;
                font-weight: 600;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25rem;
            }
            /* Social Login Buttons */
            .btn-social {
                position: relative;
                padding-left: 44px;
                text-align: left;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                color: #fff;
            }
            .btn-social > :first-child {
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 32px;
                line-height: 34px;
                font-size: 1.6em;
                text-align: center;
                border-right: 1px solid rgba(0,0,0,0.2);
            }
            .btn-google {
                color: #fff;
                background-color: #dd4b39;
                border-color: rgba(0,0,0,0.2);
            }
            .btn-google:hover {
                color: #fff;
                background-color: #c23321;
            }
            .btn-dark {
                color: #fff;
                background-color: #343a40;
                border-color: rgba(0,0,0,0.2);
            }
            .btn-dark:hover {
                color: #fff;
                background-color: #23272b;
            }
            .login-brand {
                margin: 0 auto 2rem;
                text-align: center;
            }
            .login-brand h1 {
                font-size: 2.5rem;
                font-weight: 700;
            }
            .text-job {
                font-size: 0.875rem;
                color: #6c757d;
                margin-bottom: 1rem;
            }
            .sm-gutters {
                margin-right: -0.5rem;
                margin-left: -0.5rem;
            }
            .sm-gutters > .col,
            .sm-gutters > [class*="col-"] {
                padding-right: 0.5rem;
                padding-left: 0.5rem;
            }
        </style>

        @stack('styles')
    </head>
    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                @include('layouts.navigation')

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            @isset($header)
                                <h1 class="section-title">{{ $header }}</h1>
                            @endisset
                        </div>

                        <div class="section-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            {{ $slot }}
                        </div>
                    </section>
                </div>

                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; {{ date('Y') }} <div class="bullet"></div> {{ config('app.name', 'Laravel') }}
                    </div>
                    <div class="footer-right">
                        Version 1.0
                    </div>
                </footer>
            </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/modules/popper.js') }}"></script>
        <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>

        <!-- JS Libraries -->
        <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
        <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Page Specific JS File -->
        @stack('scripts')

        <script>
            // Initialize DataTables
            $(document).ready(function() {
                $('.datatable').DataTable({
                    "pageLength": 10,
                    "ordering": true,
                    "responsive": true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                    }
                });

                // Initialize NiceScroll
                $("html").niceScroll();

                // Initialize tooltips
                $('[data-toggle="tooltip"]').tooltip();

                // Auto-hide alerts after 5 seconds
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);
            });
        </script>
    </body>
</html>
