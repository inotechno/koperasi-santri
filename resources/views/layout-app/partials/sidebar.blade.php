<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="{{ url('/') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ url('assets') }}/images/logo-landscape.png" alt="" height="43">
                </span>
                <span class="logo-lg">
                    <img src="{{ url('assets') }}/images/logo-landscape.png" alt="" height="40">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
            id="topnav-hamburger-icon">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        <!-- App Search-->
        <form class="app-search d-none d-md-block" action="{{ url('product/explore') }}" method="GET">
            <div class="position-relative">
                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                    id="search-options" name="search" value="">
                <span class="mdi mdi-magnify search-widget-icon"></span>
                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                    id="search-close-options"></span>
            </div>
        </form>
    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search ..."
                                aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @hasrole('customer')

            <div class="dropdown topbar-head-dropdown ms-1 header-item">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                    id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-shopping-bag fs-22'></i>
                    <span
                        class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart"
                    aria-labelledby="page-header-cart-dropdown">
                    <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                            </div>
                            <div class="col-auto">
                                <span class="badge badge-soft-warning fs-13"><span class="cartitem-badge">7</span>
                                    items</span>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 300px;">
                        <div class="p-2">
                            @if (auth()->check())
                                @if ($_cart->count() > 0)
                                    <?php $total = 0; ?>
                                    @foreach ($_cart as $item)
                                        <?php
                                        $total += $item->quantity * $item->product->price;
                                        ?>
                                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                                                    class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1 fs-14">
                                                        <a href="apps-ecommerce-product-details.html"
                                                            class="text-reset">{{ $item->product->title }}</a>
                                                    </h6>
                                                    <p class="mb-0 fs-12 text-muted">
                                                        Quantity:
                                                        <span>{{ $item->quantity . ' x ' . number_format($item->product->price) }}</span>
                                                    </p>
                                                </div>
                                                <div class="px-2">
                                                    <h5 class="m-0 fw-normal">Rp <span
                                                            class="cart-item-price">{{ number_format($item->quantity * $item->product->price) }}</span>
                                                    </h5>
                                                </div>
                                                <div class="ps-2">
                                                    <button type="button"
                                                        class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                            class="ri-close-fill fs-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center empty-cart">
                                        <div class="avatar-md mx-auto my-3">
                                            <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                                                <i class='bx bx-cart'></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-3">Your Cart is Empty!</h5>
                                        <a href="{{ route('product.explore') }}" class="btn btn-success w-md mb-3">Shop
                                            Now</a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center empty-cart">
                                    <div class="avatar-md mx-auto my-3">
                                        <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                                            <i class='bx bx-cart'></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-3">Your Cart is Empty!</h5>
                                    <a href="{{ route('product.explore') }}" class="btn btn-success w-md mb-3">Shop
                                        Now</a>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if ($_cart->count() > 0)
                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border"
                            id="checkout-elem">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="m-0 text-muted">Total:</h5>
                                <div class="px-2">
                                    <h5 class="m-0" id="">Rp {{ number_format($total) }}</h5>
                                </div>
                            </div>

                            <a href="{{ route('cart.view') }}" class="btn btn-success text-center w-100">
                                Lihat Cart
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endhasrole()

        {{-- <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
            </button>
        </div> --}}

        <div class="dropdown topbar-head-dropdown ms-1 header-item">
            <a class="" href="{{ route('help.center') }}"> <button type="button"
                    class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-title="Pusat Bantuan">
                    <i class="bx bx-envelope fs-22"></i>
                </button></a>
        </div>


        {{-- <div class="dropdown topbar-head-dropdown ms-1 header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class='bx bx-bell fs-22'></i>
                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                        class="visually-hidden">unread messages</span></span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-notifications-dropdown">

                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                            </div>
                            <div class="col-auto dropdown-tabs">
                                <span class="badge badge-soft-light fs-13"> 4 New</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 pt-2">
                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                            id="notificationItemsTab" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab"
                                    aria-selected="true">
                                    All (4)
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                    aria-selected="false">
                                    Messages
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                                    aria-selected="false">
                                    Alerts
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="tab-content" id="notificationItemsTabContent">
                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                            <i class="bx bx-badge-check"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author
                                                Graphic
                                                Optimization <span class="text-secondary">reward</span>
                                                is
                                                ready!
                                            </h6>
                                        </a>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> Just 30 sec
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="all-notification-check01">
                                            <label class="form-check-label" for="all-notification-check01"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item position-relative active">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-2.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">Answered to your comment on the cash flow
                                                forecast's
                                                graph 🔔.</p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="all-notification-check02" checked>
                                            <label class="form-check-label" for="all-notification-check02"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                            <i class='bx bx-message-square-dots'></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b
                                                    class="text-success">20</b> new messages in the
                                                conversation
                                            </h6>
                                        </a>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="all-notification-check03">
                                            <label class="form-check-label" for="all-notification-check03"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-8.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">We talked about a project on linkedin.
                                            </p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="all-notification-check04">
                                            <label class="form-check-label" for="all-notification-check04"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 text-center">
                                <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                    All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                        aria-labelledby="messages-tab">
                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                            <div class="text-reset notification-item d-block dropdown-item">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-3.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">We talked about a project on linkedin.
                                            </p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="messages-notification-check01">
                                            <label class="form-check-label"
                                                for="messages-notification-check01"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-2.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">Answered to your comment on the cash flow
                                                forecast's
                                                graph 🔔.</p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="messages-notification-check02">
                                            <label class="form-check-label"
                                                for="messages-notification-check02"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-6.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">Mentionned you in his comment on 📃
                                                invoice #12501.
                                            </p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 10 hrs
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="messages-notification-check03">
                                            <label class="form-check-label"
                                                for="messages-notification-check03"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-reset notification-item d-block dropdown-item">
                                <div class="d-flex">
                                    <img src="{{ url('assets') }}/images/users/avatar-8.jpg"
                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                        </a>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">We talked about a project on linkedin.
                                            </p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> 3 days
                                                ago</span>
                                        </p>
                                    </div>
                                    <div class="px-2 fs-15">
                                        <div class="form-check notification-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="messages-notification-check04">
                                            <label class="form-check-label"
                                                for="messages-notification-check04"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 text-center">
                                <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                    All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab">
                        <div class="w-25 w-sm-50 pt-3 mx-auto">
                            <img src="{{ url('assets') }}/images/svg/bell.svg" class="img-fluid" alt="user-pic">
                        </div>
                        <div class="text-center pb-5 mt-2">
                            <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    @auth
                        @if (auth()->user()->image == null)
                            <img class="rounded-circle header-profile-user" src=" {{ asset('storage/default.png') }}"
                                alt="Header Avatar">
                        @else
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('storage/user_images/' . auth()->user()->image) }}" alt="Header Avatar">
                        @endif
                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ strtoupper(auth()->user()->getRoleNames()[0]) }}</span>
                        </span>
                    @endauth

                    @guest
                        <img class="rounded-circle header-profile-user" src=" {{ asset('storage/default.png') }}"
                            alt="Header Avatar">
                        <span class="text-start ms-xl-2">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Guest</span>
                            <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Guest</span>
                        </span>
                    @endguest
                </span>
            </button>

            @hasanyrole('customer|admin|seller')
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                    <a class="dropdown-item" href="{{ route('user.setting') }}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="{{ route('chat') }}"><i
                            class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                        <span class="align-middle">Messages</span></a>

                    <div class="dropdown-divider"></div>

                    @hasrole('seller')
                        <a class="dropdown-item" href="{{ route('seller.balance') }}"><i
                                class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Balance :
                                <b>{{ number_format(auth()->user()->load('store')->store->saldo) }}</b></span></a>
                    @endrole

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                                data-key="t-logout">Logout</span></button>
                    </form>
                    {{-- <a class="dropdown-item" href="auth-logout-basic.html"></a> --}}
                </div>
            @endhasanyrole
        </div>
    </div>
</div>
