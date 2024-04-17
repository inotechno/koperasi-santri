@extends('layout-app.app')
@section('css')
    <style lang="scss">
        .select2-container--default .select2-selection--single {
            height: 40px !important;
            padding: 5px 5px;
            font-size: 14px;
            line-height: 1.50;
            border-radius: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 75% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Checkout</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body checkout-tab">

                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                        <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                            {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-info" type="button" role="tab"
                                        aria-controls="pills-bill-info" aria-selected="true">
                                        <i
                                            class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                        Personal Info
                                    </button>
                                </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3 active" id="pills-bill-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bill-address" type="button" role="tab"
                                    aria-controls="pills-bill-address" aria-selected="false">
                                    <i
                                        class="ri-truck-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                    Shipping Info
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-payment" type="button" role="tab"
                                    aria-controls="pills-payment" aria-selected="false">
                                    <i
                                        class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                    Payment Info
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-finish-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-finish" type="button" role="tab"
                                    aria-controls="pills-finish" aria-selected="false">
                                    <i
                                        class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                    Finish
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        {{-- <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Billing Information</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="billinginfo-firstName"
                                                    placeholder="Enter first name" value="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="billinginfo-lastName"
                                                    placeholder="Enter last name" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-email" class="form-label">Email
                                                    <span class="text-muted">(Optional)</span></label>
                                                <input type="email" class="form-control" id="billinginfo-email"
                                                    placeholder="Enter email">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="billinginfo-phone"
                                                    placeholder="Enter phone no.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="billinginfo-address" class="form-label">Address</label>
                                        <textarea class="form-control" id="billinginfo-address" placeholder="Enter address" rows="3"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" id="country" data-plugin="choices">
                                                    <option value="">Select Country...</option>
                                                    <option selected>United States</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">State</label>
                                                <select class="form-select" id="state" data-plugin="choices">
                                                    <option value="">Select State...</option>
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="American Samoa">American Samoa
                                                    </option>
                                                    <option value="California" selected>California
                                                    </option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="District Of Columbia">District Of
                                                        Columbia</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="zip" class="form-label">Zip Code</label>
                                                <input type="text" class="form-control" id="zip"
                                                    placeholder="Enter zip code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 mt-3">
                                        <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                            data-nexttab="pills-bill-address-tab">
                                            <i class="ri-truck-line label-icon align-middle fs-16 ms-2"></i>Proceed
                                            to Shipping
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                        <!-- end tab pane -->

                        <div class="tab-pane fade show active" id="pills-bill-address" role="tabpanel"
                            aria-labelledby="pills-bill-address-tab">
                            <div>
                                <h5 class="mb-1">Shipping Information</h5>
                                <p class="text-muted mb-4">Please fill all information below</p>
                            </div>

                            <div class="mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-14 mb-0">Saved Address</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal"
                                            data-bs-target="#addAddressModal">
                                            Add Address
                                        </button>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    @foreach ($address as $add)
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-check card-radio">
                                                <input id="destination{{ $add->subdistrict_id }}"
                                                    value="{{ $add->subdistrict_id }}" data-id="{{ $add->id }}"
                                                    name="destination" type="radio" class="form-check-input"
                                                    @if ($add->primary_address == 'on') checked @endif>
                                                <label class="form-check-label" for="destination{{ $add->subdistrict_id }}">

                                                    <span class="fs-14 mb-2 d-block">{{ $add->name }}
                                                        ({{ $add->phone }})
                                                    </span>
                                                    <span
                                                        class="text-muted fw-normal text-wrap mb-1 d-block">{{ $add->subdistrict->city->province->province_name . ', ' . $add->subdistrict->city->city_name . ', ' . $add->subdistrict->subdistrict_name }}</span>
                                                    <span class="text-muted fw-normal d-block">{{ $add->address_line1 }},
                                                        {{ $add->address_line2 }}</span>
                                                    <span
                                                        class="text-muted fw-normal d-block">{{ $add->subdistrict->city->postal_code }}</span>
                                                </label>
                                            </div>
                                            <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                                <div>
                                                    <a href="#" data-id="{{ $add->id }}"
                                                        class="d-block text-body p-1 px-2 btn-edit">
                                                        <i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                                        Edit</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="d-block text-body p-1 px-2 btn-remove"
                                                        data-id="{{ $add->id }}"><i
                                                            class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                        Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-4">
                                    <h5 class="fs-14 mb-3">Shipping Method
                                        <!-- Accordions with Icons -->
                                        <div class="accordion custom-accordionwithicon row" id="expedition">
                                        </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                    data-nexttab="pills-payment-tab"><i
                                        class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Continue
                                    to Payment</button>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                            aria-labelledby="pills-payment-tab">
                            <div>
                                <h5 class="mb-1">Payment Selection</h5>
                                <p class="text-muted mb-4">Silahkan pilih metode pembayaran yang anda inginkan.</p>
                            </div>

                            <div class="row g-2 masonry" id="list-payment-method">

                            </div>

                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-light btn-label previestab"
                                    data-previous="pills-bill-address-tab"><i
                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                    to Shipping</button>
                                <button type="button" data-bs-toggle="modal" id="btn-checkout"
                                    data-bs-target="#checkoutModal"
                                    class="btn btn-primary btn-label right ms-auto nexttab"
                                    data-nexttab="pills-finish-tab"><i
                                        class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                                    Order</button>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
                            <div class="text-center py-5">

                                <div class="mb-4">
                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                        colors="primary:#695eef,secondary:#73dce9" style="width:120px;height:120px">
                                    </lord-icon>
                                </div>
                                <h5>Thank you ! Your Order is Completed !</h5>
                                <p class="text-muted">You will receive an order confirmation email
                                    with details of your order.</p>

                                <h3 class="fw-semibold">Order ID: <span id="order_id"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Order Summary</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 90px;" scope="col">Product</th>
                                    <th scope="col">Product Info</th>
                                    <th scope="col" style="width: 110px;" class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                    $total_weight = 0;
                                    $origin = 0;
                                @endphp

                                @foreach ($cart as $key => $item)
                                    @php
                                        $total_weight += $item->product->weight;
                                        $subtotal += $item->product->price * $item->quantity;
                                        $origin = $item->subdistrict[0]->subdistrict_id;
                                        $address_from = $item->subdistrict[0]->id;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="avatar-md bg-light rounded p-1">
                                                <img src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                                                    alt="{{ $item->product->slug }}" class="img-fluid d-block">
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-14"><a href="apps-ecommerce-product-details.html"
                                                    class="text-dark">{{ $item->product->title }}</a></h5>
                                            <p class="text-muted mb-0">Rp {{ number_format($item->product->price) }} x
                                                {{ $item->quantity }}</p>
                                        </td>
                                        <td class="text-end">Rp
                                            {{ number_format($item->product->price * $item->quantity) }}</td>
                                    </tr>
                                    <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                                    <input type="hidden" name="product_id[]" value="{{ $item->product_id }}">
                                    <input type="hidden" name="title[]" value="{{ $item->product->title }}">
                                    <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                @endforeach

                                <input type="hidden" name="total_weight" value="{{ $total_weight }}">
                                <input type="hidden" name="origin" value="{{ $origin }}">
                                <input type="hidden" name="address_from" value="{{ $address_from }}">
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                @if (!empty($voucher))
                                    <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">
                                    <input type="hidden" name="voucher_type_slug"
                                        data-nominal="{{ $voucher->discount_nominal }}"
                                        data-percentage="{{ $voucher->discount_percentage }}"
                                        data-max-disc="{{ $voucher->max_discount }}" value="{{ $voucher->type->slug }}">
                                @endif
                                <tr>
                                    <td class="fw-semibold" colspan="2">Sub Total :</td>
                                    <td class="fw-semibold text-end">Rp {{ number_format($subtotal) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Shipping Charge :</td>
                                    <td class="text-end">Rp <span id="total_ongkir">0</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Fee :</td>
                                    <td class="text-end">Rp <span id="total_fee">0</span></td>
                                </tr>
                                @if (!empty($voucher))
                                    @if ($voucher->type->slug == 'potongan_harga')
                                        @php
                                            $disc = 0;
                                            if ($voucher->discount_percentage != null) {
                                                $total_disc = ($voucher->discount_percentage / 100) * $subtotal;
                                                if ($total_disc > $voucher->max_discount) {
                                                    $disc = $voucher->max_discount;
                                                } else {
                                                    $disc = $total_disc;
                                                }
                                            } else {
                                                $disc = $voucher->discount_nominal;
                                            }
                                        @endphp
                                        <tr>
                                            <td colspan="2">Discount :</td>
                                            <td class="text-end">Rp {{ $disc }}</td>
                                        </tr>
                                        <input type="hidden" name="discount_price" value="{{ $disc }}">
                                    @endif
                                @endif
                                <tr>
                                    <td colspan="2">Estimated Tax (11%): </td>
                                    <td class="text-end">Rp <span id="ppn">0</span></td>
                                </tr>
                                <tr class="table-active">
                                    <th colspan="2">Total (IDR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold">
                                            Rp <span id="total"></span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


    <!-- editItemModal -->
    <form method="POST" id="form-add-address">
        <div id="addAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAddressModalLabel">Tambah Alamat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. HP</label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Nomor Telepon" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="province_id">Provinsi</label>
                            <select name="province_id" class="form-control @error('province_id') is-invalid @enderror"
                                id="province_id" value="{{ old('province_id') }}">
                                <option></option>
                            </select>
                            @error('province_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city_id">Kota</label>
                            <select name="city_id" class="form-control @error('city_id') is-invalid @enderror"
                                id="city_id" value="{{ old('city_id') }}">
                                <option></option>
                            </select>
                            @error('city_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subdistrict_id">Kecamatan</label>
                            <select name="subdistrict_id"
                                class="form-control @error('subdistrict_id') is-invalid @enderror" id="subdistrict_id"
                                value="{{ old('subdistrict') }}">
                                <option value=""></option>
                            </select>
                            @error('subdistrict_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Alamat Utama</label>
                            <textarea name="address_line1" class="form-control @error('address_line1') is-invalid @enderror" id="address_line1"
                                placeholder="Nama Jalan, Gedung, Komplek Dll" rows="2">{{ old('address_line1') }}</textarea>
                            @error('address_line1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Alamat Lanjutan</label>
                            <textarea name="address_line2" class="form-control @error('address_line2') is-invalid @enderror" id="address_line2"
                                placeholder="RT, RW No Rumah" rows="2">{{ old('address_line2') }}</textarea>
                            @error('address_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            @hasrole('customer')
                                <div class="col-md">
                                    <label for="primary_address" class="form-label">Alamat Utama</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="primary_address" id="primary_address">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            @hasrole('seller')
                                <div class="col-md">
                                    <label for="store_address" class="form-label">Alamat Toko</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="store_address"
                                            id="store_address">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole
                            {{-- <div class="col-md">
                                <label for="return_address" class="form-label">Alamat Pengembalian</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="return_address"
                                        id="return_address">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <form method="POST" id="form-update-address">
        <div id="editAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="editAddressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">Ubah Alamat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Penerima</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nama Penerima">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. HP</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Nomor Telepon">
                        </div>

                        <div class="mb-3">
                            <label for="province_id_update">Provinsi</label>
                            <select name="province_id" class="form-control" id="province_id_update">
                                <option></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="city_id_update">Kota</label>
                            <select name="city_id" class="form-control" id="city_id_update">
                                <option></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subdistrict_id_update">Kecamatan</label>
                            <select name="subdistrict_id" class="form-control" id="subdistrict_id_update">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Alamat Utama</label>
                            <textarea name="address_line1" class="form-control" id="address_line1" placeholder="Nama Jalan, Gedung, Komplek Dll"
                                rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Alamat Lanjutan</label>
                            <textarea name="address_line2" class="form-control" id="address_line2" placeholder="RT, RW No Rumah"
                                rows="2"></textarea>
                            @error('address_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            @hasrole('customer')
                                <div class="col-md">
                                    <label for="primary_address_update" class="form-label">Alamat Utama</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="primary_address" id="primary_address_update">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            @hasrole('seller')
                                <div class="col-md">
                                    <label for="store_address_update" class="form-label">Alamat Toko</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="store_address"
                                            id="store_address_update">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            {{-- <div class="col-md">
                                <label for="return_address_update" class="form-label">Alamat Pengembalian</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="return_address"
                                        id="return_address_update">
                                    </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <!-- removeItemModal -->
    <form method="POST" id="form-delete-address">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('DELETE')
        <input type="hidden" name="id">
        <div id="removeAddressModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this address ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger ">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <form action="" id="form-checkout" method="POST">
        <div id="checkoutModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                            <h4 class="mb-3 mt-4">Langkah Akhir</h4>
                            <p class="text-muted fs-15 mb-4">Apakah anda sudah yakin dan ingin
                                menyelesaikan transaksi ?</p>
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
@endsection

@section('plugin')
    {{-- <script src="{{ asset('assets') }}/js/pages/ecommerce-product-checkout.init.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Masonry plugin -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $(document).ready(function() {
            var _total_weight = 0;
            var _total_ongkir = 0;
            var _discount_price = $('[name="discount_price"]').val();
            var _subtotal = $('[name="subtotal"]').val();
            var _total = 0;
            var _ppn = 0;
            var _fee = 0;

            HitungTotal();
            CheckOngkir();

            $('[name="destination"]').on('change', function() {
                CheckOngkir();
            })

            $('#expedition').on('change', '[name="courier"]', function() {
                var disc = 0;
                if ($('[name="voucher_type_slug"]').val() == "potongan_ongkir") {
                    var max_discount = $('[name="voucher_type_slug"]').data('max-disc');
                    var nominal = $('[name="voucher_type_slug"]').data('nominal');
                    var percentage = $('[name="voucher_type_slug"]').data('percentage');

                    if (nominal != "") {
                        disc = parseInt(nominal);
                    }

                    if (percentage != "") {
                        var disc_percent = (percentage / 100) * $(this).attr('data-ongkir');
                        // console.log(disc_percent)
                        if (disc_percent > max_discount) {
                            disc = parseInt(max_discount);
                        } else {
                            disc = parseInt(disc_percent);
                        }
                    }
                }
                _total_ongkir = parseInt($(this).attr('data-ongkir')) - parseInt(disc);
                if (_total_ongkir < 0) {
                    _total_ongkir = 0;
                }
                // console.log(_total_ongkir);
                if (disc != 0) {
                    $('#total_ongkir').html(_total_ongkir + ' ( <s class="text-small">' + $(this).data(
                        'ongkir') + '</s> )');
                } else {
                    $('#total_ongkir').html(_total_ongkir);
                }
                HitungTotal();
            });

            $('#pills-bill-address .nexttab').on('click', function() {
                var next = $(this).attr('data-nexttab');
                if (!$('[name="courier"]').is(':checked')) {
                    Swal.fire({
                        html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Something went Wrong !</h4><p class="text-muted mx-4 mb-0">Pilih jasa pengiriman terlebih dahulu !</p></div></div>',
                        showCancelButton: !0,
                        showConfirmButton: !1,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Back",
                        buttonsStyling: !1,
                        showCloseButton: !0,
                        timer: 1000
                    });
                } else {
                    $('#pills-bill-address-tab').addClass('done');
                    $('#pills-bill-address-tab').removeClass('active');

                    $('#pills-bill-address').removeClass('show active');

                    // $('#' + next).addClass('active');
                    $('#pills-payment-tab').click();
                    GetPaymentMethod();
                }
            });

            $('#pills-payment .previestab').on('click', function() {
                // $('#pills-payment-tab').addClass('done');
                $('#pills-payment-tab').removeClass('active');

                $('#pills-payment').removeClass('show active');

                // $('#' + next).addClass('active');
                $('#pills-bill-address-tab').click();

                $('.masonry').masonry('destroy');
                $('.masonry').removeData('masonry');
            });

            function GetPaymentMethod(nominal = 0) {
                let token = $("meta[name='csrf-token']").attr("content");
                $('#list-payment-method').html(
                    '<div class="row"><div class="col-12 text-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div></div>'
                );

                nominal = _total;

                $.ajax({
                    type: "GET",
                    url: "{{ route('payment.method') }}",
                    data: {
                        _token: token,
                        nominal: nominal
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);

                        var html = '';
                        $.each(data, function(i, v) {
                            html += '<div class="col-lg-4 col-sm-6 masonry-item">' +
                                '       <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show" aria-expanded="false" aria-controls="paymentmethodCollapse">' +
                                '           <div class="form-check card-radio ">' +
                                '               <input data-fee="' + v.fee + '" id="' + v.code +
                                '" name="payment_method" data-name="' + v.name +
                                '" type="radio" class="form-check-input" value="' +
                                v.code + '">' +
                                '               <label class="form-check-label d-flex align-items-center" for="' +
                                v.code + '">' +
                                '                   <div class="flex-shrink-0">' +
                                '                       <img src="' + v.image +
                                '" width="80" class="img-fluid" alt="">' +
                                '                   </div>' +
                                '                   <span class="fs-14 text-wrap flex-grow-1 ms-3">' +
                                v.name + '</span>' +
                                '               </label>' +
                                '           </div>' +
                                '       </div>' +
                                '   </div>';
                        });

                        $('#list-payment-method').html(html);
                        $('.masonry').masonry({
                            // options
                            percentPosition: true,
                            itemSelector: '.masonry-item',
                        });


                        $('[name="payment_method"]').on('change', function() {
                            _fee = $(this).attr('data-fee');
                            // console.log(_fee);
                            $('#total_fee').html(_fee);
                            HitungTotal();
                        });

                    }
                });


                return false;
            }

            function CheckOngkir() {
                $('#expedition').html(
                    '<div class="row"><div class="col-12 text-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div></div>'
                );

                let token = $("meta[name='csrf-token']").attr("content");
                // var data = $(this).serialize();

                let origin = $('[name="origin"]').val();
                let weight = $('[name="total_weight"]').val();
                let destination = $('[name="destination"]:checked').val();
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
                        var expedition = '';
                        // $("meta[name='csrf-token']").attr("content", data.token); // Nw Token

                        $.each(data, function(i, val) {
                            if (val.code == "J&T") {
                                val.code = "jnt";
                            }

                            if (data[i]['costs'].length > 0) {
                                var couriers = '';
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
                                    couriers +=
                                        '<div class="form-check card-radio">' +
                                        '           <input id="' + val.code + '-' + vals
                                        .service +
                                        '" name="courier" type="radio" data-code="' +
                                        val.code + '" data-service="' + vals.service +
                                        '" data-ongkir="' +
                                        vals.cost[0].value +
                                        '" class="form-check-input">' +
                                        '           <label class="form-check-label" for="' +
                                        val.code + '-' + vals.service + '">' +
                                        '               <span class="fs-15 float-end mt-2 text-wrap d-block fw-semibold">' +
                                        vals.cost[0].value + '</span>' +
                                        '               <span class="fs-14 mb-1 text-wrap d-block fw-bold">' +
                                        vals.service + '</span>' +
                                        '               <span class="text-muted fw-normal text-wrap d-block">' +
                                        label + '</span>' +
                                        '           </label>' +
                                        '       </div>';
                                });

                                expedition += '<div class="col-md-4" id="' + val.code + '">' +
                                    '        <div class="card">' +
                                    '            <div class="card-header"  data-bs-toggle="collapse" href="#' +
                                    val.code +
                                    '1" role="button" aria-expanded="false" aria-controls="' +
                                    val
                                    .code + '1">' +
                                    '                <div class="d-flex align-items-center">' +
                                    '                    <div class="flex-grow-1">' +
                                    '                        <h6 class="card-title mb-0">' + val
                                    .code.toUpperCase() + '</h6>' +
                                    '                    </div>' +
                                    '                    <div class="flex-shrink-0">' +
                                    '                        <ul class="list-inline card-toolbar-menu d-flex align-items-center mb-0">' +
                                    '                            <li class="list-inline-item">' +
                                    '                               <a class="align-middle minimize-card" data-bs-toggle="collapse" href="#' +
                                    val.code +
                                    '1" role="button" aria-expanded="false" aria-controls="' +
                                    val
                                    .code + '1">' +
                                    '                                   <i class="mdi mdi-plus align-middle plus"></i>' +
                                    '                                   <i class="mdi mdi-minus align-middle minus"></i>' +
                                    '                                </a>' +
                                    '                           </li>' +
                                    '                        </ul>' +
                                    '                    </div>' +
                                    '                </div>' +
                                    '            </div>' +
                                    '            <div class="card-body collapse show p-1" id="' +
                                    val.code + '1" style="">' +
                                    couriers +
                                    '            </div>' +
                                    '       </div>' +
                                    '    </div>';
                            }
                        });

                        $('#expedition').html(expedition);
                        _total_weight = weight;
                    }
                });

                // return false;
            }

            function HitungTotal() {
                var disc = 0;
                if ($('[name="voucher_type_slug"]').val() == "potongan_harga") {
                    disc = _discount_price;
                }
                // console.log(_discount_price);
                _ppn = 11 / 100 * (parseInt(_subtotal) + parseInt(_total_ongkir) + parseInt(_fee) - parseInt(
                    disc));
                _total = parseInt(_subtotal) + parseInt(_total_ongkir) + parseInt(_ppn) + parseInt(_fee) - parseInt(
                    disc);
                $('#ppn').html(_ppn);
                $('#total').html(_total);
            }

            $('#form-add-address').submit(function() {
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.address.create') }}",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // location.reload();
                        notification('error', error.responseJSON.message);
                    }
                });

                return false;
            })

            $('#form-update-address').submit(function() {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // location.reload();
                        notification('error', error.responseJSON.message);
                    }
                });

                return false;
            })

            $('#form-delete-address').submit(function() {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // location.reload();
                        notification('error', error.responseJSON.message);
                    }
                });

                return false;
            })

            $('.btn-edit').on('click', function() {
                var id = $(this).attr('data-id');
                $('#form-update-address').attr('action', "{{ url('address/update') }}/" + id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('address/show') }}/" + id,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $('#form-update-address [name="id"]').val(response.id);
                        $('#form-update-address [name="name"]').val(response.name);
                        $('#form-update-address [name="phone"]').val(response.phone);
                        $('#form-update-address [name="address_line1"]').html(response
                            .address_line1);
                        $('#form-update-address [name="address_line2"]').html(response
                            .address_line2);

                        if (response.primary_address === "on") {
                            $('#form-update-address [name="primary_address"]').prop(
                                'checked',
                                true);
                        }

                        if (response.store_address === "on") {
                            $('#form-update-address [name="store_address"]').prop(
                                'checked',
                                true);
                        }

                        if (response.return_address === "on") {
                            $('#form-update-address [name="return_address"]').prop(
                                'checked',
                                true);
                        }

                        $('#province_id_update').append('<option value="' + response
                            .subdistrict
                            .city.province.id + '" selected="selected">' + response
                            .subdistrict
                            .city.province.province_name + '</option>');

                        $('#city_id_update').append('<option value="' + response
                            .subdistrict
                            .city.id + '" selected="selected">' + response
                            .subdistrict
                            .city.city_name + '</option>');

                        $('#subdistrict_id_update').append('<option value="' + response
                            .subdistrict.id + '" selected="selected">' + response
                            .subdistrict.subdistrict_name +
                            '</option>');

                        $('#editAddressModal').modal('show');

                        // Select 2 Update
                        $("#province_id_update").select2({
                            dropdownParent: "#editAddressModal",
                            placeholder: 'Pilih Provinsi',
                            ajax: {
                                url: "{{ route('province') }}",
                                type: "post",
                                dataType: 'json',
                                delay: 250,
                                data: function(params) {
                                    return {
                                        _token: CSRF_TOKEN,
                                        search: params.term,
                                        // province_id: province_id
                                    };
                                },
                                processResults: function(response) {
                                    return {
                                        results: response
                                    };
                                },
                                cache: true
                            }
                        });

                        $('#province_id_update').on('change', function() {
                            $('#city_id_update').focus();
                            var province_id = $(this).val();
                            $("#city_id_update").select2({
                                dropdownParent: "#editAddressModal",
                                placeholder: 'Pilih Kota',
                                ajax: {
                                    url: "{{ route('city') }}",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            _token: CSRF_TOKEN,
                                            search: params.term,
                                            province_id: province_id
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }
                            });
                        });

                        $('#city_id_update').on('change', function() {
                            $('#subdistrict_update').focus();

                            var city_id = $(this).val();
                            $("#subdistrict_id_update").select2({
                                dropdownParent: "#editAddressModal",
                                placeholder: 'Pilih Kecamatan',
                                ajax: {
                                    url: "{{ route('subdistrict') }}",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            _token: CSRF_TOKEN,
                                            search: params.term,
                                            city_id: city_id
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }
                            });
                        })
                        // Select2 Update
                    }
                });

                return false;
            });

            $('.btn-remove').on('click', function() {
                var id = $(this).attr('data-id');
                $('#form-delete-address').attr('action', "{{ url('address/delete') }}/" + id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('address/show') }}/" + id,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $('#form-delete-address [name="id"]').val(response.id);
                        $('#removeAddressModal').modal('show');
                    }
                });

                return false;
            });

            $("#addAddressModal").on('show.bs.modal', function() {
                $("#province_id").select2({
                    dropdownParent: "#addAddressModal",
                    placeholder: 'Pilih Provinsi',
                    ajax: {
                        url: "{{ route('province') }}",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                _token: CSRF_TOKEN,
                                search: params.term,
                                // province_id: province_id
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });

                $('#province_id').on('change', function() {
                    $('#city_id').focus();
                    var province_id = $(this).val();
                    $("#city_id").select2({
                        dropdownParent: "#addAddressModal",
                        placeholder: 'Pilih Kota',
                        ajax: {
                            url: "{{ route('city') }}",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    _token: CSRF_TOKEN,
                                    search: params.term,
                                    province_id: province_id
                                };
                            },
                            processResults: function(response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        }
                    });
                });

                $('#city_id').on('change', function() {
                    $('#subdistrict').focus();

                    var city_id = $(this).val();
                    $("#subdistrict_id").select2({
                        dropdownParent: "#addAddressModal",
                        placeholder: 'Pilih Kecamatan',
                        ajax: {
                            url: "{{ route('subdistrict') }}",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    _token: CSRF_TOKEN,
                                    search: params.term,
                                    city_id: city_id
                                };
                            },
                            processResults: function(response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        }
                    });
                });
            });

            $('#form-checkout').submit(function() {

                let token = $("meta[name='csrf-token']").attr("content");

                var product_id = $('[name="product_id[]"]').map(function() {
                    return this.value;
                }).get();

                var title = $('[name="title[]"]').map(function() {
                    return this.value;
                }).get();

                var quantity = $('[name="quantity[]"]').map(function() {
                    return this.value;
                }).get();

                cart_id = $('[name="cart_id[]"]').map(function() {
                    return this.value;
                }).get();

                var payment_method = $('[name="payment_method"]:checked').val();
                var payment_name = $('[name="payment_method"]:checked').attr('data-name');
                var address_from = $('[name="address_from"]').val();
                var address_to = $('[name="destination"]').attr('data-id');
                var expedition = $('[name="courier"]:checked').attr('data-code');
                var expedition_service = $('[name="courier"]:checked').attr('data-service');
                var voucher = $('[name="voucher_id"]').val();

                if ($('[name="payment_method"]').is(":checked")) {
                    if (_total != 0) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('payment.process') }}",
                            data: {
                                _token: CSRF_TOKEN,
                                ongkir: _total_ongkir,
                                total_weight: _total_weight,
                                fee: _fee,
                                grand_total: _total,
                                ppn: _ppn,
                                disc: _discount_price,
                                product_id: product_id,
                                product_name: title,
                                quantity: quantity,
                                cart_id: cart_id,
                                payment_method: payment_method,
                                payment_name: payment_name,
                                address_from: address_from,
                                address_to: address_to,
                                expedition: expedition,
                                expedition_service: expedition_service,
                                voucher: voucher
                            },
                            dataType: "JSON",
                            // async: false,
                            beforeSend: function() {
                                $('#form-checkout button[type=submit]').prop('disabled', true);
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.response == 200) {
                                    $('#checkoutModal').modal('hide');

                                    $('#pills-payment-tab').addClass('done');
                                    $('#pills-payment-tab').removeClass('active');

                                    $('#pills-payment').removeClass('show active');

                                    // $('#' + next).addClass('active');
                                    $('#pills-finish-tab').click();

                                    $('#order_id').html(response.order.order_number);
                                    setTimeout(() => {
                                        location.href = "{{ url('order/detail') }}/" +
                                            response.order.order_number;
                                    }, 300);
                                }

                            }
                        });

                    }

                } else {
                    Swal.fire({
                        html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Something went Wrong !</h4><p class="text-muted mx-4 mb-0">Pilih metode pembayaran terlebih dahulu !</p></div></div>',
                        showCancelButton: !0,
                        showConfirmButton: !1,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Back",
                        buttonsStyling: !1,
                        showCloseButton: !0,
                        timer: 1000
                    });

                    $('#checkoutModal').modal('hide');
                }

                return false;

            });
        });
    </script>
@endsection
