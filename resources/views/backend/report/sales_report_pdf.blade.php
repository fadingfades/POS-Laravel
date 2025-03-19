<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Sales Report</h2>
    @if($month || $year)
        <p>Filter:
            @if($month) Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }} @endif
            @if($year) Year: {{ $year }} @endif
        </p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Sl</th>
                <th>Customer</th>
                <th>Products</th>
                <th>Total Sales</th>
                <th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($query as $key => $transaction)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $transaction->customer->name ?? 'Walk-in Customer' }}</td>
                    <td>
                        @foreach($transaction->sales as $sale)
                            {{ $sale->product->product_name }} -
                            {{ $sale->quantity }} pcs × Rp {{ number_format($sale->price, 0, ',', '.') }} =
                            <strong>Rp {{ number_format($sale->total, 0, ',', '.') }}</strong><br>
                        @endforeach
                    </td>
                    <td><strong>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</strong></td>
                    <td>{{ date('d M Y', strtotime($transaction->transaction_date)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
