@extends('admin_dashboard')
@section('admin')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Daftar Stok</h4>
                <h6>Kelola Data Stok</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i data-feather="plus-circle" class="me-2"></i>Tambah Stok</a>
        </div>
    </div>
    <!-- /product list -->
    <div class="card table-list-card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                        <a href="" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Filter -->
            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th class="no-sort">#</th>
                            <th>Nama Produk</th>
                            <th>Suplier</th>
                            <th>Kode</th>
                            <th>Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <div class="productimgname">
                                        <div class="product-img">
                                            <img src="{{ asset($item->product_image) }}" alt="Example Image" class="img-201">
                                            <a href="javascript:void(0);">{{ $item->product_name }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item['supllier']['name'] }}</td>
                                <td>{{ $item->product_code }}</td>
                                <td>{{ $item->product_store }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /product list -->
</div>

@endsection
