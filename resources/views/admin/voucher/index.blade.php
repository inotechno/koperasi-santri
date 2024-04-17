@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Daftar Voucher</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Daftar Voucher</li>
                    </ol>
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-end">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-add-promo">Tambah Promo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="voucher-list" class="table dt-responsive nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Voucher Code</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Max Uses</th>
                                <th>Max Uses User</th>
                                <th>Discount</th>
                                <th>Minimum Order</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div>
        </div>

    </div>


    {{-- Modal Tambah data category --}}
    <div class="modal fade" id="modal-add-promo" tabindex="-1" role="dialog" aria-labelledby="addPromoModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPromoModal">Tambah Voucher</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create-voucher" method="POST">
                    <div class="modal-body">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        @csrf
                        <div class="row">
                            <div class="col-md">
                                <label class="col-form-label">Voucher Code</label>
                                <input class="form-control @error('code') is-invalid @enderror" name="code"
                                    type="text" placeholder="Enter Voucher Code...">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="col-form-label">Title</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" placeholder="Enter Title Voucher...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label class="col-form-label">Voucher Type</label>
                                <select name="type_id" id="" class="form-control">
                                    <option value="">Select Type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md">
                                <label class="col-form-label">Max Uses</label>
                                <input class="form-control @error('max_uses') is-invalid @enderror" name="max_uses"
                                    type="number" placeholder="Enter Maximal Uses...">

                            </div>
                            <div class="col-md">
                                <label class="col-form-label">Max Uses PerUser</label>
                                <input class="form-control @error('max_uses_user') is-invalid @enderror"
                                    name="max_uses_user" type="number" placeholder="Enter Maximal Uses PerUser...">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label">Discount Type</label>
                                <select id="discount_type" class="form-control" name="discount_type">
                                    <option value="">Select Type</option>
                                    <option value="nominal">Nominal</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                            </div>

                            <div class="col-md" id="form-hidden">

                            </div>

                            <div class="col-md">
                                <label class="col-form-label">Minimum Order</label>
                                <input class="form-control @error('minimum_order') is-invalid @enderror"
                                    name="minimum_order" type="number" placeholder="Enter Minimum Order...">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Description Excerpt</label>
                            <textarea name="desc_excerpt" id="" class="form-control" cols="30" rows="3"></textarea>

                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Description</label>
                            <textarea name="desc" id="" class="form-control" cols="30" rows="6"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <label for="" class="col-form-label">Start At</label>
                                <input type="datetime-local" class="form-control" name="start_at">
                            </div>

                            <div class="col-md">
                                <label for="" class="col-form-label">Expired At</label>
                                <input type="datetime-local" class="form-control" name="expired_at">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Tambah category --}}

    <form action="" id="form-delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('plugin')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.js">
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#voucher-list').DataTable({
                processing: false,
                serverSide: false,
                ordering: false,
                // order: [
                //     [1, 'asc']
                // ],
                ajax: "{{ route('admin.voucher.list') }}",
                columns: [{
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'type.name',
                        name: 'type_id'
                    },
                    {
                        data: 'max_uses',
                        name: 'max_uses'
                    },
                    {
                        data: 'max_uses_user',
                        name: 'max_uses_user'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'minimum_order',
                        name: 'minimum_order'
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
                        // orderable: false,
                        // searchable: false
                    },
                ]
            });

            $('#voucher-list').on('click', '.btn-delete', function() {
                var id = $(this).data('id');
                $('#form-delete').attr('action', "{{ url('admin/category/delete') }}/" + id);
                Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah anda yakin ingin menghapus Kategori ini ?",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: "Yes, delete it!",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then(function(t) {
                    if (t.isConfirmed != false) {
                        $('#form-delete').submit();
                    }
                });
            })

            $('#discount_type').on('change', function() {
                var val = $(this).val();
                show(val);
            })

            function show(value = null) {
                console.log(value);
                html = '';
                if (value == 'nominal') {
                    html = '<label class="col-form-label">Nominal</label>' +
                        '   <input class="form-control" name="discount_nominal" type="number" placeholder="Enter Nominal ...">';
                } else if (value == 'percentage') {
                    html = '<div class="row">' +
                        '       <div class="col-md-4">' +
                        '           <label class="col-form-label">Percentage</label>' +
                        '           <input class="form-control" name="discount_percentage" type="number" placeholder="%">' +
                        '       </div>' +

                        '       <div class="col-md">' +
                        '           <label class="col-form-label">Max Discount</label>' +
                        '           <input class="form-control" name="max_discount" type="number" placeholder="Enter Nominal ...">' +
                        '       </div>' +
                        '   </div>';
                } else if (value == null) {
                    html = '';
                }

                $('#form-hidden').html(html);
            }

            $('#form-create-voucher').submit(function() {
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.voucher.store') }}",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        if ($.isEmptyObject(response.errors)) {
                            notification('success', 'Voucher added successfully');
                            // alert(response.success);
                            location.reload();
                        } else {
                            printErrorMsg(response.errors);
                        }

                        console.log(response);
                    }
                });

                return false;
            })

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

        });
    </script>
@endsection
