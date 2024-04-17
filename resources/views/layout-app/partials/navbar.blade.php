<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="{{ url('/') }}" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ url('assets') }}/images/logo.png" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ url('assets') }}/images/logo.png" alt="" height="17">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="{{ url('/') }}" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ url('assets') }}/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ url('assets') }}/images/logo-light.png" alt="" height="17">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">

            @hasrole('admin')
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ url('admin/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><span data-key="t-menu">Produk</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/products*') ? 'collapsed active ' : '' }}"
                        href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Produk</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('admin/products*') ? 'show' : '' }}"
                        id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/products') }}"
                                    class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}"
                                    data-key="t-horizontal">Daftar
                                    Produk</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="layouts-detached.html" class="nav-link" data-key="t-detached">Etalase</a>
                            </li> --}}
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><span data-key="t-menu">Transaksi</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/order') ? 'active' : '' }}"
                        href="{{ route('admin.order') }}">
                        <i class="ri-bar-chart-box-line"></i> <span data-key="t-apps">Order</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/withdraw') ? 'active' : '' }}"
                        href="{{ route('admin.withdraw') }}">
                        <i class="ri-bar-chart-box-line"></i> <span data-key="t-apps">Withdraw</span>
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Master Data</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/users') ? 'active' : '' }}"
                        href="{{ route('admin.users') }}">
                        <i class="ri-user-star-line"></i> <span data-key="data-pengguna">Data Pengguna</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/category') ? 'active' : '' }}"
                        href="{{ route('admin.category') }}">
                        <i class="ri-briefcase-3-line"></i> <span data-key="data-kategori">Data Kategori</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/vouchers') ? 'active' : '' }}"
                        href="{{ route('admin.voucher') }}">
                        <i class="ri-coupon-3-line"></i> <span data-key="data-voucher">Data Voucher</span>
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Pengaturan</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('setting') ? 'active' : '' }}"
                        href="{{ route('user.setting') }}">
                        <i class="ri-tools-line"></i> <span data-key="pengaturan">Pengaturan Aplikasi</span>
                    </a>
                </li>

            @endrole



            @hasrole('seller')
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/dashboard') ? 'active' : '' }}"
                        href="{{ url('seller/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><span data-key="t-menu">Produk</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/product/create') ? 'active' : '' }}"
                        href="{{ url('/seller/product/create') }}">
                        <i class="ri-briefcase-2-fill"></i> <span data-key="t-apps">Tambah Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/products') ? 'active' : '' }}"
                        href="{{ url('/seller/products') }}">
                        <i class="ri-layout-3-line"></i> <span data-key="t-apps">Daftar Produk</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->

                <li class="menu-title"><span data-key="t-menu">Store</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/order') ? 'active' : '' }}"
                        href="{{ route('seller.order') }}">
                        <i class="ri-bar-chart-box-line"></i> <span data-key="t-apps">Transaksi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/statistic') ? 'active' : '' }}"
                        href="{{ route('seller.statistic') }}">
                        <i class="ri-user-star-line"></i> <span data-key="penilaian-pelanggan">Manajemen Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/rating') ? 'active' : '' }}"
                        href="{{ route('seller.rating') }}">
                        <i class="ri-star-half-line"></i> <span data-key="penilaian-pelanggan">Penilaian Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('chat') ? 'active' : '' }}"
                        href="{{ route('chat') }}">
                        <i class="ri-chat-1-line"></i> <span data-key="pesan">Pesan </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('setting') ? 'active' : '' }}"
                        href="{{ route('user.setting') }}">
                        <i class="ri-tools-line"></i> <span data-key="pengaturan">Pengaturan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('seller/balance') ? 'active' : '' }}"
                        href="{{ route('seller.balance') }}">
                        <i class="ri-advertisement-line"></i> <span data-key="history">History Keuangan</span>
                    </a>
                </li>
            @endrole


            @hasrole('customer')

                <li class="menu-title"><i class="ri-more-fill"></i>
                    <span data-key="t-profil">Fiture</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('wishlist') ? 'active' : '' }}"
                        href="{{ route('wishlist') }}">
                        <i class="ri-heart-line"></i> <span data-key="t-wishlist">Wishlist</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('chat') ? 'active' : '' }}"
                        href="{{ route('chat') }}">
                        <i class="ri-chat-1-line"></i> <span data-key="t-chat">Pesan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('setting') ? 'active' : '' }}"
                        href="{{ route('user.setting') }}">
                        <i class="ri-tools-line"></i> <span data-key="t-setting">Pengaturan</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i>
                    <span data-key="t-profil">Pembelian</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('order/pending') ? 'active' : '' }}"
                        href="{{ route('order.pending') }}">
                        <i class="ri-reply-fill"></i> <span data-key="t-wating_payment">Transaksi Pending</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('order') ? 'active' : '' }}"
                        href="{{ route('order') }}">
                        <i class="ri-exchange-funds-line"></i> <span data-key="t-daftar-transaksi">Daftar Transaksi</span>
                    </a>
                </li>

                <li class="menu-title" id="category"><i class="ri-more-fill"></i>
                    <span data-key="t-pages">Kategori</span>
                </li>

                @foreach ($_category as $item)
                    <li class="nav-item">
                        <a class="nav-link menu-link " href="#{{ $item->slug }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="{{ $item->slug }}">
                            <i class="{{ $item->icon }}"></i> <span data-key="t-layouts">{{ $item->name }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{ $item->slug }}">
                            <ul class="nav nav-sm flex-column">
                                @foreach ($item->product_sub_category as $item_sub)
                                    <li class="nav-item">
                                        <a href="{{ url('?category=' . $item_sub->slug) }}" class="nav-link "
                                            data-key="t-horizontal">{{ $item_sub->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            @endrole


            @guest
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Authentication</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('login') }}">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Login</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('register') }}">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Register</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('contactUs') }}">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Hubungi kami</span>
                    </a>
                </li>

                <li class="menu-title" id="category"><i class="ri-more-fill"></i>
                    <span data-key="t-pages">Kategori</span>
                </li>

                @foreach ($_category as $item)
                    <li class="nav-item">
                        <a class="nav-link menu-link " href="#{{ $item->slug }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="{{ $item->slug }}">
                            <i class="{{ $item->icon }}"></i> <span data-key="t-layouts">{{ $item->name }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="{{ $item->slug }}">
                            <ul class="nav nav-sm flex-column">
                                @foreach ($item->product_sub_category as $item_sub)
                                    <li class="nav-item">
                                        <a href="{{ url('?category=' . $item_sub->slug) }}" class="nav-link "
                                            data-key="t-horizontal">{{ $item_sub->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach

            @endguest


            {{-- <li class="menu-title"><span data-key="t-menu">Help & Documentation</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link">
                    <i class="ri-booklet-line"></i> <span data-key="documentation">Documentation</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link">
                    <i class="ri-questionnaire-line"></i> <span data-key="help">Help Center</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link">
                    <i class="ri-phone-line"></i> <span data-key="contact">Hubungi Kami</span>
                </a>
            </li> --}}

        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
