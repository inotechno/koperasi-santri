@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Daftar Penilaian</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                        <li class="breadcrumb-item active">Penilaian Pelanggan</li>
                    </ol>
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="rating-list" class="table dt-responsive nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Nilai</th>
                                <th>Catatan</th>
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
@endsection

@section('plugin')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.js"></script>

    <script type="text/javascript">
        $(function() {

            var table = $('#rating-list').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('seller.rating.list') }}",
                columns: [{
                        data: 'product_image',
                        name: 'product_image'
                    },
                    {
                        data: 'product_name',
                        name: 'product_name'
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                    {
                        data: 'catatan',
                        name: 'catatan'
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
                ]
            });
        });
    </script>
@endsection
