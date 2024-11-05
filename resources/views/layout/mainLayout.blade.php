<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/select2.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

</head>

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">DuaPutri</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->nama }}</h6>
                            <span>Super Admin</span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Petunjuk Penggunaan</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar Akun</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Antarmuka</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#barang" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Barang</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="barang" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/barang">
                            <i class="bi bi-circle"></i><span>Data Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="/error">
                            <i class="bi bi-circle"></i><span>Statistik</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Barang Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#supplier" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"></i><span>Pemasok</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="supplier" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/supplier">
                            <i class="bi bi-circle"></i><span>Data Pemasok</span>
                        </a>
                    </li>

                    <li>
                        <a href="/supplierin">
                            <i class="bi bi-circle"></i><span>Barang Masuk</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Supplier Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#petugas" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-circle"></i><span>Petugas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="petugas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/petugas">
                            <i class="bi bi-circle"></i><span>Data Petugas</span>
                        </a>
                    </li>
                    <li>
                        <a href="/error">
                            <i class="bi bi-circle"></i><span>Histori</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Petugas Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#transaksi" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-basket"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="transaksi" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/error">
                            <i class="bi bi-circle"></i><span>Data Transaksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/transaksi">
                            <i class="bi bi-circle"></i><span>Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End transaksi Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Daffa Faiz Alghozi</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan URL saat ini tanpa query string atau hash dan menghilangkan trailing slash jika ada
            var currentUrl = window.location.pathname.replace(/\/$/, "");

            // Mendapatkan semua link di sidebar
            var links = document.querySelectorAll('.sidebar-nav a');

            // Debug: Lihat URL yang sedang diakses
            console.log("Current URL:", currentUrl);

            // Loop untuk memeriksa setiap link
            links.forEach(function(link) {
                // Mendapatkan href dari setiap link sidebar dan hilangkan trailing slash jika ada
                var linkHref = link.getAttribute('href').replace(/\/$/, "");

                // Debug: Lihat href dari setiap link
                console.log("Link Href:", linkHref);

                // Pastikan href ada dan tidak kosong, kemudian cek apakah cocok dengan URL saat ini
                if (linkHref && currentUrl === linkHref) {
                    // Debug: Jika cocok, tambahkan kelas active dan tampilkan pesan
                    console.log("Matching link found:", linkHref);

                    // Menambahkan kelas active pada link yang sesuai
                    link.classList.add('active');

                    // Jika link berada dalam dropdown, tambahkan juga kelas show pada ul parent-nya
                    var parentUl = link.closest('ul');
                    if (parentUl && parentUl.classList.contains('nav-content')) {
                        parentUl.classList.add('show');

                        // Tambahkan juga kelas collapsed pada parent a (trigger dropdown)
                        var parentLink = parentUl.previousElementSibling;
                        if (parentLink && parentLink.classList.contains('nav-link')) {
                            parentLink.classList.remove('collapsed');
                        }
                    }
                } else {
                    // Debug: Jika tidak cocok, pastikan tidak ada kelas active
                    console.log("Link not matching:", linkHref);
                    link.classList.remove('active');
                }
            });
        });
    </script>



    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
