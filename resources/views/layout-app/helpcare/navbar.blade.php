<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="{{ url('/') }}" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ url('assets') }}/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ url('assets') }}/images/logo-dark.png" alt="" height="17">
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

                <li class="menu-title"><span data-key="t-menu">Kendala</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAkun" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAkun">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-Akun">Akun & Keamanan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAkun">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('help.center.akun') }}" class="nav-link" data-key="t-analytics"> Cara Daftar & Login </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Kendala Login </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Atur Akun </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPesanan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPesanan">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-Pesanan">Pesanan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPesanan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Buat Pesanan </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Terima Pesanan </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Cek Status Pesanan </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Pesanan Batal/Belum Diproses </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPembayaran" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPembayaran">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-Pembayaran">Pembayaran</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPembayaran">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Cara Bayar </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Transfer Bank & Instant Payment </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Debit Instan </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPengiriman" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPengiriman">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-Pengiriman">Pengiriman</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPengiriman">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Alamat Pengiriman </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Informasi Kurir & Ongkos Kirim </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Resi </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarsaldo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarsaldo">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-saldo">Saldo & Tarik Dana</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarsaldo">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Saldo Refund & Penghasilan </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Tarik Dana </a>
                            </li>
                        </ul>
                    </div>
                </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
