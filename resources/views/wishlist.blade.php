@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Wishlist Produk</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Fiture</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    @livewire('wishlist-data')
    {{-- <livewire:product-data> --}}
@endsection

@section('plugin')
    @livewireScripts
    <script type="text/javascript">
        window.isLoading = false

        $(window).on('scroll', function() {
            if ((window.innerHeight + window.scrollY + 10) >= document.body.offsetHeight) {
                if (window.isLoading) {
                    $('#products').append(
                        '<div class="col-md-6 col-lg-4 col-xl-3 mb-3">' +
                        '   <div class="product-card">' +
                        '    <div class="product-card-shimmer">' +
                        '        <div class="_2iwr"></div>' +
                        '        <div class="_2iws"></div>' +
                        '        <div class="_2iwt"></div>' +
                        '        <div class="_2iwu"></div>' +
                        '        <div class="_2iwv"></div>' +
                        '        <div class="_2iww"></div>' +
                        '        <div class="_2iwx"></div>' +
                        '        <div class="_2iwy"></div>' +
                        '        <div class="_2iwz"></div>' +
                        '        <div class="_2iw-"></div>' +
                        '        <div class="_2iw_"></div>' +
                        '        <div class="_2ix0"></div>' +
                        '    </div>' +
                        '   </div>' +
                        '</div>');

                    return true
                }

                window.livewire.emit('product-data');
                window.isLoading = true;
            }
        })

        window.addEventListener('loading-complete', function(e) {
            $('.skeleton').remove();
            window.isLoading = false;
            // rate();
        })
    </script>
@endsection
