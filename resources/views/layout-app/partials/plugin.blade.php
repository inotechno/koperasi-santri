<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ url('assets') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ url('assets') }}/libs/feather-icons/feather.min.js"></script>
<script src="{{ url('assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

@yield('plugin')
{{-- Moment.js --}}
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
<!-- App js -->
<script src="{{ url('assets') }}/js/app.js"></script>

@include('alert');

@auth
    <script>
        $(document).ready(function() {
            var countPending = $('[data-key="t-wating_payment"]');
            if (countPending.length > 0) {
                getCountPending();
            }

            function getCountPending() {
                $.ajax({
                    type: "get",
                    url: "{{ route('order.count.pending') }}",
                    dataType: "JSON",
                    success: function(response) {
                        if (response.success) {
                            countPending.append(
                                '<span class="badge badge-pill bg-danger ms-3 align-middle">' +
                                response
                                .data +
                                '</span>'
                            )
                        }
                    }
                });

                return false;
            }
        });
    </script>
@endauth
