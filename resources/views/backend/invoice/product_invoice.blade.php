<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
@media print {
    /* Hilangkan header dan footer default browser */
    @page {
        size: auto;
        margin: 0;
    }

    /* Pastikan judul tidak muncul */
    title {
        display: none;
    }
}
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #444;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 8px;
            box-sizing: border-box;
            font-size: 9px; /* Adjust font size for smaller paper */
			margin-bottom: auto;
        }

        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 6px;
			margin-top: 6px;
        }

        .header .company-name {
            font-size: 10px;
            font-weight: 700;
            color: #333;
            margin-bottom: 4px;
        }

        .header .company-info {
            font-size: 7px;
            font-weight: 600;
            color: #777;
            line-height: 1.3;
        }

        /* Invoice Information Section */
        .invoice-info {
            margin-bottom: 8px;
            font-size: 8px;
            color: #555;
            line-height: 1.4;
        }

        .invoice-info .strong {
            font-weight: 700;
            color: #333;
        }

        .invoice-info div {
            margin-bottom: 3px;
        }

        /* Item List Section */
        .items {
            margin-bottom: 12px;
            font-size: 8px;
        }

        /* Flexbox for item layout */
        .items .item {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .items .item:last-child {
            border-bottom: none;
        }

        .items .item-description {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            flex-grow: 1;
        }

        .items .item-price,
        .items .item-qty,
        .items .item-total {
            text-align: right;
            font-size: 8px;
            width: 35px;
        }

        /* Totals Section */
        .totals {
            font-size: 8px;
            font-weight: 600;
            color: #333;
        }

        .totals .total-line {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
            border-bottom: 1px solid #eee;
        }

        .totals .total-line:last-child {
            border-bottom: none;
            font-size: 9px;
            font-weight: 700;
        }

        /* Divider Line */
        .line {
            margin: 8px 0;
            border-top: 1px solid #eee;
        }

        /* Thank you note */
        .thank-you {
            text-align: center;
            font-size: 7px;
            color: #999;
            margin-top: 6px;
        }

    </style>
</head>
<body>

    <div class="header">
        <div class="company-name">TEACHING FACTORY ALFAMART</div>
        <div class="company-info">
            <div>SMKN 1 PANGKEP</div>
            <div>Jl. Sambung Jawa, Samalewa, Kec. Pangkajene, Kabupaten Pangkajene Dan Kepulauan</div>
        </div>
    </div>

    <div class="invoice-info">
        <div><span class="strong">Resi Invoice</span></div>
        <div><span class="strong">Customer Id:</span> <strong>#LL93784</strong></div>
        <div><span class="strong">Date:</span> <strong>01.07.2022</strong></div>
    </div>

    <div class="items">
        <!-- Items List -->
        @php $sl = 1; @endphp
        @foreach($contents as $key => $item)
        <div class="item">
            <div class="item-description">{{ $sl++ }} {{ $item->name}}</div>
            <div class="item-qty"><strong>{{ $item->qty }}</strong></div>
            <div class="item-price">Rp <strong>{{ $item->price }}</strong></div>
            <div class="item-total">Rp <strong>{{ $item->price * $item->qty }}</strong></div>
        </div>
        @endforeach
    </div>

    <div class="line"></div>

    <div class="totals">
        <div class="total-line">
            <div><strong>Total Tagihan</strong></div>
            <div><strong>Rp {{ Cart::subtotal() }}</strong></div>
        </div>
    </div>
</body>
</html>
