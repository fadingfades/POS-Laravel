@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    $totalSupplier = \App\Models\Supplier::count();
    $totalProduct = \App\Models\Product::count();
    $totalCustomer = \App\Models\Customer::count();
    $productData = \App\Models\Product::latest()->get();
    $totalSales = \App\Models\Transaction::sum('total_amount');
@endphp

@extends('admin_dashboard')
@section('admin')

<div class="content">
    <div class="welcome d-lg-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center welcome-text">
            <h3 class="d-flex align-items-center"><img src="{{ asset('backend/assets/img/icons/hi.svg') }}" alt="img">&nbsp;Hai, {{ $adminData->name }}</h3></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>Rp {{ number_format($totalSales, 0, ',', '.') }}</h4>
                    <h5>Total Penjualan</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="shopping-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ $totalProduct }}</h4>
                    <h5>Total Barang</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="">
                    <h4>{{ $totalCustomer }}</h4>
                    <h5>Pelanggan</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>{{ $totalSupplier }}</h4>
                    <h5>Suplier</h5>
                </div>
                <div class="dash-imgs">
                    <img src="{{ asset('backend/assets/img/icons/file-text-icon-01.svg') }}" class="img-fluid" alt="icon">
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Produk Baru ditambahkan</h4>
            <div class="view-all-link">
                <a href="product-list.html" class="view-all d-flex align-items-center">
                    Lihat Semua<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right" class="feather-16"></i></span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive dataview">
                <table class="table dashboard-expired-products">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Kode</th>
                            <th>Harga</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Kadaluarsa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productData as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <div class="productimgname">
                                <div class="product-img">
                                    <img src="{{ asset($product->product_image) }}" alt="Example Image" class="img-201">
                                    <a href="javascript:void(0);">{{ $product->product_name }}</a>
                                </div>
                                </div>
                            </td>
                            <td><a href="javascript:void(0);">{{ $product->product_code }}</a></td>
                            <td>Rp {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                            <td>{{ $product->buying_date }}</td>
                            <td>{{ $product->expire_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
