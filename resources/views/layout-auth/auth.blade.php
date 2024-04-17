<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/interactive/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Sep 2022 08:38:35 GMT -->

<head>
    @include('layout-auth.partials.head')
    @yield('css')
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                @yield('content')
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        @include('layout-auth.partials.footer')
    </div>
    <!-- end auth-page-wrapper -->


</body>
@include('layout-auth.partials.plugin')
@yield('plugin')

<!-- Mirrored from themesbrand.com/velzon/html/interactive/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Sep 2022 08:38:36 GMT -->

</html>
