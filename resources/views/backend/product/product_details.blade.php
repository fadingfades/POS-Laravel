@extends('admin_dashboard')
@section('admin')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Detail Produk</h4>
                <h6>Informasi detail produk</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ route('all.product') }}" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Kembali Ke Daftar Produk</a>
                </div>
            </li>
        </ul>

    </div>
    <!-- /add -->
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bar-code-view">
                        <img src="{{ $barcodeBase64 }}" alt="barcode">
                    </div>
                    <div class="productdetails">
                        <ul class="product-bar">
                            <li>
                                <h4>Nama Produk</h4>
                                <h6>{{ $product->product_name }}</h6>
                            </li>
                            <li>
                                <h4>Kategori</h4>
                                <h6>{{ $product->category->category_name }}</h6>
                            </li>
                            <li>
                                <h4>Suplier</h4>
                                <h6>{{ $product->supllier->name }}</h6>
                            </li>
                            <li>
                                <h4>Kode</h4>
                                <h6>{{ $product->product_code }}</h6>
                            </li>
                            <li>
                                <h4>Jumlah Stok</h4>
                                <h6>{{ $product->product_store }}</h6>
                            </li>
                            <li>
                                <h4>Harga Beli</h4>
                                <h6>Rp {{ number_format($product->buying_price, 0, ',', '.') }}</h6>
                            </li>
                            <li>
                                <h4>Harga Jual</h4>
                                <h6>Rp {{ number_format($product->selling_price, 0, ',', '.') }}</h6>
                            </li>
                            <li>
                                <h4>Tanggal Masuk</h4>
                                <h6>{{ $product->buying_date }}</h6>
                            </li>
                            <li>
                                <h4>Tanggal Kadaluarsa</h4>
                                <h6>{{ $product->expire_date }}</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="slider-product-details">
                            <div class="slider-product">
                                <img src="{{ asset($product->product_image) }}" alt="img">
                                <h4>{{ $product->product_name }}</h4>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /add -->
</div>

@endsection
