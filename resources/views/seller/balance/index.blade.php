@extends('layout-app.app')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">History Saldo</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                        <li class="breadcrumb-item active">History Saldo</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                </div><!-- end card header -->

                <div class="card-body p-0 border-0 bg-soft-light">
                    <div class="my-3 text-center">
                        <div class="form-group px-3">
                            <select name="filter" id="filter" class="form-control">
                                <option value="">Filter</option>
                                <option value="one_month">1 Bulan</option>
                                <option value="six_month">6 Bulan</option>
                                <option value="one_year">1 Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 text-center">
                        <div class="col-12 mt-2">
                            <div class="p-3 border border-dashed border-start-0 bg-primary">
                                <h5 class="mb-1 text-white">Rp <span class="counter-value saldo-data" id="saldo"></span>
                                </h5>
                                <p class="text-white mb-0">Saldo</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-12 mt-2">
                            <div class="p-3 border border-dashed border-start-0 bg-info">
                                <h5 class="mb-1 text-white">Rp <span class="counter-value" id="total_debit"></span>
                                </h5>
                                <p class="mb-0 text-white">Debit</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-12 mt-2">
                            <div class="p-3 border border-dashed border-start-0 bg-danger">
                                <h5 class="text-white mb-1">Rp <span class="counter-value" id="total_credit"></span>
                                </h5>
                                <p class="mb-0 text-white">Credit</p>
                            </div>
                        </div>
                    </div>
                    @if ($seller->store->saldo === 0)
                        <small class="text-danger my-3 p-2">* Tidak ada saldo untuk dicairkan</small>
                    @elseif ($seller->rekening !== null)
                        <div class="my-3 text-center">
                            <button type="button" class="btn btn-primary" id="btn-withdraw">Cairkan
                                Saldo</button>
                        </div>
                    @else
                        <small class="text-danger my-3 p-2">* Silahkan lengkapi data rekening terlebih dahulu</small>
                    @endif
                </div>

            </div>
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Histori Saldo</h4>
                </div>
                <div class="card-body">
                    <table id="history-balance" class="table dt-responsive nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Saldo Awal</th>
                                <th>Nominal</th>
                                <th>Saldo Akhir</th>
                                <th>Debit / Kredit</th>
                                <th>Keterangan</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Histori Pencairan</h4>
                </div>
                <div class="card-body">
                    <table id="history-withdraw" class="table dt-responsive nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>No Referensi</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <form method="POST" id="form-withdraw" action="{{ route('seller.transfer') }}">
        <div id="withdrawModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="withdrawModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="withdrawModalLabel">Pencairan Dana</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="bank_code" value="{{ $seller->bank_code }}">
                        <div class="mb-3">
                            <label for="bank_name" class="form-label">Nama Bank</label>
                            <input type="text" name="bank_name"
                                class="form-control @error('bank_name') is-invalid @enderror" id="bank_name"
                                placeholder="Nama Bank" value="{{ $seller->bank_name }}" readonly>
                            @error('bank_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rekening" class="form-label">Nomor Rekening</label>
                            <input type="text" name="rekening"
                                class="form-control @error('rekening') is-invalid @enderror" id="rekening"
                                placeholder="Nomor Rekening" value="{{ $seller->rekening }}" readonly>
                            @error('rekening')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rekening_atas_nama" class="form-label">Atas Nama</label>
                            <input type="text" name="rekening_atas_nama"
                                class="form-control @error('rekening_atas_nama') is-invalid @enderror"
                                id="rekening_atas_nama" placeholder="Atas Nama" value="{{ $seller->rekening_atas_nama }}"
                                readonly>
                            @error('rekening_atas_nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp <span class="saldo-data"></span></span>
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                    name="nominal" placeholder="Nominal Pencairan">
                                @error('nominal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="disburseId">
                        <input type="hidden" name="accountName">
                        <input type="hidden" name="custRefNumber">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="btn-check-account">Check</button>
                        <button type="submit" class="btn btn-success" disabled id="btn-transfer">Lanjut</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
@endsection

@section('plugin')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/sl-1.4.0/datatables.min.js">
    </script>
    @if (!empty(Session::get('error')))
        <script>
            $(function() {
                $('#withdrawModal').modal('show');
            });
        </script>
    @endif
    <script type="text/javascript">
        $(function() {
            $('#btn-withdraw').click(function() {
                $('#btn-transfer').prop('disabled', true);
                $('#btn-check-account').prop('disabled', false);
                $('[name="nominal"]').prop('readonly', false);
                $('#withdrawModal').modal('show');
            })

            getBalance();

            var table = $('#history-balance').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('seller.balance.history') }}",
                createdRow: function(row, data, dataIndex) {
                    if (data.debit_or_credit == 'credit') {
                        $(row).addClass('bg-soft-danger');
                    } else {
                        $(row).addClass('bg-soft-info');
                    }
                },
                columns: [{
                        data: 'saldo_awal',
                        name: 'saldo_awal',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'saldo_akhir',
                        name: 'saldo_akhir',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'debit_or_credit',
                        name: 'debit_or_credit',
                        render: function(value) {
                            if (value === 'credit') {
                                return '<span class="badge bg-danger text-uppercase">' +
                                    value + '</span>';
                            } else {
                                return '<span class="badge bg-info text-uppercase">' + value +
                                    '</span>';
                            }
                        }
                    },
                    {
                        data: 'history',
                        name: 'keterangan'
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

            var table = $('#history-withdraw').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: "{{ route('seller.withdraw.history') }}",
                columns: [{
                        data: 'reference_number',
                        name: 'reference_number',
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                        render: $.fn.dataTable.render.number(',', '.', 0)
                    },
                    {
                        data: 'status',
                        name: 'status',
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

            $('#filter').on('change', function() {
                var filter = $(this).val();
                getBalance(filter);
            })

            function getBalance(filter = null) {
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    url: "{{ route('seller.balance.detail') }}",
                    data: {
                        _token: token,
                        filter: filter
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $('.saldo-data').html(response.saldo);
                        $('#total_debit').html(response.debit);
                        $('#total_credit').html(response.credit);
                    }
                });

                return false;
            }

            $('#btn-check-account').click(function() {
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    type: "POST",
                    url: "{{ route('seller.inquiry') }}",
                    data: {
                        '_token': token,
                        'bank_code': $('[name="bank_code"]').val(),
                        'rekening': $('[name="rekening"]').val(),
                        'rekening_atas_nama': $('[name="rekening_atas_nama"]').val(),
                        'nominal': $('[name="nominal"]').val()
                    },
                    dataType: "JSON",
                    success: function(response) {

                        console.log(response);
                        if (response.responseCode != 00) {
                            notification('error', response.responseDesc);
                        } else {
                            $('[name="disburseId"]').val(response.disburseId);
                            $('[name="custRefNumber"]').val(response.custRefNumber);
                            $('[name="accountName"]').val(response.accountName);

                            $('#btn-transfer').prop('disabled', false);
                            $('[name="nominal"]').prop('readonly', true);
                            $('#btn-check-account').prop('disabled', true);
                            notification('success', response.responseDesc);
                        }

                    }
                });

                return false;
            })

            $('#form-withdraw').submit(function() {
                var data = $(this).serialize();

                if ($('[name="rekening_atas_nama"]').val() != $('[name="accountName"]').val()) {
                    notification('error',
                        'Nama pemilik rekening tidak sama, silahkan ubah data terlebih dahulu.')
                    return false;
                }

                return true;

            })
        });
    </script>
@endsection
