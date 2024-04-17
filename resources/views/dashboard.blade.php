@extends('layout-app.app')

@section('content')
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Penting hari ini</h4>
                                    <p class="text-muted mb-0">Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli
                                    </p>
                                </div>
                            </div><!-- end card header -->
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>

                <div class="row mt-3">
                    <div class="col-xl-3 col-md-6">

                        <div class="card card-height-100 card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                            <i class="bx bxs-user-account"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold text-muted mb-3">Produk</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value"
                                                data-target="{{ $product }}">{{ $product }}</span></h4>
                                        <a href="{{ url('seller/products') }}" class="mb-0">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>

                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-height-100 card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                            <i class="ri-bar-chart-box-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold text-muted mb-3">Transaksi</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value"
                                                data-target="{{ $order }}">{{ $order }}</span></h4>
                                        <a href="{{ route('seller.order') }}" class="mb-0">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>

                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-height-100 card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                            <i class="ri-chat-1-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold text-muted mb-3">Chat Baru</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value"
                                                data-target="{{ $chat }}">{{ $chat }}</span></h4>
                                        <a href="{{ route('chat') }}" class="mb-0">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>

                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-height-100 card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                            <i class="ri-bar-chart-box-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold text-muted mb-3">Ulasan</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value"
                                                data-target="{{ $rating }}">{{ $rating }}</span></h4>
                                        <a href="{{ route('seller.rating') }}" class="mb-0">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>

                    </div>
                </div> <!-- end row-->

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Analisa Toko & Produkmu</h4>
                                    <p class="text-muted mb-0">Supaya jualan makin semangat dan lancar
                                    </p>
                                </div>
                            </div><!-- end card header -->
                        </div><!-- end card header -->
                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Statistik Tokomu</h4>
                                <div>
                                    <button type="button" class="btn btn-soft-secondary btn-sm">
                                        7D
                                    </button>
                                    <button type="button" class="btn btn-soft-secondary btn-sm">
                                        1M
                                    </button>
                                    <button type="button" class="btn btn-soft-secondary btn-sm">
                                        1Y
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-header p-0 border-0 bg-soft-light">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">Rp <span class="counter-value"
                                                    data-target="200000">200000</span>
                                            </h5>
                                            <p class="text-muted mb-0">Potensi Penjualan</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            {{-- <h5 class="mb-1"><span>{{ $product_visit }}</span>  --}}
                                            </h5>
                                            <p class="text-muted mb-0">Produk Dilihat</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span>{{ $selingg_product }}</span>
                                            </h5>
                                            <p class="text-muted mb-0">Produk Terjual</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body p-0 pb-2"> 
                                <div class="w-100">
                                    <div id="customer_impression_charts"
                                        data-colors='["--vz-info", "--vz-primary", "--vz-danger"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>
                            </div><!-- end card body -->

                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                                <div class="flex-shrink-0">
                                    <span class="fw-semibold text-uppercase fs-12">Periode 7 Hari</span>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <tbody>
                                            @foreach ($best_selling_products as $best_product)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                <img src="{{ asset('thumbnail/product_images/' . $best_product->image1) }}"
                                                                    alt="{{ $best_product->title }}"
                                                                    class="img-fluid d-block" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1"><a
                                                                        href="{{ route('product.detail', $best_product->slug) }}"
                                                                        class="text-reset">{{ Str::limit($best_product->title, 30) }}</a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted">{{ $best_product->product_sub_category->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">{{ $best_product->total }}</h5>
                                                        <span class="text-muted">Pcs</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- end .h-100-->

        </div> <!-- end col -->

        <div class="col-auto layout-rightside-col">
            <div class="overlay"></div>
            <div class="layout-rightside">
                <div class="card h-100 rounded-0">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                        </div>
                        <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                            <div class="acitivity-timeline acitivity-main">
                                <div class="acitivity-item d-flex">
                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                        <div class="avatar-title bg-soft-success text-success rounded-circle">
                                            <i class="ri-shopping-cart-2-line"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                        <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                        <small class="mb-0 text-muted">02:14 PM Today</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                        <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                            <i class="ri-stack-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style
                                                collection</span></h6>
                                        <p class="text-muted mb-1">By Nesta Technologies</p>
                                        <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets') }}/images/products/img-8.png" alt=""
                                                    class="img-fluid d-block" />
                                            </a>
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets') }}/images/products/img-2.png" alt=""
                                                    class="img-fluid d-block" />
                                            </a>
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets') }}/images/products/img-10.png"
                                                    alt="" class="img-fluid d-block" />
                                            </a>
                                        </div>
                                        <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets') }}/images/users/avatar-2.jpg" alt=""
                                            class="avatar-xs rounded-circle acitivity-avatar">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Natasha Carey have liked the products
                                        </h6>
                                        <p class="text-muted mb-1">Allow users to like products in your
                                            WooCommerce store.</p>
                                        <small class="mb-0 text-muted">25 Dec, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-secondary">
                                                <i class="mdi mdi-sale fs-14"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Today offers by <a
                                                href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech
                                                Galaxy</a></h6>
                                        <p class="text-muted mb-2">Offer is valid on orders of Rs.500 Or
                                            above for selected products only.</p>
                                        <small class="mb-0 text-muted">12 Dec, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                <i class="ri-bookmark-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Favoried Product</h6>
                                        <p class="text-muted mb-2">Esther James have favorited product.
                                        </p>
                                        <small class="mb-0 text-muted">25 Nov, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-secondary">
                                                <i class="mdi mdi-sale fs-14"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Flash sale starting <span
                                                class="text-primary">Tomorrow.</span></h6>
                                        <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);"
                                                class="link-secondary fw-medium">Zoetic Fashion</a></p>
                                        <small class="mb-0 text-muted">22 Oct, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-soft-info text-info">
                                                <i class="ri-line-chart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                        <p class="text-muted mb-2"><span class="text-danger">2 days
                                                left</span> notification to submit the monthly sales
                                            report. <a href="javascript:void(0);"
                                                class="link-warning text-decoration-underline">Reports
                                                Builder</a></p>
                                        <small class="mb-0 text-muted">15 Oct</small>
                                    </div>
                                </div>
                                <div class="acitivity-item d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets') }}/images/users/avatar-3.jpg" alt=""
                                            class="avatar-xs rounded-circle acitivity-avatar" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                        <p class="text-muted mb-2 fst-italic">" A product that has
                                            reviews is more likable to be sold than a product. "</p>
                                        <small class="mb-0 text-muted">26 Aug, 2021</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 mt-2">
                            <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                            </h6>

                            <ol class="ps-3 text-muted">
                                <li class="py-1">
                                    <a href="#" class="text-muted">Mobile & Accessories <span
                                            class="float-end">(10,294)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Desktop <span
                                            class="float-end">(6,256)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Electronics <span
                                            class="float-end">(3,479)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Home & Furniture <span
                                            class="float-end">(2,275)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Grocery <span
                                            class="float-end">(1,950)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Fashion <span
                                            class="float-end">(1,582)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Appliances <span
                                            class="float-end">(1,037)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Beauty, Toys & More <span
                                            class="float-end">(924)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Food & Drinks <span
                                            class="float-end">(701)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Toys & Games <span
                                            class="float-end">(239)</span></a>
                                </li>
                            </ol>
                            <div class="mt-3 text-center">
                                <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all
                                    Categories</a>
                            </div>
                        </div>

                        <div class="p-3">
                            <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews</h6>
                            <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="fs-16 align-middle text-warning">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-half-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h6 class="mb-0">4.5 out of 5</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-muted">Total <span class="fw-medium">5.50k</span>
                                    reviews</div>
                            </div>

                            <div class="mt-3">
                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">5 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">2758</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">4 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">1063</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">3 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">997</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">2 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">227</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">1 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">408</h6>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </div>
                        </div>

                        <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                            <div class="card-body">
                                <img src="{{ asset('assets') }}/images/giftbox.png" alt="">
                                <div class="mt-4">
                                    <h5>Invite New Seller</h5>
                                    <p class="text-muted lh-base">Refer a new seller to us and earn $100
                                        per refer.</p>
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Invite Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end card-->
            </div> <!-- end .rightbar-->

        </div> <!-- end col -->
    </div>
