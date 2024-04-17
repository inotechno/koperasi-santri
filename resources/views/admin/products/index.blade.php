@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Daftar Produk</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Daftar Barang</li>
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#barang-dijual" role="tab"
                                aria-selected="true">Barang Dijual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#barang-tidak-dijual" role="tab"
                                aria-selected="false">Barang Tidak Dijual</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="barang-dijual" role="tabpanel">
                            <table id="product-list-publish" class="table dt-responsive nowrap align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th>Nama Toko</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="barang-tidak-dijual" role="tabpanel">
                            <table id="product-list-draft"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th>Nama Toko</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
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
            var table = $('#product-list-publish').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.product.publish') }}",
                columns: [{
                        data: 'selection',
                        name: 'selection',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'store',
                        name: 'store'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'product_sub_category',
                        name: 'product_sub_category.name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).lang('id').format('Do MMMM YYYY h:mm:ss');
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

            var table = $('#product-list-draft').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.product.draft') }}",
                columns: [{
                        data: 'selection',
                        name: 'selection',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'store',
                        name: 'store'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: $.fn.dataTable.render.number(',', '.', 2)
                    },
                    {
                        data: 'product_sub_category',
                        name: 'product_sub_category.name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).format('DD/MM/YYYY h:mm:ss');
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
