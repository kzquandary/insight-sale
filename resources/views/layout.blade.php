<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Pengmas - Pengabdian Masyarakat Universitas Jenderal Achmad Yani">
    <meta name="keywords" content="admin, pengmas, pengabdian masyarakat, unjani">
    <meta name="author" content="Nur Faid Prasetyo">
    <meta name="robots" content="noindex, nofollow">
    <title>Pengabdian Masyarakat - Universitas Jenderal Achmad Yani</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/unjani.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('dashboard') }}" class="logo logo-normal">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-white">
                    <img src="{{ asset('assets/img/logo/unjani.png') }}" alt="">
                </a>
                <a href="{{ route('dashboard') }}" class="logo-small">
                    <img src="{{ asset('assets/img/logo/unjani.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                    <i data-feather="chevrons-left" class="feather-16"></i>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item nav-searchinputs">
                    <div class="top-nav-search" style="display: none;">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#" class="dropdown">
                            <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="false">
                                <input type="text" placeholder="Search">
                                <div class="search-addon">
                                    <span><i data-feather="x-circle" class="feather-14"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item nav-item-box">
                    <a href="javascript:void(0);" id="btnFullscreen">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Main</h6>
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Menu</h6>
                            <ul>
                                <li><a href="{{ route('produk.index') }}"><i data-feather="box"></i><span>Produk</span></a></li>
                                <li><a href="{{ route('penjualan.index') }}"><i data-feather="plus-square"></i><span>Data Penjualan</span></a></li>
                                <li><a href="{{ route('pos.index') }}"><i data-feather="hard-drive"></i><span>POS</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>

    </div>


    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>

    <script src="{{ asset('assets/js/theme-script.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="8e19b7abeb795af9dc39399c-text/javascript"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="8e19b7abeb795af9dc39399c-|49" defer=""></script>
    <script>
        function forecast(data, type) {
            $.ajax({
                url: 'http://localhost:5000/forecast',
                method: 'POST',
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json',
                success: function(response) {
                    if (type === 'penjualan') {
                        Swal.fire({
                            title: 'Prediksi Penjualan',
                            text: 'Prediksi penjualan untuk selanjutnya adalah: ' + parseInt(response.predicted) + ' item',   
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    } else if (type === 'pendapatan') {
                        Swal.fire({
                            title: 'Prediksi Pendapatan',
                            text: 'Prediksi pendapatan untuk selanjutnya adalah: ' + Number(response.predicted).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }),
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    return null;
                }
            });
        }
    </script>
    @yield('script')
</body>

</html>