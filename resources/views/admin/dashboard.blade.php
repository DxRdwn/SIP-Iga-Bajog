@extends('admin.layout.layout')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Total Revenue -->
            <div class="col-lg-4 col-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan <span>| Total</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-lg-4 col-12">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pesanan</h5>
                        <h6>{{ $totalOrders }}</h6>
                    </div>
                </div>
            </div>

            <!-- Total Produk -->
            <div class="col-lg-4 col-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Menu Tersedia</h5>
                        <h6>{{ $totalProducts }}</h6>
                    </div>
                </div>
            </div>

            <!-- Grafik Penjualan -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Penjualan (7 hari terakhir)</h5>
                        <div id="salesChart"></div>
                    </div>
                </div>
            </div>

            <!-- Pesanan Terbaru -->
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Terbaru</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Nama Customer</th>
                                    <th>Nomor Meja</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->table_number }}</td>
                                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td>
                                            <span
                                                class="badge
                        @if ($order->status == 'pending') bg-warning
                        @elseif($order->status == 'diproses') bg-primary
                        @else bg-success @endif">{{ $order->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let labels = {!! json_encode($labels) !!};
            let totals = {!! json_encode($totals) !!};

            const chart = new ApexCharts(document.querySelector("#salesChart"), {
                series: [{
                    name: 'Penjualan',
                    data: totals
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                }
            });

            chart.render();
        });
    </script>
@endsection
