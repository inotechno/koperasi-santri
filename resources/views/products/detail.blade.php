@extends('layout-app.app')
@section('css')
    <link href="{{ url('assets') }}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <style>
        .swiper-slide {
            max-width: 500px;
            max-height: 500px;
            display: block;
            text-align: center;
            overflow: hidden;
        }

        .swiper-slide .img-display {
            max-width: 400px;
            max-height: 400px;
            margin: 0 auto;

        }

        .swiper-slide .img-mini-display {
            max-width: 80px;
            max-height: 75px;
            margin: 0px;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Product Details</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper">
                                        @if ($product->image1 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image1) }}"
                                                    alt="" class="img-fluid img-display d-block" />
                                            </div>
                                        @endif

                                        @if ($product->image2 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image2) }}"
                                                    alt="" class="img-fluid img-display d-block" />
                                            </div>
                                        @endif

                                        @if ($product->image3 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image3) }}"
                                                    alt="" class="img-fluid img-display d-block" />
                                            </div>
                                        @endif

                                        @if ($product->image4 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image4) }}"
                                                    alt="" class="img-fluid img-display d-block" />
                                            </div>
                                        @endif

                                        @if ($product->image5 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image5) }}"
                                                    alt="" class="img-fluid img-display d-block" />
                                            </div>
                                        @endif
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <!-- end swiper thumbnail slide -->
                                <div class="swiper product-nav-slider mt-2">
                                    <div class="swiper-wrapper">
                                        @if ($product->image1 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image1) }}"
                                                    alt="" class="img-mini-display img-fluid d-block" />
                                            </div>
                                        @endif
                                        @if ($product->image2 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image2) }}"
                                                    alt="" class="img-mini-display img-fluid d-block" />
                                            </div>
                                        @endif
                                        @if ($product->image3 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image3) }}"
                                                    alt="" class="img-mini-display img-fluid d-block" />
                                            </div>
                                        @endif
                                        @if ($product->image4 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image4) }}"
                                                    alt="" class="img-mini-display img-fluid d-block" />
                                            </div>
                                        @endif
                                        @if ($product->image5 != null)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/product_images/' . $product->image5) }}"
                                                    alt="" class="img-mini-display img-fluid d-block" />
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- end swiper nav slide -->
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{ $product->title }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div><a href="#"
                                                    class="text-primary d-block">{{ $product->product_sub_category->name }}</a>
                                            </div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Seller : <span
                                                    class="text-body fw-medium">{{ $product->store->name }}</span>
                                            </div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Published : <span
                                                    class="text-body fw-medium">{{ $product->tanggal_publish }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="flex-shrink-0">
                                        <div>
                                            <a href="apps-ecommerce-add-product.html" class="btn btn-light"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                    class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                    <div class="d-block text-warning rater-product"
                                        data-rate-value="{{ $product->avg_rate }}">
                                    </div>
                                    <div class="text-muted">( {{ $product->total_rate }} Customer Review )</div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-1">
                                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Price :</p>
                                                    <h6 class="mb-0">Rp {{ number_format($product->price) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-1">
                                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                                        <i class="ri-file-copy-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Orders :</p>
                                                    <h6 class="mb-0">{{ $product->orderitem->count() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-1">
                                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                                        <i class="ri-stack-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Stock :</p>
                                                    <h6 class="mb-0">{{ $product->stock }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-1">
                                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                                        <i class="ri-inbox-archive-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Diproses :</p>
                                                    <h6 class="mb-0">{{ $product->process_time }} Hari</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                {{-- <div class="row">
                                    <div class="col-xl-6">
                                        <div class=" mt-4">
                                            <h5 class="fs-14">Sizes :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Out of Stock">
                                                    <input type="radio" class="btn-check" name="productsize-radio"
                                                        id="productsize-radio1" disabled>
                                                    <label
                                                        class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                        for="productsize-radio1">S</label>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="04 Items Available">
                                                    <input type="radio" class="btn-check" name="productsize-radio"
                                                        id="productsize-radio2">
                                                    <label
                                                        class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                        for="productsize-radio2">M</label>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="06 Items Available">
                                                    <input type="radio" class="btn-check" name="productsize-radio"
                                                        id="productsize-radio3">
                                                    <label
                                                        class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                        for="productsize-radio3">L</label>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Out of Stock">
                                                    <input type="radio" class="btn-check" name="productsize-radio"
                                                        id="productsize-radio4" disabled>
                                                    <label
                                                        class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                        for="productsize-radio4">XL</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-6">
                                        <div class=" mt-4">
                                            <h5 class="fs-14">Colors :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Out of Stock">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-primary"
                                                        disabled>
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="03 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="03 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="02 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="01 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-warning">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="04 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="03 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="04 Items Available">
                                                    <button type="button"
                                                        class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-dark">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div> --}}
                                <!-- end row -->

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-16">Description :</h5>
                                    <p class="text-justify fs-14">{!! $product->description !!}</p>
                                </div>

                                <div class="row">
                                    <div class="col-md d-flex">
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit"
                                                class="btn btn-outline-primary waves-effect waves-light m-2">
                                                <i class="ri-shopping-cart-2-line ri-lg"></i> Checkout
                                            </button>
                                        </form>
                                        <form action="{{ route('wishlist.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit"
                                                class="btn btn-outline-warning waves-effect waves-light m-2">
                                                <i class="ri-heart-line ri-lg"></i> Wishlist
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Features :</h5>
                                            <ul class="list-unstyled">
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    Full Sleeve</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    Cotton</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    All Sizes available</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    4 Different Color</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Services :</h5>
                                            <ul class="list-unstyled product-desc-list">
                                                <li class="py-1">10 Days Replacement</li>
                                                <li class="py-1">Cash on Delivery available</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="product-content mt-5">
                                    <h5 class="fs-14 mb-3">Product Description :</h5>
                                    <nav>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab"
                                                    href="#nav-speci" role="tab" aria-controls="nav-speci"
                                                    aria-selected="true">Specification</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab"
                                                    href="#nav-detail" role="tab" aria-controls="nav-detail"
                                                    aria-selected="false">Deskripsi Toko</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nav-chat-tab" data-bs-toggle="tab"
                                                    href="#nav-chat" role="tab" aria-controls="nav-chat"
                                                    aria-selected="false">Kirim Pesan</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel"
                                            aria-labelledby="nav-speci-tab">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 200px;">
                                                                Category</th>
                                                            <td>{{ $product->product_sub_category->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Berat</th>
                                                            <td>{{ $product->weight }} Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Panjang</th>
                                                            <td>{{ $product->long }} Cm</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Lebar</th>
                                                            <td>{{ $product->width }} Cm</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tinggi</th>
                                                            <td>{{ $product->tall }} Cm</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                            aria-labelledby="nav-detail-tab">
                                            <div>
                                                <h5 class="font-size-16 mb-3">{{ $product->store->name }}</h5>
                                                <p>{{ $product->store->description }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-chat" role="tabpanel"
                                            aria-labelledby="nav-chat-tab">
                                            <form id="form-chat" method="POST">
                                                <div>
                                                    <input type="hidden" name="to"
                                                        value="{{ $product->store->id }}">

                                                    <h5 class="font-size-16 mb-3">Kirim Pesan</h5>
                                                    <small>* Berikan url produk agar lebih jelas</small>
                                                    <div class="form-group mb-2">
                                                        <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-content -->

                                <div class="mt-5">
                                    <div>
                                        <h5 class="fs-14 mb-3">Ratings & Reviews</h5>
                                    </div>
                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="pb-3">
                                                    <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-block text-warning rater-product"
                                                                data-rate-value="{{ $product->avg_rate }}">
                                                            </div>
                                                            <div class="flex-shrink-0 mx-2">
                                                                <h6 class="mb-0">{{ $product->avg_rate }} out of 5</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="text-muted">Total <span class="fw-medium">5.50k</span>
                                                            reviews
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">5 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar"
                                                                        style="width: {{ $product->rate_5 != 0 ? ($product->rate_5 / $product->total_rate) * 100 : 0 }}%"
                                                                        aria-valuenow="{{ $product->rate_5 != 0 ? ($product->rate_5 / $product->total_rate) * 100 : 0 }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">{{ $product->rate_5 }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">4 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar"
                                                                        style="width: {{ $product->rate_4 != 0 ? ($product->rate_4 / $product->total_rate) * 100 : 0 }}%"
                                                                        aria-valuenow="{{ $product->rate_4 != 0 ? ($product->rate_4 / $product->total_rate) * 100 : 0 }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">{{ $product->rate_4 }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">3 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar"
                                                                        style="width: {{ $product->rate_3 != 0 ? ($product->rate_3 / $product->total_rate) * 100 : 0 }}%"
                                                                        aria-valuenow="{{ $product->rate_3 != 0 ? ($product->rate_3 / $product->total_rate) * 100 : 0 }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">{{ $product->rate_3 }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">2 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-warning"
                                                                        role="progressbar"
                                                                        style="width: {{ $product->rate_2 != 0 ? ($product->rate_2 / $product->total_rate) * 100 : 0 }}%"
                                                                        aria-valuenow="{{ $product->rate_2 != 0 ? ($product->rate_2 / $product->total_rate) * 100 : 0 }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">{{ $product->rate_2 }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">1 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: {{ $product->rate_1 != 0 ? ($product->rate_1 / $product->total_rate) * 100 : 0 }}%"
                                                                        aria-valuenow="{{ $product->rate_1 != 0 ? ($product->rate_1 / $product->total_rate) * 100 : 0 }}"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">{{ $product->rate_1 }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">
                                                <div class="d-flex flex-wrap align-items-start gap-3">
                                                    <h5 class="fs-14">Reviews: </h5>
                                                </div>

                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach ($product->rating as $rate)
                                                            <li class="py-2">
                                                                <div class="border border-dashed rounded p-3">
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="hstack gap-3">
                                                                            <div
                                                                                class="badge rounded-pill bg-success mb-0">
                                                                                <i class="mdi mdi-star"></i>
                                                                                {{ $rate->nilai }}
                                                                            </div>
                                                                            <div class="vr"></div>
                                                                            <div class="flex-grow-1">
                                                                                <p class="text-muted mb-0">
                                                                                    {{ $rate->catatan }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex align-items-end">
                                                                        <div class="flex-grow-1">
                                                                            <h5 class="fs-14 mb-0">
                                                                                {{ $rate->order->user->name }}
                                                                            </h5>
                                                                        </div>

                                                                        <div class="flex-shrink-0">
                                                                            <p class="text-muted fs-13 mb-0">
                                                                                {{ $rate->created_at }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('plugin')
    <!--Swiper slider js-->
    <script src="{{ url('assets') }}/libs/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('assets') }}/js/pages/ecommerce-product-details.init.js"></script>

    <script>
        $('#form-chat').submit(function() {
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            var message = $('#form-chat [name="message"]').val();
            var to = $('#form-chat [name="to"]').val();

            $.ajax({
                type: "POST",
                url: "{{ route('chat.send') }}",
                data: {
                    _token: csrf_token,
                    to: to,
                    message: message
                },
                dataType: "JSON",
                success: function(response) {
                    location.reload();
                }
            });

            return false;
        })
    </script>

    <!-- rater-js plugin -->
    <script src="{{ asset('assets') }}/js/rater.min.js"></script>
    <!-- rating init -->
    {{-- <script src="{{ asset('assets') }}/js/pages/rating.init.js"></script> --}}
    <script>
        var options = {
            max_value: 5,
            step_size: 0.5,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: true,
            change_once: false, // Determines if the rating can only be set once
            ajax_method: 'POST',
            url: 'http://localhost/test.php',
            additional_data: {} // Additional data to send to the server
        }

        $(".rater-product").rate(options);
    </script>
@endsection
