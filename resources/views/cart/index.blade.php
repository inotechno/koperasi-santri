@extends('layout-app.app')
@section('css')
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Shopping Cart</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Shopping Cart</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('checkout.view') }}" method="POST">
        @csrf
        <div class="row mb-3" id="all-products">
            <div class="col-xl-8">
                <div class="row align-items-center gy-3 mb-3">
                    <div class="col-sm">
                        <div>
                            <h5 class="fs-14 mb-0">Your Cart ({{ $cart->count() }} items)</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <a href="{{ route('product.explore') }}" class="link-primary text-decoration-underline">Continue
                            Shopping</a>
                    </div>
                </div>
                <?php $total = 0;
                $store = 0; ?>
                @foreach ($cart as $item)
                    @if ($store != $item->product->store->id)
                        <div class="col-sm m-3">
                            <h5 class="fs-20 mb-0">{{ $item->product->store->name }}</h5>
                        </div>
                    @endif
                    <div class="card product">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="cart{{ $item->id }}"
                                            name="cart_id[]" value="{{ $item->id }}"
                                            data-store="{{ $item->product->store->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <img src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                                            alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-14 text-truncate"><a
                                            href="{{ route('product.detail', $item->product->slug) }}"
                                            class="text-dark">{{ $item->product->title }}</a></h5>
                                    <p class="text-muted fs-11">Stock Available : {{ $item->product->stock }}</p>

                                    <div class="input-step">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" min="1" class="product-quantity" name="quantity[]"
                                            value="{{ $item->quantity }}" max="{{ $item->product->stock }}">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Item Price:</p>
                                        <h5 class="fs-14">Rp <span id="ticket_price"
                                                class="product-price">{{ $item->product->price }}</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal"
                                                data-bs-target="#removeItemModal"><i
                                                    class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                Remove</a>
                                        </div>
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2"><i
                                                    class="ri-star-fill text-muted align-bottom me-1"></i> Add
                                                Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Total :</div>
                                        <h5 class="fs-14 mb-0">Rp
                                            <span
                                                class="product-line-price">{{ $item->product->price * $item->quantity }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    @php
                        $store = $item->product->store->id;
                    @endphp
                @endforeach
                <!-- end card -->


            </div>
            <!-- end col -->

            <div class="col-xl-4">

                <div class="sticky-side-div">

                    <div class="card">
                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                            <h4 class="card-title mb-0 flex-grow-1">Vouchers</h4>
                        </div>

                        <div class="card-body">
                            <div class="vstack gap-2" id="voucher-list">

                                @foreach ($vouchers as $voucher)
                                    <div class="border rounded border-dashed p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                        @if ($voucher->type->slug == 'potongan_harga')
                                                            <i class="ri-coupon-line"></i>
                                                        @elseif ($voucher->type->slug == 'potongan_ongkir')
                                                            <i class="ri-truck-line"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="fs-15 mb-1"><a href="#"
                                                        class="text-body text-truncate d-block">{{ $voucher->name }} ||
                                                        {{ $voucher->code }}</a>
                                                </h5>
                                                <div>{{ $voucher->desc_excerpt }}</div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="d-flex gap-1">
                                                    <button type="button" class="btn btn-warning btn-sm btn-set-voucher"
                                                        data-id="{{ $voucher->id }}"
                                                        data-code="{{ $voucher->code }}">Pakai
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Order Summary</h5>
                        </div>
                        <div class="card-header bg-soft-light border-bottom-dashed">
                            <div class="text-center">
                                <h6 class="mb-2">Have a <span class="fw-semibold">promo</span> code ?</h6>
                            </div>
                            <div class="hstack gap-3 px-3 mx-n3">
                                <input class="form-control me-auto" type="text" name="voucher_code"
                                    placeholder="Enter coupon code" aria-label="Add Promo Code here...">
                                <button type="button" class="btn btn-info w-xs" id="btn-apply-voucher">Apply</button>
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr id="table-voucher">

                                        </tr>
                                        <tr class="table-active">
                                            <th>Total (Rupiah) :</th>
                                            <td class="text-end">
                                                <span class="fw-semibold" id="cart-total">
                                                    Rp 0
                                                </span>
                                            </td>

                                            <input type="hidden" name="total">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <div class="text-end mb-4">
                        <button class="btn btn-success btn-label right ms-auto" type="submit"><i
                                class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</button>
                    </div>
                </div>
                <!-- end stickey -->

            </div>
        </div>
    </form>
    <!-- end row -->

    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('plugin')
    <!-- input step init -->
    <script src="{{ asset('assets') }}/js/pages/form-input-spin.init.js"></script>

    <!-- ecommerce cart js -->
    <script src="{{ asset('assets') }}/js/pages/ecommerce-cart.init.js"></script>

    <script>
        $(document).ready(function() {
            $('.product-quantity').on('change', function() {
                if ($(this).val() == 0)
                    $(this).val(1);
            });

            $('.form-check-input').on('change', function() {
                setTotal();
            });

            $('#all-products').on('click', '.minus,.plus', function() {
                setTotal();

                // console.log(checkbox.is(':checked'));
            });

            function setTotal() {
                var total = 0;

                var checkbox = $('.form-check-input:checkbox:checked');
                if (checkbox.length > 0) {
                    checkbox.each(function() {
                        var product = $(this).closest('.product');
                        var product_price = product.find('.product-price').html();
                        var product_quantity = product.find('.product-quantity').val();

                        total += parseFloat(product_price * product_quantity);

                    });
                }

                $('[name="total"]').val(total);
                $('#cart-total').html('Rp. ' + total);
            }

            $('#voucher-list').on('click', '.btn-set-voucher', function() {
                $('[name="voucher_code"]').val($(this).data('code'));
            })

            $('#btn-apply-voucher').click(function() {
                var code = $('[name="voucher_code"]').val();
                var total = $('[name="total"]').val();

                $.ajax({
                    type: "GET",
                    url: "{{ url('voucher/check') }}",
                    data: {
                        code: code,
                        total: total
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.success == false) {
                            notification(response.type, response.message);
                        } else {
                            notification('success', response.message)
                            $('#table-voucher').html(
                                '<td>' + response.data.type_name + ' (' + response.data
                                .voucher_code + ') :</td><td class="text-end">' + response
                                .data
                                .price_disc +
                                '</td>'
                            );
                        }
                    }
                });

                return false;
            })
        });
    </script>
@endsection