@endsection

@section('plugin')
    <!-- apexcharts -->
    <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets') }}/libs/swiper/swiper-bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            new Swiper(".product-rating-swiper", {
                slidesPerView: 2,
                spaceBetween: 10,
                mousewheel: !0,
                loop: !0,
                direction: "vertical",
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: !1
                },
            })
        });

        function getChartColorsArray(e) {
            if (null !== document.getElementById(e)) {
                var r = document.getElementById(e).getAttribute("data-colors");
                if (r)
                    return (r = JSON.parse(r)).map(function(e) {
                        var r = e.replace(" ", "");
                        if (-1 === r.indexOf(",")) {
                            var t = getComputedStyle(document.documentElement).getPropertyValue(
                                r
                            );
                            return t || r;
                        }
                        e = e.split(",");
                        return 2 != e.length ?
                            r :
                            "rgba(" +
                            getComputedStyle(document.documentElement).getPropertyValue(
                                e[0]
                            ) +
                            "," +
                            e[1] +
                            ")";
                    });
                console.warn("data-colors atributes not found on", e);
            }
        }

        var total_penjualan = [];
        var total_view_produk = [];
        var total_terjual = [];

        var linechartcustomerColors = getChartColorsArray("customer_impression_charts");
        var options = {
            series: [
                {
                    name: "Orders",
                    type: "area",
                    data: [34,45],
                },
                {
                    name: "Earnings",
                    type: "bar",
                    data: [
                        89.25, 78.25,
                    ],
                },
                {
                    name: "Refunds",
                    type: "line",
                    data: [8,9],
                },
            ],
            chart: {
                height: 370,
                type: "line",
                toolbar: {
                    show: !1
                }
            },
            stroke: {
                curve: "straight",
                dashArray: [0, 0, 8],
                width: [2, 0, 2.2]
            },
            fill: {
                opacity: [0.1, 0.9, 1]
            },
            markers: {
                size: [0, 0, 0],
                strokeWidth: 2,
                hover: {
                    size: 4
                }
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisTicks: {
                    show: !1
                },
                axisBorder: {
                    show: !1
                },
            },
            grid: {
                show: !0,
                xaxis: {
                    lines: {
                        show: !0
                    }
                },
                yaxis: {
                    lines: {
                        show: !1
                    }
                },
                padding: {
                    top: 0,
                    right: -2,
                    bottom: 15,
                    left: 10
                },
            },
            legend: {
                show: !0,
                horizontalAlign: "center",
                offsetX: 0,
                offsetY: -5,
                markers: {
                    width: 9,
                    height: 9,
                    radius: 6
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "30%",
                    barHeight: "70%"
                }
            },
            colors: linechartcustomerColors,
            tooltip: {
                shared: !0,
                y: [{
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) : e;
                        },
                    },
                    {
                        formatter: function(e) {
                            return void 0 !== e ? "$" + e.toFixed(2) + "k" : e;
                        },
                    },
                    {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + " Sales" : e;
                        },
                    },
                ],
            },
        }

        var chart = new ApexCharts(
            document.querySelector("#customer_impression_charts"),
            options
        ).render();
    </script>
@endsection
