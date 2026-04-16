<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            width: 58mm;
        }

        .center {
            text-align: center;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        table {
            width: 100%;
            font-size: 11px;
        }

        td {
            padding: 2px 0;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="center">
        <strong>DUX COFFEE</strong><br>
        Jl. Contoh No.123<br>
        -------------------------
    </div>

    <p>No: {{ $order->id }}</p>
    <p>Nama: {{ $order->customer_name }}</p>
    <p>Meja: {{ $order->table_number }}</p>
    <p>{{ date('d/m/Y H:i') }}</p>

    <div class="line"></div>

    <table>
        @foreach ($order->items as $item)
            <tr>
                <td colspan="2">{{ $item->product->nama }}</td>
            </tr>
            <tr>
                <td>
                    {{ $item->quantity }} x {{ number_format($item->price) }}
                </td>
                <td class="right">
                    {{ number_format($item->quantity * $item->price) }}
                </td>
            </tr>
        @endforeach
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td class="right">
                <strong>{{ number_format($order->total) }}</strong>
            </td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        Terima Kasih 🙏<br>
        Powered by Dux Coffee
    </div>

</body>

</html>
