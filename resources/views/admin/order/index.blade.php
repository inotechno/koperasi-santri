@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Daftar Transaksi</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Daftar Transaksi</li>
                    </ol>
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills arrow-navtabs nav-info bg-light mb-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#menunggu-pembayaran" role="tab"
                                aria-selected="true">Menunggu Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#terbayar" role="tab"
                                aria-selected="false">Terbayar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#diproses" role="tab"
                                aria-selected="false">Diproses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#dikirim" role="tab"
                                aria-selected="false">Dikirim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#selesai" role="tab"
                                aria-selected="false">Selesai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#batal" role="tab"
                                aria-selected="false">Dibatalkan</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="menunggu-pembayaran" role="tabpanel">
                            <table id="order-pending" class="table dt-responsive nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="terbayar" role="tabpanel">
                            <table id="order-terbayar" class="table dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="diproses" role="tabpanel">
                            <table id="order-diproses" class="table dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="dikirim" role="tabpanel">
                            <table id="order-dikirim" class="table dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="selesai" role="tabpanel">
                            <table id="order-selesai" class="table dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="batal" role="tabpanel">
                            <table id="order-batal" class="table dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Store Name</th>
                                        <th>Customer Name</th>
                                        <th>Bank</th>
                                        <th>Va Number</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
        </div>

    </div>
@endsection

@section('plugin')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.js">
    </script>

    <script type="text/javascript">
        $(function() {

            var table = $('#order-pending').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.pending') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#order-terbayar').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.terbayar') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'paid_date',
                        name: 'paid_date',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#order-diproses').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.diproses') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#order-dikirim').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.dikirim') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#order-selesai').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.selesai') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#order-batal').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.order.batal') }}",
                columns: [{
                        data: 'link',
                        name: 'order_number'
                    },
                    {
                        data: 'store.name',
                        name: 'store.name',
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'va_number',
                        name: 'va_number'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format(
                                'Do MMMM YYYY h:mm:ss');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
