@extends('layout-app.app')
@section('css')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-0">Daftar Kategori</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                    <li class="breadcrumb-item active">Daftar Kategori</li>
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
                        <a class="nav-link active" data-bs-toggle="tab" href="#customer" role="tab"
                            aria-selected="true">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#seller" role="tab" aria-selected="false">Sub
                            Category</a>
                    </li>
                </ul><!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="customer" role="tabpanel">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group input-group-sm">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#class">Tambah Category</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="category-list" class="table dt-responsive nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th>Name Category</th>
                                    <th>AddSubCategory</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="seller" role="tabpanel">
                        <table id="sub_category-list" class="table dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th>Category</th>
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


{{-- Modal Tambah data category --}}
<div class="modal fade" id="class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Category</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label class="col-sm-3 col-form-label">Nama Kategori:</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                            placeholder="Enter Nama Kategori...">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-3 col-form-label">Icon Kategori:</label>
                        <input class="form-control @error('icon') is-invalid @enderror" name="icon" type="text"
                            placeholder="Enter Icon...">
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer mt-3">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Tambah category --}}

{{-- Modal Tambah data Sub category --}}
<div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Category</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.sub_category',[$product_category[0]->id])}}" method="POST">
                    @csrf
                    <label for="name">Name Sub Category</label>
                    <input type="text" name="name" class="form-control">
                    <div class="modal-footer mt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Tambah Sub category --}}

{{-- Modal Edit data --}}
<div class="modal fade" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    </div>
</div>
{{-- End Modal Edit data --}}
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
    $(function () {
        var table = $('#category-list').DataTable({
            processing: false,
            serverSide: false,
            order: [
                [1, 'asc']
            ],
            ajax: "{{ route('admin.product.category') }}",
            columns: [{
                    data: 'selection',
                    name: 'selection',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'addsubcat',
                    name: 'addsubcat'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function (value) {
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

        var table = $('#sub_category-list').DataTable({
            processing: false,
            serverSide: false,
            order: [
                [1, 'asc']
            ],
            ajax: "{{ route('admin.product.sub_category') }}",
            columns: [{
                    data: 'selection',
                    name: 'selection',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function (value) {
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

        $('#category-list').on('click', '.btn-delete', function () {
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
            }).then(function (t) {
                if (t.isConfirmed != false) {
                    $('#form-delete').submit();
                }
            });
        })

    });

</script>
<script>
    var modalAction = new bootstrap.Modal(document.getElementById("modalAction"), {});
    document.onreadystatechange = function () {
        $('body').on('click', '.action', function () {
            var data = $(this).data();
            var id = data.id
            var jenis = data.jenis

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/category/edit') }}/" + id,
                success: function (res) {
                    $('#modalAction').find('.modal-dialog').html(res)
                    modalAction.show();

                    // console.log(res);
                }
            })
            // console.log(data);
        })
    };

</script>
@endsection
