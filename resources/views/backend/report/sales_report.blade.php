@extends('admin_dashboard')
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form method="GET" action="{{ route('sales.report') }}" class="d-inline">
                            <select name="month" class="form-control d-inline w-auto">
                                <option value="">Select Month</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                            <select name="year" class="form-control d-inline w-auto">
                                <option value="">Select Year</option>
                                @for ($y = date('Y'); $y >= 2000; $y--)
                                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary rounded-pill waves-effect waves-light">Filter</button>
                        </form>

                        <!-- Export to PDF -->
                        <a href="{{ route('sales.report.pdf', request()->all()) }}" class="btn btn-danger rounded-pill waves-effect waves-light">
                            Export PDF
                        </a>
                    </div>
                    <h4 class="page-title">Sales Report</h4>
                </div>
            </div>
        </div>

        <!-- Sales Report Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table dt-responsive nowrap w-100">
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
                                                <strong>{{ $sale->product->product_name }}</strong> -
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
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
