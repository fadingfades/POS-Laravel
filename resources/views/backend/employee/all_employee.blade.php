@php
    $totalEmployees = \App\Models\Employee::count();
@endphp

@extends('admin_dashboard')
@section('admin')

<style>
    .product-img {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .img-201 {
        width: 130px !important;
        height: 120px !important;
        border-radius: 5%;
        object-fit:cover;
        margin-bottom: 5px;
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
                <h4>Pegawai</h4>
                <h6>Kelola Data Pegawai</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('add.employee') }}" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Tambah Pegawai Baru</a>
        </div>
    </div>
    <!-- /product list -->
    <div class="card">
        <div class="card-body pb-0">
            <div class="table-top table-top-two table-top-new">

                <div class="search-set mb-0">
                    <div class="total-employees">
                        <h6><i data-feather="users" class="feather-user"></i>Jumlah Pegawai <span>{{ $totalEmployees }}</span></h6>
                    </div>
                    <div class="search-input">
                        <a href="" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                        <input type="search" class="form-control">
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /product list -->

    <div class="employee-grid-widget">
        <div class="row">
            @foreach($employee as $key => $item)
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                <div class="employee-grid-profile">
                    <div class="profile-head">
                        <label class="checkboxs">
                        </label>
                        <div class="profile-head-action">
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="more-vertical" class="feather-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('edit.employee', $item->id) }}" class="dropdown-item"><i data-feather="edit" class="info-img"></i>Ubah</a>
                                    </li>
                                    <li>
                                        <a data-id="{{ $item->id }}" class="dropdown-item mb-0 delete-btn" data-bs-toggle="modal" data-bs-target="#delete-employee"><i data-feather="trash-2" class="info-img"></i>Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="phone-img">
                            <div class="productimgname">
                                <div class="product-img">
                                    <img src="{{ asset($item->image) }}" alt="Example Image" class="img-201">
                                </div>
                                </div>
                        </div>
                        <h5>{{ $item->email }}</h5>
                        <h4>{{ $item->name }}</h4>
                        <span>Kasir</span>
                    </div>
                    <ul class="department">
                        <li>
                            Kota
                            <span>{{ $item->city }}</span>
                        </li>
                        <li>
                            Nomor Telepon
                            <span>{{ $item->phone }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let deleteButtons = document.querySelectorAll(".delete-btn");
        let confirmDelete = document.getElementById("confirm-delete-employee");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                let employeeId = this.getAttribute("data-id");
                confirmDelete.href = "/delete/employee/" + employeeId;
            });
        });
    });
</script>

@endsection
