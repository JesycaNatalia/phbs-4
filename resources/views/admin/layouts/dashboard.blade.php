@if(Auth::user()->role == 'user')
<script>
    window.location = "/";
</script>
@endif

<!DOCTYPE html>

<html class="loaded" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <script src="https://kit.fontawesome.com/2290a955fa.js" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - PHBS</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <style>
        div#DataTables_Table_0_wrapper {
            width: 100% !important;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
    @yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout semi-dark-layout 2-columns navbar-sticky footer-static pace-done menu-expanded vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="overflow: auto;">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>


                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-capitalize">{{ Auth::user()->nama }}</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="bx bx-power-off mr-50"></i> Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:;">
                        <h2 class="brand-text mb-0">PHBS</h2>
                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx-x d-block d-xl-none font-medium-4 primary toggle-icon bx-disc bx"></i>
                        <i class="toggle-icon bx-disc font-medium-4 d-none d-xl-block primary bx" data-ticon="bx-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content ps">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.adashboard.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="notebook" style="visibility: visible; width: 60px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Driver">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.bulan.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="notebook" style="visibility: visible; width: 60px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Driver">Bulan</span>
                    </a>
                </li>
                <li class="nav-item has-sub">
                    <a href="#">
                        <i class="menu-livicon livicon-evo-holder" data-icon="notebook" style="visibility: visible; width: 60px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Driver">Kuisoner</span>
                    </a>
                    <ul class="menu-content" style="">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('admin.dashboard.pilihpemantauan.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Tabel Driver">Jenis Pemantauan</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-sub">
                    <a href="#">
                        <i class="menu-livicon livicon-evo-holder" data-icon="notebook" style="visibility: visible; width: 60px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Driver">Pantauan</span>
                    </a>
                    <ul class="menu-content" style="">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('admin.dashboard.pantauan.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Tabel Driver">Laporan Bulanan</span></a>
                        </li>
                    </ul>
                    <ul class="menu-content" style="">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('admin.dashboard.pantauansoal.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Tabel Driver">Laporan Per Soal</span></a>
                        </li>
                    </ul>
                    <ul class="menu-content" style="">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('admin.dashboard.rekapratarata.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Tabel Driver">Laporan Rekap Rata-Rata</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.grafik.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="notebook" style="visibility: visible; width: 60px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Driver">Grafik</span>
                    </a>
                </li>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>
    <div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-left d-inline-block">2021 © All rights reserved</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('script')
    <!-- END: Page JS-->
    <script>
        $(document).on("click", "#readNotif", function() {
            let id = $(this).val();
            console.log(id)
            $.ajax({
                method: "GET",
                url: "/read-notif/" + id
            }).done(function(response) {
                console.log(response)
                window.location.href = '/dashboard/request-layanan?menu=tabel'
            });
        });
        if ($("a[href='{{ Request::url() }}']")[0]) {
            $("a[href='{{ Request::url() }}']").closest('li').addClass('active');
        }
        if ($('.pickadate')[0]) {
            $('.pickadate').pickadate({
                format: 'yyyy-mm-dd',
            });
        }
        if ($('.datatable')[0]) {
            var table = $('.datatable').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
            });

            table.on('order.dt search.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        }

        $(".input-number").on("keypress", function(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        });

        function inputmaskCurrencyInit() {
            Inputmask.extendAliases({
                'numeric': {
                    "prefix": "",
                    "digits": 0,
                    "rightAlign": false,
                    "digitsOptional": false,
                    "decimalProtect": true,
                    "groupSeparator": ".",
                    "radixPoint": ",",
                    "radixFocus": true,
                    "autoGroup": true,
                    "autoUnmask": true,
                    "removeMaskOnSubmit": true
                }
            });
            Inputmask.extendAliases({
                'IDR': {
                    alias: "numeric", //it inherits all the properties of numeric
                }
            });
            $(".input-currency").inputmask("IDR");
        }
        inputmaskCurrencyInit();
    </script>
    @if (session('ERR'))
    <script>
        Swal.fire({
            title: "ERROR!",
            text: " {{ session('ERR') }}",
            icon: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        });
    </script>
    @endif
    @if (session('OK'))
    <script>
        Swal.fire({
            title: "OK!",
            text: "{{ session('OK') }}",
            icon: "success",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        });
    </script>
    @endif

</body>
<!-- END: Body-->

</html>

</html>