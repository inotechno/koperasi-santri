@extends('layout-app.app')

@section('css')
<link href="{{ url('assets') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-0"></h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Store</a></li>
                    <li class="breadcrumb-item active">Manajemen Pelanggan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <h3><strong>Manajemen Pelanggan</strong></h3>
    <p>Pantau data pengunjung dan pelanggan yang berbelanja di tokomu</p>
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Jenis kelamin pembeli</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="store-visits-source" data-colors='["--vz-primary", "--vz-info-rgb, 0.85"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div> <!-- .card-->
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr style="text-align: center">
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                        @foreach ($orderItem as $data )
                        @if (!empty($orderItem =! null))
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">{{ $data->order->order_number }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">{{ $data->order->user->name }}</div>
                                    </div>
                                </td>
                                <td>{{ $data->product->title }}</td>
                                <td>
                                    <span
                                        class="badge badge-soft-success">{{ $data->order->paymentdetail->status_code }}</span>
                                </td>
                            </tr><!-- end tr -->
                        </tbody><!-- end tbody -->
                        @endif
                        @endforeach
                           

                        </table><!-- end table -->
                    </div>
                </div>
            </div> <!-- .card-->
        </div>
    </div>
</div>

@endsection

@section('plugin')
<!-- apexcharts -->
<script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

<script>
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var r = document.getElementById(e).getAttribute("data-colors");
            if (r)
                return (r = JSON.parse(r)).map(function (e) {
                    var r = e.replace(" ", "");
                    if (-1 === r.indexOf(",")) {
                        var t = getComputedStyle(document.documentElement).getPropertyValue(
                            r
                        );
                        return t || r;
                    }
                    e = e.split(",");
                    return 2 != e.length ?
                        r :
                        "rgba(" +
                        getComputedStyle(document.documentElement).getPropertyValue(
                            e[0]
                        ) +
                        "," +
                        e[1] +
                        ")";
                });
            console.warn("data-colors atributes not found on", e);
        }
    }

    var options,
        chart,
        chartPieBasicColors = getChartColorsArray("store-visits-source");
    chartPieBasicColors &&
        ((options = {
                series: {!! json_encode(array_values($chartData)) !!},
                labels: {!! json_encode(array_keys($chartData)) !!},
                chart: {
                    height: 333,
                    type: "pie"
                },
                legend: {
                    position: "bottom"
                },
                stroke: {
                    show: !1
                },
                dataLabels: {
                    dropShadow: {
                        enabled: !1
                    }
                },
                colors: chartPieBasicColors,
            }),
            (chart = new ApexCharts(
                document.querySelector("#store-visits-source"),
                options
            )).render());

</script>
@endsection
