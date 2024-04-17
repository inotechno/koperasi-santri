@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
    <style>
        .product-card {
            border: 1px solid;
            border-color: #bdbdbd;
            border-radius: 2px;
            padding: 20px;
            background: #ffffff;
        }

        .product-card-shimmer {
            -webkit-animation-duration: 1s;
            -webkit-animation-fill-mode: forwards;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-name: placeHolderShimmer;
            -webkit-animation-timing-function: linear;
            background: #d8d8d8;
            background-image: linear-gradient(to right, #d8d8d8 0%, #bdbdbd 20%, #d8d8d8 40%, #d8d8d8 100%);
            background-repeat: no-repeat;
            background-size: 800px 104px;
            height: 104px;
            position: relative
        }

        .product-card-shimmer div {
            background: #ffffff;
            height: 6px;
            left: 0;
            position: absolute;
            right: 0
        }

        ._2iwo {
            height: 200px;
            padding: 12px
        }

        .__z8 {
            height: 150px;
            padding: 12px
        }

        div._2iwr {
            height: 40px;
            left: 40px;
            right: auto;
            top: 0;
            width: 8px;
        }

        div._2iws {
            height: 8px;
            left: 48px;
            top: 0
        }

        div._2iwt {
            left: 136px;
            top: 8px
        }

        div._2iwu {
            height: 12px;
            left: 48px;
            top: 14px
        }

        div._2iwv {
            left: 100px;
            top: 26px
        }

        div._2iww {
            height: 10px;
            left: 48px;
            top: 32px
        }

        div._2iwx {
            height: 20px;
            top: 40px
        }

        div._2iwy {
            left: 410px;
            top: 60px
        }

        div._2iwz {
            height: 13px;
            top: 66px
        }

        div._2iw- {
            left: 440px;
            top: 79px
        }

        div._2iw_ {
            height: 13px;
            top: 85px
        }

        div._2ix0 {
            left: 178px;
            top: 98px
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Browse Product</h3>

                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                        <li class="breadcrumb-item active">Daftar Kategori</li>
                    </ol>
                </div> --}}

            </div>
        </div>
    </div>

    @livewire('product-data')
    {{-- <livewire:product-data> --}}
@endsection

@section('plugin')
    @livewireScripts
    {{-- <script src="{{ asset('assets') }}/js/rater.min.js"></script> --}}

    <script type="text/javascript">
        // rate();

        // function rate() {
        //     var options = {
        //         max_value: 5,
        //         step_size: 0.5,
        //         initial_value: 0,
        //         selected_symbol_type: 'utf8_star', // Must be a key from symbols
        //         cursor: 'default',
        //         readonly: true,
        //         change_once: false, // Determines if the rating can only be set once
        //         ajax_method: 'POST',
        //         url: 'http://localhost/test.php',
        //         additional_data: {} // Additional data to send to the server
        //     }

        //     $(".rater-product").rate(options);
        // }

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
