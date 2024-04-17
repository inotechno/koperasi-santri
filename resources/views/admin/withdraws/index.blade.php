@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Daftar Pencairan Dana</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Daftar Pencairan Dana</li>
                    </ol>
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="withdraw-list" class="table dt-responsive nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Seller Name</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div>
        </div>

    </div>

    <div class="modal fade" id="processModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Withdraw</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form id="form-proses-withdraw">
                    <div class="modal-body">

                        <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" id="id" class="form-control" placeholder="ID" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="reference_number" class="form-label">Reference Number</label>
                            <input type="text" id="reference" class="form-control" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="bank_name" class="form-label">Nama Bank</label>
                            <input type="text" id="bank_name" class="form-control" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="rekening" class="form-label">No Rekening</label>
                            <input type="text" id="rekening" class="form-control" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="rekening_atas_nama" class="form-label">Atas Nama</label>
                            <input type="text" id="rekening_atas_nama" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="process-btn">Proses</button>
                        </div>
                    </div>
                </form>
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
            var table = $('#withdraw-list').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('admin.withdraw.history') }}",
                columns: [{
                        data: 'reference_number',
                        name: 'reference_number'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(value) {
                            if (value === null) return "";
                            return moment(value).format('DD/MM/YYYY h:mm:ss');
                        }
                    },
                ]
            });

            $('#withdraw-list').on('click', '.process-item-btn', function() {
                var id = $(this).data('id');
                var reference = $(this).data('reference');
                var name = $(this).data('name');
                var bank_name = $(this).data('bank_name');
                var rekening = $(this).data('rekening');
                var rekening_atas_nama = $(this).data('rekening_atas_nama');

                $('#id').val(id);
                $('#reference').val(reference);
                $('#name').val(name);
                $('#bank_name').val(bank_name);
                $('#rekening').val(rekening);
                $('#rekening_atas_nama').val(rekening_atas_nama);


                $('#processModal').modal('show');
            })
        });
    </script>
@endsection
