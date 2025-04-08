@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Daftar Suplier</h4>
                <h6>Kelola Data Suplier</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-supplier"><i data-feather="plus-circle" class="me-2"></i>Tambah Suplier Baru</a>
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
                            <th>Nama Suplier</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tipe</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplier as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <div class="productimgname">
                                    <div class="product-img">
                                        <img src="{{ asset($item->image) }}" alt="Example Image" class="img-201">
                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->type }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2 btn-detail-supplier" href="#" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#detail-supplier">
                                        <i data-feather="eye" class="feather-eye"></i>
                                    </a>
                                    <a class="me-2 p-2 editSupplierBtn" href="#" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#edit-supplier">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    <a class="me-2 p-2 btn-delete-supplier" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#delete-supplier">
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
    $(document).ready(function () {
        $('#addSupplierForm').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('supplier.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#add-supplier').modal('hide');
                    $('#addSupplierForm')[0].reset();
                    alert('Supplier berhasil ditambahkan');
                    location.reload();
                },
                error: function () {
                    alert('Gagal menambahkan supplier');
                }
            });
        });

        $(document).on('click', '.editSupplierBtn', function (e) {
            e.preventDefault();
            let supplierId = $(this).data('id');

            $.ajax({
                url: "/details/supplier/" + supplierId,
                type: "GET",
                success: function (data) {
                    $('#edit-supplier [name="id"]').val(supplierId);
                    $('#edit-supplier [name="name"]').val(data.name);
                    $('#edit-supplier [name="email"]').val(data.email);
                    $('#edit-supplier [name="phone"]').val(data.phone);
                    $('#edit-supplier [name="address"]').val(data.address);
                    $('#edit-supplier [name="shopname"]').val(data.shopname);
                    $('#edit-supplier [name="account_holder"]').val(data.account_holder);
                    $('#edit-supplier [name="bank_name"]').val(data.bank_name);
                    $('#edit-supplier [name="bank_branch"]').val(data.bank_branch);
                    $('#edit-supplier [name="city"]').val(data.city);
                    $('#edit-supplier select[name="type"]').val(data.type).trigger('change');
                    $('#edit-supplier img').attr('src', '/' + data.image);
                    $('#edit-supplier').modal('show');
                },
                error: function () {
                    alert('Gagal memuat data supplier untuk diedit');
                }
            });
        });

        $('#editSupplierForm').on('submit', function (e) {
            e.preventDefault();

            let supplierId = $('#editSupplierForm [name="id"]').val();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('supplier.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    $('#edit-supplier').modal('hide');
                    alert('Supplier berhasil diperbarui');
                    location.reload();
                },
                error: function () {
                    alert('Gagal memperbarui supplier');
                }
            });
        });

        $(document).on('click', '.btn-detail-supplier', function (e) {
            e.preventDefault();
            let supplierId = $(this).data('id');

            $.ajax({
                url: "/details/supplier/" + supplierId,
                type: "GET",
                success: function (data) {
                    $('#detail-supplier [name="name"]').val(data.name);
                    $('#detail-supplier [name="email"]').val(data.email);
                    $('#detail-supplier [name="phone"]').val(data.phone);
                    $('#detail-supplier [name="address"]').val(data.address);
                    $('#detail-supplier [name="shopname"]').val(data.shopname);
                    $('#detail-supplier [name="account_holder"]').val(data.account_holder);
                    $('#detail-supplier [name="bank_name"]').val(data.bank_name);
                    $('#detail-supplier [name="bank_branch"]').val(data.bank_branch);
                    $('#detail-supplier [name="city"]').val(data.city);
                    $('#detail-supplier select[name="type"]').val(data.type).trigger('change');
                    $('#detail-supplier img').attr('src', '/' + data.image);
                    $('#detail-supplier').modal('show');
                },
                error: function () {
                    alert('Gagal mengambil data supplier untuk dilihat');
                }
            });
        });

        // ----- DELETE SUPPLIER -----
        let deleteSupplierId = null;

        $(document).on('click', '.btn-delete-supplier', function (e) {
            e.preventDefault();
            deleteSupplierId = $(this).data('id');
            $('#delete-supplier').modal('show');
        });

        $('#delete-supplier').on('click', '.btn-danger', function (e) {
            e.preventDefault();
            if (deleteSupplierId) {
                $.ajax({
                    url: "/delete/supplier/" + deleteSupplierId,
                    type: "GET",
                    success: function () {
                        $('#delete-supplier').modal('hide');
                        alert('Supplier berhasil dihapus');
                        location.reload();
                    },
                    error: function () {
                        alert('Gagal menghapus supplier');
                    }
                });
            }
        });

});


    $(document).ready(function(){
        $('#image-supplier').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage-supplier').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
