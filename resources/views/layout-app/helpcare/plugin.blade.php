<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ url('assets') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ url('assets') }}/libs/feather-icons/feather.min.js"></script>
<script src="{{ url('assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
{{-- <script src="{{ url('assets') }}/js/plugins.js"></script> --}}

<!-- apexcharts -->
{{-- <script src="{{ url('assets') }}/libs/apexcharts/apexcharts.min.js"></script> --}}

<!-- Vector map-->
{{-- <script src="{{ url('assets') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{ url('assets') }}/libs/jsvectormap/maps/world-merc.js"></script> --}}

<!-- Dashboard init -->
{{-- <script src="{{ url('assets') }}/js/pages/dashboard-ecommerce.init.js"></script> --}}

<script src="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

@yield('plugin')
{{-- Moment.js --}}
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<!-- App js -->
<script src="{{ url('assets') }}/js/app.js"></script>

@include('alert');
