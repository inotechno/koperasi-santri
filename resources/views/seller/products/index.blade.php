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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                        <li class="breadcrumb-item active">Daftar Produk</li>
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
                                aria-selected="true">Produk Dijual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#barang-tidak-dijual" role="tab"
                                aria-selected="false">Produk Tidak Dijual</a>
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

    <div class="modal fade" id="removeProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="removeProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#121331,secondary:#e86830" style="width:120px;height:120px">
                    </lord-icon>

                    <div class="mt-4">
                        <form action="" method="POST" id="form-delete-product">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id">
                            <h4 class="mb-3">Hapus Produk</h4>
                            <p class="text-muted mb-4">Produk akan dihapus secara permanen, Apakah anda yakin ingin
                                melanjutkan
                                menghapus ?</p>
                            <div class="hstack gap-2 justify-content-center">
                                <button type="submit" href="javascript:void(0);" class="btn btn-danger">Hapus
                                    Produk</button>
                                <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="draftProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="draftProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#121331,secondary:#e86830" style="width:120px;height:120px">
                    </lord-icon>

                    <div class="mt-4">
                        <form action="" method="POST" id="form-draft-product">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id">
                            <h4 class="mb-3">Draft Produk</h4>
                            <p class="text-muted mb-4">Produk akan disimpan kedalam draft, Apakah anda yakin ingin
                                melanjutkan
                                ?</p>
                            <div class="hstack gap-2 justify-content-center">
                                <button type="submit" href="javascript:void(0);"
                                    class="btn btn-danger">Lanjutkan</button>
                                <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="publishProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="publishProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>

                    <div class="mt-4">
                        <form action="" method="POST" id="form-publish-product">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id">
                            <h4 class="mb-3">Publish Produk</h4>
                            <p class="text-muted mb-4">Produk akan dipublish, Apakah anda yakin ingin
                                melanjutkan
                                ?</p>
                            <div class="hstack gap-2 justify-content-center">
                                <button type="submit" href="javascript:void(0);"
                                    class="btn btn-danger">Lanjutkan</button>
                                <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="discountProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="discountProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/qrbokoyz.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>

                    <div class="mt-4">
                        <form action="" method="POST" id="form-discount-product">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id">
                            <h4 class="mb-3">Diskon Produk</h4>
                            <span class="text-muted mb-4">Harga Sekarang Rp: <span id="price-now"></span></span>

                            <div class="form-group mt-2">
                                <div class="input-group">
                                    <input type="number" max="100" class="form-control"
                                        aria-label="input potongan" name="discount">
                                    <span class="input-group-text btn-primary">%</span>
                                    <span class="input-group-text btn-success" id="price-update">0</span>
                                </div>

                                <div class="hstack gap-2 mt-2 justify-content-center">
                                    <button type="submit" href="javascript:void(0);"
                                        class="btn btn-danger">Simpan</button>
                                    <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium"
                                        data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeDiscountProduct" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="removeDiscountProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#121331,secondary:#e86830" style="width:120px;height:120px">
                    </lord-icon>

                    <div class="mt-4">
                        <form action="" method="POST" id="form-remove-discount-product">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id">
                            <h4 class="mb-3">Hapus Diskon</h4>
                            <p class="text-muted mb-4">Apakah anda yakin ingin menghapus diskon pada produk ini ?</p>
                            <div class="hstack gap-2 justify-content-center">
                                <button type="submit" href="javascript:void(0);" class="btn btn-danger">Hapus
                                    Diskon</button>
                                <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin')
<<<<<<< HEAD
<<<<<<< HEAD
    <script type="text/javascript" src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js') }}"></script>
=======
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="{{ asset('vendor/jquery-currency/simple.money.format.js') }}"></script>
>>>>>>> fcc04d7c698ca582d5a728ccb4d2167b453295dc
=======
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="{{ asset('vendor/jquery-currency/simple.money.format.js') }}"></script>
>>>>>>> 64afc544ac47d87d45c5f1ce0b913c9badcde120
    <script type="text/javascript"
        src="{{ url('https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.js') }}">
    </script>

    <script type="text/javascript">
        $(function() {


            var table = $('#product-list-publish').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('product.publish') }}",
                columns: [{
                        data: 'selection',
                        name: 'selection',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'product_price',
                        name: 'price',
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
                ajax: "{{ route('product.draft') }}",
                columns: [{
                        data: 'selection',
                        name: 'selection',
                        orderable: false,
                        searchable: false
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

            // Page Publish
            $('#product-list-publish').on('click', '.remove-item', function() {
                var id = $(this).data('id');

                $('#removeProductModal [name="id"]').val(id);
                $('#removeProductModal').modal('show');

                $('#form-delete-product').attr('action', '{{ url('/seller/products/delete/') }}/' + id);
            })

            $('#product-list-publish').on('click', '.draft-item', function() {
                var id = $(this).data('id');

                $('#draftProductModal [name="id"]').val(id);
                $('#draftProductModal').modal('show');

                $('#form-draft-product').attr('action', '{{ url('/seller/products/draft/') }}/' + id);
            })

            $('#product-list-publish').on('click', '.discount-item', function() {
                var id = $(this).data('id');
                var price = $(this).data('price');

                $('#discountProductModal [name="id"]').val(id);
                $('#discountProductModal').modal('show');

                $('#form-discount-product').attr('action', '{{ url('/seller/products/discount/') }}/' + id);
                $('#price-now').html(price);

                $('[name="discount"]').keyup(function(e) {
                    var disc = $(this).val();

                    var discount = price - (price * disc / 100);

                    $('#price-update').html(discount);
                    $('#price-update').simpleMoneyFormat();
                });

            })

            $('#product-list-publish').on('click', '.remove-discount', function() {
                var id = $(this).data('id');
                var price = $(this).data('price');

                $('#removeDiscountProduct [name="id"]').val(id);
                $('#removeDiscountProduct').modal('show');

                $('#form-remove-discount-product').attr('action',
                    '{{ url('/seller/products/remove-discount/') }}/' + id);
            })


            // Page Draft
            $('#product-list-draft').on('click', '.publish-item', function() {
                var id = $(this).data('id');

                $('#publishProductModal [name="id"]').val(id);
                $('#publishProductModal').modal('show');

                $('#form-publish-product').attr('action', '{{ url('/seller/products/publish/') }}/' + id);
            })

            $('#product-list-draft').on('click', '.remove-item', function() {
                var id = $(this).data('id');

                $('#removeProductModal [name="id"]').val(id);
                $('#removeProductModal').modal('show');

                $('#form-delete-product').attr('action', '{{ url('/seller/products/delete/') }}/' + id);
            })

        });
    </script>
@endsection
