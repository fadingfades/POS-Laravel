@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .product-img {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .img-201 {
        width: 140px !important;
        height: 120px !important;
        border-radius: 10%;
        object-fit:contain;
    }

    .img-203 {
        width: 40px !important;
        height: 35px !important;
        border-radius: 2%;
        object-fit: cover;
    }

    .img-204 {
        width: 40px !important;
        height: 40px !important;
        border-radius: 100%;
        object-fit: cover;
    }

    .product-name {
        font-size: 14px;
        color: #000;
        text-decoration: none;
        white-space: nowrap;
    }
    </style>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Ubah Produk</h4>
                <h6>Ubah data produk</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="product-list.html" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Kembali Ke Daftar Produk</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
    <!-- /add -->
    <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="card">
            <div class="card-body add-product pb-0">
                <div class="accordion-card-one accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"  aria-controls="collapseOne">
                                <div class="addproduct-icon">
                                    <h5><i data-feather="info" class="add-info"></i><span>Informasi Produk</span></h5>
                                    <a href="javascript:void(0);"><i data-feather="chevron-down" class="chevron-down-add"></i></a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="input-blocks add-product list">
                                        <label>Nama Produk</label>
                                        <input type="text" name="product_name" class="form-control list" value="{{ $product->product_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Kategori</label>
                                        <select name="category_id" class="select">
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $cat->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Suplier</label>
                                        <select name="supplier_id" class="select">
                                            @foreach($supplier as $sup)
                                                <option value="{{ $sup->id }}" {{ $sup->id == $product->supplier_id ? 'selected' : '' }}>
                                                    {{ $sup->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="input-blocks add-product list">
                                        <label>Kode Barcode</label>
                                        <input type="text" name="product_code" class="form-control list" value="{{ $product->product_code }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="input-blocks add-product list">
                                        <label>Harga Pembelian Produk</label>
                                        <input type="text" name="buying_price" class="form-control list" value="{{ $product->buying_price }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="input-blocks add-product list">
                                        <label>Harga Penjualan Produk</label>
                                        <input type="text" name="selling_price" class="form-control list"  value="{{ $product->selling_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="input-blocks add-product">
                                        <label>Jumlah Stok</label>
                                        <input type="text" name="product_store" class="form-control" value="{{ $product->product_store }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>Tanggal Masuk</label>

                                        <div class="input-groupicon calender-input">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <input name="buying_date" type="text" class="datetimepicker" value="{{ $product->buying_date }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>Tanggal Kadaluarsa</label>

                                        <div class="input-groupicon calender-input">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <input name="expire_date" type="text" class="datetimepicker" value="{{ $product->expire_date }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-card-one accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="accordion-card-one accordion" id="accordionExample3">
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="headingThree">
                                                    <div class="accordion-button"  data-bs-toggle="collapse" data-bs-target="#collapseThree"  aria-controls="collapseThree">
                                                        <div class="addproduct-icon list">
                                                            <h5><i data-feather="image" class="add-info"></i><span>Gambar</span></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                                <div class="accordion-body">
                                                    <div class="text-editor add-list add">
                                                        <div class="col-lg-12">
                                                            <div class="add-choosen">
                                                                <div class="input-blocks">
                                                                    <div class="image-upload">
                                                                        <input type="file" id="image" name="product_image">
                                                                        <div class="image-uploads">
                                                                            <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                                                            <h4>Upload Gambar</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="phone-img">
                                                                    <div class="productimgname">
                                                                        <div class="product-img">
                                                                            <img id="showImage" src="{{ asset($product->product_image) }}" alt="Example Image" class="img-201">
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan Data </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- /add -->

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
