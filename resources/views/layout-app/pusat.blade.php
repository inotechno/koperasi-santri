<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="none">

<!-- Mirrored from themesbrand.com/velzon/html/interactive/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Sep 2022 08:37:43 GMT -->

<head>

    @include('layout-app.helpcare.head')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                @include('layout-app.helpcare.sidebar')
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            @include('layout-app.helpcare.navbar')

        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layout-app.helpcare.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

</body>
@include('layout-app.helpcare.plugin')
{{-- @yield('plugin') --}}

<!-- Mirrored from themesbrand.com/velzon/html/interactive/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Sep 2022 08:37:45 GMT -->

</html>
