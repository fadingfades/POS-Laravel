<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Resi Pembelian</title>
    <style>
        * {
            font-family: monospace;
            font-size: 12px;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 10px;
            width: 100%;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .mb-0 {
            margin-bottom: 0;
        }
        .mb-1 {
            margin-bottom: 5px;
        }
        .mt-1 {
            margin-top: 5px;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            text-align: left;
            padding: 2px 0;
        }
        .total-row td {
            padding-top: 4px;
            border-top: 1px dashed #000;
        }
        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .footer {
            margin-top: 15px;
            text-align: center;
        }
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="text-center">
        <h4 class="mb-0">TEACHING FACTORY ALFAMART</h4>
        <p class="mb-0">SMK NEGERI 1 PANGKEP</p>
        <p class="mb-0">Jl. Sambungjawa, Pangkep</p>
    </div>

    <hr>

    <div class="row mb-1">
        <div><strong>Nama:</strong> {{ $customer->name ?? '-' }}</div>
        <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::now()->format('d.m.Y') }}</div>
    </div>

    <strong class="text-center">Resi Pembelian: {{ $receiptNumber ?? '-' }}</strong>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Harga</th>
                <th>Qty</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; $i = 1; @endphp
            @foreach ($contents as $key => $item)
                @php
                    $lineTotal = $item->price * $item->qty;
                    $total += $lineTotal;
                @endphp
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->qty }}</td>
                    <td class="text-right">Rp{{ number_format($lineTotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <table>
        <tr>
            <td><strong>Sub Total</strong></td>
            <td class="text-right">Rp{{ number_format($totalAmount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Total Bill</strong></td>
            <td class="text-right">Rp{{ number_format($totalAmount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Cash Paid</strong></td>
            <td class="text-right">Rp{{ number_format($cashPaid ?? 0, 0, ',', '.') }}</td>
        </tr>
        <tr class="total-row">
            <td><strong>Change</strong></td>
            <td class="text-right"><strong>Rp{{ number_format($changeAmount ?? 0, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
    <script>
        window.onload = function () {
            window.print();
            setTimeout(function () {
                window.close();
            }, 500); // Delay to ensure print dialog is processed
        };
    </script>
</body>
</html>
