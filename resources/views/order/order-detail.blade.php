<!-- start page title -->
@extends('layout-app.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Order Details</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order
                            #{{ $order->order_number }} </h5>
                        <div class="flex-shrink-0">
                            <a href="apps-invoices-details.html" class="btn btn-info btn-sm"><i
                                    class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Product Details</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class="text-end">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach ($order->orderitem as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                                                        alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="apps-ecommerce-product-details.html"
                                                            class="link-primary">{{ $item->product->title }}
                                                        </a></h5>
                                                    {{-- <p class="text-muted mb-0">Color: <span class="fw-medium">Pink</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Size: <span class="fw-medium">M</span></p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{ $item->quantity }}</td>

                                        <td class="fw-medium text-end">
                                            {{ number_format($item->price * $item->quantity) }}
                                        </td>
                                    </tr>
                                    @php
                                        $subtotal += $item->price * $item->quantity;
                                    @endphp
                                @endforeach

                                <tr class="border-top border-top-dashed">
                                    <td colspan="1"></td>
                                    <td colspan="3" class="fw-medium p-0">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td class="text-end">{{ number_format($subtotal) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ongkos Kirim :</td>
                                                    <td class="text-end">
                                                        {{ number_format($order->deliverydetail->shipping_cost) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>PPN :</td>
                                                    <td class="text-end">{{ number_format($order->ppn) }}</td>
                                                </tr>
                                                @if (!empty($order->voucher_id))
                                                    @if ($order->voucher->type->slug == 'potongan_harga')
                                                        @php
                                                            $disc = 0;
                                                            if ($order->voucher->discount_percentage != null) {
                                                                $total_disc = ($order->voucher->discount_percentage / 100) * $subtotal;
                                                                if ($total_disc > $order->voucher->max_discount) {
                                                                    $disc = $order->voucher->max_discount;
                                                                } else {
                                                                    $disc = $total_disc;
                                                                }
                                                            } else {
                                                                $disc = $order->voucher->discount_nominal;
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>Discount :</td>
                                                            <td class="text-end">
                                                                {{ number_format($disc) }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endif
                                                <tr>
                                                    <td>Admin Fee :</td>
                                                    <td class="text-end">{{ number_format($order->paymentdetail->fee) }}
                                                    </td>
                                                </tr>
                                                <tr class="border-top border-top-dashed">
                                                    <th scope="row">Total (Rp) :</th>
                                                    <th class="text-end">{{ number_format($order->grand_total) }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($order->paymentdetail->status_code == 200 && $order->process_time == null)
                    @hasrole('seller')
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#prosesOrder">
                                <i class="ri-download-cloud-line align-bottom me-1"></i>
                                Proses Pesanan
                            </button>

                            {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#cancelOrder">
                                <i class="ri-close-circle-fill align-bottom me-1"></i>
                                Cancel Pesanan
                            </button> --}}
                        </div>
                    @endrole
                @elseif($order->process_time != null && $order->shipping_time != null && $order->accepted_time == null)
                    @hasrole('customer')
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#terimaOrder">
                                <i class="ri-download-cloud-line align-bottom me-1"></i>
                                Terima Pesanan
                            </button>

                            {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#cancelOrder">
                                <i class="ri-close-circle-fill align-bottom me-1"></i>
                                Cancel Pesanan
                            </button> --}}
                        </div>
                    @endrole
                @endif
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-primary rounded-circle">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-0 fw-semibold">Order Masuk #<span
                                                        class="fw-normal">{{ $order->order_number }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        @if ($order->paymentdetail->status_code != 200)
                                            <h6 class="mb-1">Pesanan Belum dibayar.</h6>
                                            <p class="text-muted">{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}
                                            </p>
                                        @elseif ($order->paymentdetail->status_code == 200)
                                            <h6 class="mb-1">Pesanan sudah dibayar.</h6>
                                            <p class="text-muted">
                                                {{ date('d-m-Y H:i:s', strtotime($order->paymentdetail->paid_date)) }}
                                            </p>
                                        @else
                                            <h6 class="mb-1">Pesanan tidak berhasil.</h6>
                                            <p class="text-muted">
                                                {{ date('d-m-Y H:i:s', strtotime($order->cancel_time)) }}
                                            </p>
                                        @endif

                                        @if ($order->process_time)
                                            <h6 class="mb-1">Pesanan diterima oleh seller.</h6>
                                            <p class="text-muted mb-0">
                                                {{ date('d-m-Y H:i:s', strtotime($order->process_time)) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if ($order->shipping_time != null)
                                <div class="accordion-item border-0">
                                    <div class="accordion-header" id="headingThree">
                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                            href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-xs">
                                                    <div class="avatar-title bg-primary rounded-circle">
                                                        <i class="ri-truck-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-15 mb-1 fw-semibold">Dikirim - <span
                                                            class="fw-normal">{{ date('d-m-Y H:i:s', strtotime($order->shipping_time)) }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse show"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                            <h6 class="fs-14">{{ $order->deliverydetail->expedition_service }} -
                                                {{ $order->deliverydetail->resi_number }}</h6>
                                            <h6 class="mb-1">Pesanan sedang dikirim.</h6>
                                            <p class="text-muted mb-0">
                                                {{ date('d-m-Y H:i:s', strtotime($order->shipping_time)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <div class="accordion-header" id="headingFour">
                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                            href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-xs">
                                                    <div class="avatar-title bg-primary rounded-circle">
                                                        <i class="ri-takeaway-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body ms-2 ps-5 pt-0" id="manifest">
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($order->accepted_time != null)
                                <div class="accordion-item border-0">
                                    <div class="accordion-header" id="headingFive">
                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                            href="#collapseFile" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-xs">
                                                    <div class="avatar-title bg-primary rounded-circle">
                                                        <i class="mdi mdi-package-variant"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-0 fw-semibold text-success">Pesanan diterima</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>
                        Payment
                        Details</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Transactions:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">#{{ $order->order_number }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Payment Method:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{ $order->paymentdetail->payment_name }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">VA Number:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{ $order->paymentdetail->va_number }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Status:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">
                                {{ $order->duitku['message'] }}
                            </h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Total Amount:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">
                                Rp {{ number_format($order->duitku['amount'] + $order->paymentdetail->fee) }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0"><i
                                class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i>
                            Delivery Details</h5>
                        @if ($order->deliverydetail->resi_number == null)
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge badge-soft-danger fs-11"
                                    id="btn-ganti-kurir">Ganti Kurir</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px">
                        </lord-icon>
                        <h5 class="fs-16 mt-2">
                            {{ strtoupper($order->deliverydetail->expedition) . ' ' . $order->deliverydetail->expedition_service }}
                        </h5>
                        <p class="text-muted mb-0">Biaya: {{ $order->deliverydetail->shipping_cost }}</p>
                        @if ($order->deliverydetail->resi_number != null)
                            <p class="text-muted mb-0">Resi Number : {{ $order->deliverydetail->resi_number }}</p>
                        @endif
                    </div>

                    <input type="hidden" name="origin" value="{{ $order->deliverydetail->from->subdistrict_id }}">
                    <input type="hidden" name="destination" value="{{ $order->deliverydetail->to->subdistrict_id }}">
                    <input type="hidden" name="total_weight" value="{{ $order->deliverydetail->total_weight }}">

                    @hasrole('seller')
                        @if ($order->process_time != null && $order->deliverydetail->resi_number == null)
                            <div id="expedition" class="form-group mt-3">
                            </div>

                            <form action="{{ route('seller.order.kirim') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <input type="hidden" name="expedition">
                                <input type="hidden" name="expedition_service">
                                <div class="form-group mt-3">
                                    <label for="resi">Masukan Resi Pengiriman</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('resi_number') is-invalid @enderror"
                                            aria-label="02NSJS21232" aria-describedby="resi_number" name="resi_number"
                                            value="{{ old('resi_number') }}">
                                        @error('resi_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <button class="btn btn-outline-info" type="submit" id="resi_number">Submit</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endrole
                </div>
            </div>
            <!--end card-->

            @hasrole('customer')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Toko</h5>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="link-secondary">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        @if ($order->store->logo != null)
                                            <img src="{{ asset('storage/logo_images/' . $order->store->logo) }}"
                                                alt="" class="avatar-sm rounded">
                                        @else
                                            <img src="{{ asset('storage/default.png') }}" alt=""
                                                class="avatar-sm rounded">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ $order->store->name }}</h6>
                                        <p class="text-muted mb-0">{{ $order->store->slug }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endrole

            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Return
                        Address
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14">{{ $order->deliverydetail->from->name }}</li>
                        <li>{{ $order->deliverydetail->from->phone }}</li>
                        <li>{{ $order->deliverydetail->from->address_line1 }}</li>
                        <li>{{ $order->deliverydetail->from->address_line2 }}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Destination
                        Address
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14">{{ $order->deliverydetail->to->name }}</li>
                        <li>{{ $order->deliverydetail->to->phone }}</li>
                        <li>{{ $order->deliverydetail->to->address_line1 }}</li>
                        <li>{{ $order->deliverydetail->to->address_line2 }}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->

        </div>
        <!--end col-->
    </div>

    {{-- <form method="POST" id="form-cancel-order" action="{{ route('seller.order.cancel') }}">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $order->id }}">
        <div id="cancelOrder" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Apakah anda yakin ingin menolak transaksi ini ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger ">Yes, Cancel !</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form> --}}

    <form action="{{ route('seller.order.proses') }}" id="form-proses-order" method="POST">
        @method('PUT')

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $order->id }}">
        <div id="prosesOrder" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover"
                                style="width:150px;height:150px">
                            </lord-icon>
                            <h4 class="mb-3 mt-4">Proses Transaksi</h4>
                            <p class="text-muted fs-15 mb-4">Apakah anda sudah yakin dan ingin
                                proses transaksi ini ?</p>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn w-sm btn-danger ">Ya, Lanjutkan!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <form action="{{ route('order.accepted') }}" id="form-terima-order" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $order->id }}">
        <div id="terimaOrder" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($order->orderitem as $item)
                            <input type="hidden" name="product_id[]" value="{{ $item->product_id }}">
                            <input type="hidden" name="nilai[]" value="" id="rating-{{ $item->product_id }}">

                            <div class="d-flex align-items-start text-muted mb-4">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                                        class="avatar-lg rounded" alt="...">
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="fs-14 mb-0">{{ $item->product->title }}</h5>
                                    <div class="d-block text-warning rater-product mb-2" style="font-size: 20px;"
                                        data-id="{{ $item->product_id }}" data-rate-value="0"></div>
                                    <input type="text" class="form-control" name="catatan[]"
                                        placeholder="Catatan ...">
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-2 text-center">

                            <h4 class="mb-3 mt-4">Pesanan Diterima</h4>
                            <p class="text-muted fs-15 mb-4">Apakah anda yakin ingin menerima pesanan ini dan menyelesaikan
                                transaksi ?</p>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn w-sm btn-danger ">Ya, Lanjutkan!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
    <!--end row-->
@endsection

@section('plugin')
    <!-- rater-js plugin -->
    {{-- <script src="{{ asset('assets') }}/libs/star-rating/js/jquery.star-rating-svg.js"></script> --}}
    <script src="{{ asset('assets') }}/js/rater.min.js"></script>
    <!-- rating init -->
    {{-- <script src="{{ asset('assets') }}/js/pages/rating.init.js"></script> --}}
    <script>
        $('#btn-ganti-kurir').on('click', function() {
            CheckOngkir();
        })

        getOngkir();
        var options = {
            starSize: 18,
            max_value: 5,
            step_size: 0.5,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: false,
            change_once: false,
            additional_data: {}, // Additional data to send to the server
        }

        $(".rater-product").rate(options);

        $('.rater-product').on('afterChange', function(ev, data) {
            var id = $(this).data('id');
            $('#rating-' + id).val(data.to);
        })

        function CheckOngkir() {
            $('#expedition').html(
                '<div class="row"><div class="col-12 text-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div></div>'
            );

            let token = $("meta[name='csrf-token']").attr("content");
            // var data = $(this).serialize();

            let origin = $('[name="origin"]').val();
            let weight = $('[name="total_weight"]').val();
            let destination = $('[name="destination"]').val();
            let courier = 'jne:pos:tiki:jnt:anteraja:sicepat:ninja';
            // let courier = 'jne';

            $.ajax({
                type: "GET",
                url: "{{ route('ongkir.check') }}",
                // cache: false,
                data: {
                    _token: token,
                    origin: origin,
                    destination: destination,
                    courier: courier,
                    weight: weight,
                },
                async: false,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // $("meta[name='csrf-token']").attr("content", data.token); // Nw Token
                    var expedition = '';

                    $.each(data, function(i, val) {
                        if (val.code == "J&T") {
                            val.code = "jnt";
                        }

                        if (data[i]['costs'].length > 0) {
                            $.each(data[i]['costs'], function(ins, vals) {
                                // console.log(vals);
                                var label = "";
                                if (vals.cost[0].etd == "") {
                                    label = "Belum Diketahui";
                                } else if (vals.cost[0].etd.includes("HARI") || vals
                                    .cost[0].etd.includes("Hari") || vals.cost[0]
                                    .etd.includes("hari")) {
                                    label = vals.cost[0].etd;
                                } else {
                                    label = vals.cost[0].etd + " Hari";
                                }

                                expedition += '<option id="' + val.code + '-' + vals
                                    .service +
                                    '" data-code="' +
                                    val.code + '" name="courier" data-service="' + vals
                                    .service +
                                    '" data-ongkir="' +
                                    vals.cost[0].value +
                                    '">' + val.code.toUpperCase() + '-' + vals.service +
                                    '</option>';
                                // couriers +=
                                //     '<div class="form-check card-radio">' +
                                //     '           <input id="' + val.code + '-' + vals
                                //     .service +
                                //     '" name="courier" type="radio" data-code="' +
                                //     val.code + '" data-service="' + vals.service +
                                //     '" data-ongkir="' +
                                //     vals.cost[0].value +
                                //     '" class="form-check-input">' +
                                //     '           <label class="form-check-label" for="' +
                                //     val.code + '-' + vals.service + '">' +
                                //     '               <span class="fs-15 float-end mt-2 text-wrap d-block fw-semibold">' +
                                //     vals.cost[0].value + '</span>' +
                                //     '               <span class="fs-14 mb-1 text-wrap d-block fw-bold">' +
                                //     vals.service + '</span>' +
                                //     '               <span class="text-muted fw-normal text-wrap d-block">' +
                                //     label + '</span>' +
                                //     '           </label>' +
                                //     '       </div>';
                            });
                        }
                    });

                    $('#expedition').html('<select class="form-control" id="courier">' + expedition +
                        '</select>');
                }
            });

            $('#courier').change(function() {
                var expedition = $('[name="courier"]:checked').attr('data-code');
                var expedition_service = $('[name="courier"]:checked').attr('data-service');

                $('[name="expedition"]').val(expedition);
                $('[name="expedition_service"]').val(expedition_service);
            })

            // return false;
        }

        function getOngkir() {
            var code = "{!! $order->deliverydetail->expedition !!}";
            var resi = "{{ $order->deliverydetail->resi_number }}"

            // console.log(resi + ' ' + code);
            if (resi != "") {
                $.ajax({
                    type: "get",
                    url: "{{ url('resi/check') }}/" + resi + "/" + code,
                    dataType: "JSON",
                    success: function(response) {
                        var html = '';
                        $.each(response.rajaongkir, function(i, val) {
                            if (val.code == 400) {
                                html += '<h6 class="mb-1">Resi Number Not Valid</h6>';
                            } else {
                                $.each(val.manifest, function(key, valn) {
                                    html += '<h6 class="mb-1">' + valn.manifest_description +
                                        ' (' + valn.city_name +
                                        ')</h6><p class="text-muted mb-2">' + valn
                                        .manifest_date +
                                        ' ' +
                                        valn.manifest_time +
                                        '</p>';
                                });
                            }

                        });

                        $('#manifest').html(html);
                    }
                });
            }
        }
    </script>
@endsection
