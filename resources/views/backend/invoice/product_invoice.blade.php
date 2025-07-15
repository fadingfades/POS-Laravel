<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>
    <style>
        * {
            font-family: monospace;
            font-size: 12px;
        }
        body {
            width: 300px;
            margin: auto;
            padding: 10px;
            background: #fff;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 2px 0;
        }
    </style>
</head>
<body>

    <div class="text-center">
        <strong>TEACHING FACTORY ALFAMART</strong><br>
        SMK NEGERI 1 PANGKEP<br>
        Jl. Sambungjawa, Pangkep<br>
    </div>

    <div class="line"></div>

    <div class="row">
        <span>Bon</span>
        <span>{{ $receiptNumber }}</span>
    </div>
    <div class="row">
        <span>Kasir</span>
        <span>{{ Auth::user()->name }}</span>
    </div>

    <div class="line"></div>

    <table>
            @php $total = 0; $i = 1; @endphp
            @foreach ($contents as $key => $item)
                @php
                    $lineTotal = $item->price * $item->qty;
                    $total += $lineTotal;
                @endphp
                <tr>
                    <td>{{ $item->name }}</td>
                    <td class="text-right">{{ $item->qty }} x {{ number_format($item->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right">{{ number_format($lineTotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td>Total Item</td>
            <td class="text-right">{{ Cart::count() }}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td class="text-right">{{ number_format($totalAmount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Tunai</td>
            <td class="text-right">{{ number_format($cashPaid, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Kembalian</td>
            <td class="text-right">{{ number_format($changeAmount, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="text-center">
        Tgl. {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
    </div>

    <div class="line"></div>

    <div class="text-center">
        Senang melayani anda!
    </div>

    <script>
        window.onload = function () {
            window.print();
            setTimeout(function () {
                window.close();
            }, 500);
        };
    </script>

</body>
</html>