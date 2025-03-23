@extends('admin_dashboard')
@section('admin')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Daftar Produk</h4>
                <h6>Kelola Data Produk</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('add.product') }}" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Tambah Data Baru</a>
        </div>
    </div>

    <!-- /product list -->
    <div class="card table-list-card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive product-list">
                <table class="table datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Input Oleh</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $key=> $item)
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
                                <td>{{ $item->product_code }}</td>
                                <td>{{ $item['category']['category_name'] }}</td>
                                <td>Rp {{ number_format($item->selling_price, 0, ',', '.') }}</td>
                                <td>{{ $item->product_store }}</td>
                                <td>{{ $item['supllier']['name'] }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon  p-2" href="{{ route('product.details', $item->id) }}">
                                            <i data-feather="eye" class="feather-eye"></i>
                                        </a>
                                        <a class="me-2 p-2" href="{{ route('edit.product', $item->id) }}" >
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="me-2 p-2 delete-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#delete-units">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /product list -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let deleteButtons = document.querySelectorAll(".delete-btn");
        let confirmDelete = document.getElementById("confirm-delete");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                let productId = this.getAttribute("data-id");
                confirmDelete.href = "/delete/product/" + productId;
            });
        });
    });
</script>

@endsection
