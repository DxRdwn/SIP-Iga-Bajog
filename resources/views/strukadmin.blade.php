<!DOCTYPE html>
<html>

<head>
    <title>Struk</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            width: 58mm;
            /* biar kayak struk kasir */
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        hr {
            border-top: 1px dashed #000;
        }
    </style>
</head>

<body>

    <div class="text-center">
        <h3>WARUNG ANDA</h3>
        <p>Order Dapur</p>
    </div>

    <hr>

    <p>No Order : {{ $order->id }}</p>
    <p>Nama : {{ $order->customer_name }}</p>
    <p>Meja : {{ $order->table_number }}</p>

    @if ($order->note)
        <p>Catatan : {{ $order->note }}</p>
    @endif

    <hr>

    <!-- LIST MENU TANPA HARGA -->
    @foreach ($order->items as $item)
        <p>
            {{ $item->product->nama ?? '-' }}
            <span class="text-end">
                x{{ $item->quantity }}
            </span>
        </p>
    @endforeach

    <hr>


</body>

</html>
