@extends('admin.layout.layout')
@section('content')
    <div class="pagetitle">
        <h1>Data Pesanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Pesanan</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Daftar Pesanan</h5>

                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>No. Meja</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->table_number }}</td>
                                <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge
                        @if ($order->status == 'pending') bg-warning
                        @elseif($order->status == 'diproses') bg-primary
                        @else bg-success @endif">
                                        {{ ucfirst($order->status ?? 'pending') }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $order->id }}">
                                        Detail
                                    </button>
                                    <a href="{{ route('order.updateStatus', $order->id) }}" class="btn btn-success btn-sm">
                                        ✔ Selesai
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- MODAL KUMPUL DI SINI --}}
                @foreach ($orders as $order)
                    <div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- HEADER -->
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Detail Pesanan - {{ $order->customer_name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- BODY -->
                                <div class="modal-body">

                                    <p><strong>No. Meja:</strong> {{ $order->table_number }}</p>
                                    <p><strong>Catatan:</strong> {{ $order->note ?? '-' }}</p>

                                    <!-- STATUS -->
                                    <p>
                                        <strong>Status:</strong>
                                        <span
                                            class="badge 
                            @if ($order->status == 'pending') bg-warning
                            @elseif($order->status == 'diproses') bg-primary
                            @else bg-success @endif">
                                            {{ ucfirst($order->status ?? 'pending') }}
                                        </span>
                                    </p>

                                    <!-- LIST MENU -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th width="80">Qty</th>
                                                <th width="150">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order->items as $item)
                                                <tr>
                                                    <td>{{ $item->product->nama ?? 'Produk tidak ditemukan' }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted">
                                                        Tidak ada item pesanan
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <!-- TOTAL -->
                                    <h5 class="text-end">
                                        Total: Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </h5>

                                    <hr>

                                    <!-- BUKTI PEMBAYARAN -->
                                    <p><strong>Bukti Pembayaran:</strong></p>

                                    @if ($order->bukti_img)
                                        <div class="text-center mb-3">
                                            <a href="{{ asset('storage/' . $order->bukti_img) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $order->bukti_img) }}"
                                                    alt="Bukti Pembayaran" class="img-fluid rounded shadow"
                                                    style="max-height:300px;">
                                            </a>
                                        </div>
                                    @else
                                        <p class="text-muted">Belum ada bukti pembayaran</p>
                                    @endif

                                </div>

                                <!-- FOOTER -->
                                <div class="modal-footer d-flex justify-content-between">

                                    <!-- DOWNLOAD STRUK (HANYA JIKA SUDAH BAYAR) -->
                                    @if ($order->bukti_img)
                                        <a href="{{ route('order.strukadmin', $order->id) }}" class="btn btn-primary"
                                            target="_blank">
                                            🧾 Download Struk
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Belum Bayar
                                        </button>
                                    @endif

                                    <!-- TUTUP -->
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Tutup
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
