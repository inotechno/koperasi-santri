<meta charset="utf-8" />
{{-- <title>{{ $title ? $title : '' }} | Koperasi Santri</title> --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ url('assets') }}/images/favicon.ico">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- jsvectormap css -->
{{-- <link href="{{ url('assets') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" /> --}}

<link href="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
@yield('css')

<!-- Layout config Js -->
<script src="{{ url('assets') }}/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="{{ url('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ url('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ url('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ url('assets') }}/css/custom.min.css" rel="stylesheet" type="text/css" />
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>

<script>
    var base_url = "{{ url('assets') }}";
    // console.log(base_url);
</script>
