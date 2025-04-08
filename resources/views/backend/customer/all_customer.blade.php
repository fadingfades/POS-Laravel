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
        width: 40px !important;
        height: 40px !important;
        border-radius: 5%;
        object-fit: cover;
    }

    .cust-name {
        font-size: 14px;
        color: #000;
        text-decoration: none;
        white-space: nowrap;
    }

    .cust-img {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .img-202 {
        width: 140px !important;
        height: 120px !important;
        border-radius: 20%;
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

    .img-202 {
        width: 130px !important;
        height: 110px !important;
        object-fit: cover;
        border-radius: 5%;
    }

</style>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Daftar Pelanggan</h4>
                <h6>Kelola Data Pelanggan</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i data-feather="plus-circle" class="me-2"></i>Tambah Pelanggan Baru</a>
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
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Kode Akun</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $key => $item)
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
                            <td>{{ $item->id }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a href="#" class="btn-detail me-2 p-2" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#detail-units">
                                        <i data-feather="eye" class="feather-eye"></i>
                                    </a>
                                    <a href="#" class="btn-edit me-2 p-2" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#edit-units">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    <a href="#" class="btn-delete me-2 p-2" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#delete-units">
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

    $('#addCustomerForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('customer.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#add-units').modal('hide');
                $('#addCustomerForm')[0].reset();
                alert('Pelanggan berhasil ditambahkan');
                location.reload();
            },
            error: function(response) {
                alert('Gagal menambahkan pelanggan');
            }
        });
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        let customerId = $(this).data('id');
        $.ajax({
            url: "/edit/customer/" + customerId, // route: GET /edit/customer/{id}
            type: "GET",
            success: function (data) {
                // Update edit modal input fields
                $('#edit_customer_id').val(data.id);
                $('#edit-units [name="name"]').val(data.name);
                $('#edit-units [name="email"]').val(data.email);
                $('#edit-units [name="phone"]').val(data.phone);
                $('#edit-units [name="address"]').val(data.address);
                $('#edit-units [name="shopname"]').val(data.shopname);
                $('#edit-units [name="account_holder"]').val(data.account_holder);
                $('#edit-units [name="bank_name"]').val(data.bank_name);
                $('#edit-units [name="bank_branch"]').val(data.bank_branch);
                $('#edit-units [name="city"]').val(data.city);
                // If you want to update the image preview, you can do so:
                $('#edit-units img').attr('src', '/' + data.image);
                $('#edit-units').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data pelanggan untuk diedit');
            }
        });
    });

    $('#updateCustomerForm').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('customer.update') }}", // ✅ Correct route
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#edit-units').modal('hide');
            $('#updateCustomerForm')[0].reset();
            alert('Pelanggan berhasil diperbarui');
            location.reload(); // Or call your loadCustomers() function if you have one
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Gagal memperbarui pelanggan');
        }
        });
    });

    // ----- DETAIL CUSTOMER -----
    // When the detail button is clicked, reuse the same route to fetch data.
    $(document).on('click', '.btn-detail', function (e) {
        e.preventDefault();
        let customerId = $(this).data('id');
        $.ajax({
            url: "/edit/customer/" + customerId,  // same as edit route
            type: "GET",
            success: function (data) {
                // Populate the detail modal with data.
                $('#detail-units [name="name"]').val(data.name);
                $('#detail-units [name="email"]').val(data.email);
                $('#detail-units [name="phone"]').val(data.phone);
                $('#detail-units [name="address"]').val(data.address);
                $('#detail-units [name="shopname"]').val(data.shopname);
                $('#detail-units [name="account_holder"]').val(data.account_holder);
                $('#detail-units [name="bank_name"]').val(data.bank_name);
                $('#detail-units [name="bank_branch"]').val(data.bank_branch);
                $('#detail-units [name="city"]').val(data.city);
                // Update image preview if necessary:
                $('#detail-units img').attr('src', '/' + data.image);
                $('#detail-units').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data pelanggan untuk dilihat');
            }
        });
    });

    // ----- DELETE CUSTOMER -----
    let deleteCustomerId = null;
    // When the delete button is clicked, store the customer ID.
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        deleteCustomerId = $(this).data('id');
        // Show the delete confirmation modal (your modal already opens via data-bs-target).
        $('#delete-units').modal('show');
    });

    // When the confirm delete button is clicked in the delete modal,
    // call the delete route.
    $('#delete-units').on('click', '.btn-danger', function (e) {
        e.preventDefault();
        if (deleteCustomerId) {
            $.ajax({
                url: "/delete/customer/" + deleteCustomerId,  // GET route for delete
                type: "GET",
                success: function () {
                    $('#delete-units').modal('hide');
                    alert('Pelanggan berhasil dihapus');
                    location.reload();
                },
                error: function () {
                    alert('Gagal menghapus pelanggan');
                }
            });
        }
    });

});

$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});

$(document).ready(function(){
        $('#image-edit').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage-edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
