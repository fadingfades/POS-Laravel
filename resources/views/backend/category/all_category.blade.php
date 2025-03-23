@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Daftar Kategori</h4>
                <h6>Kelola Data Kategori</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-category"><i data-feather="plus-circle" class="me-2"></i>Tambah Kategori Baru</a>
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
            <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="input-blocks">
                                <i data-feather="zap" class="info-img"></i>
                                <select class="select">
                                    <option>Choose Category</option>
                                    <option>Laptop</option>
                                    <option>Electronics</option>
                                    <option>Shoe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="input-blocks">
                                <i data-feather="calendar" class="info-img"></i>
                                <div class="input-groupicon">
                                    <input type="text" class="datetimepicker" placeholder="Choose Date" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="input-blocks">
                                <i data-feather="stop-circle" class="info-img"></i>
                                <select class="select">
                                    <option>Choose Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                            <div class="input-blocks">
                                <a class="btn btn-filters ms-auto"> <i data-feather="search" class="feather-search"></i> Search </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Filter -->
            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 p-2 edit-btn"
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edit-category"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->category_name }}">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="me-2 p-2 delete-btn"
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete-category"
                                            data-id="{{ $item->id }}">
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
    $(document).ready(function() {
    // Open Edit Modal & Populate Fields
    $('.edit-btn').on('click', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        $('#edit-category-id').val(id);
        $('#edit-category-name').val(name);
    });

    // Handle Edit Form Submission
    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#edit-category-id').val();
        let name = $('#edit-category-name').val();

        $.ajax({
            url: "{{ route('category.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                category_name: name
            },
            success: function(response) {
                alert(response.message);
                location.reload(); // Refresh table after update
            },
            error: function(response) {
                alert("Gagal memperbarui kategori.");
            }
        });
    });

    // Open Delete Modal
    $('.delete-btn').on('click', function() {
        let id = $(this).data('id');
        $('#delete-category-id').val(id);
    });

    // Handle Delete Confirmation
    $('#confirm-delete').on('click', function() {
        let id = $('#delete-category-id').val();

        $.ajax({
            url: `/delete/category/${id}`,
            method: "GET",
            success: function(response) {
                alert(response.message);
                location.reload(); // Refresh table after delete
            },
            error: function(response) {
                alert("Gagal menghapus kategori.");
            }
        });
    });

    // Handle Add Category Form Submission
    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();
        let categoryName = $('#add-category-name').val();

        $.ajax({
            url: "{{ route('category.store') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                category_name: categoryName
            },
            success: function(response) {
                alert(response.message);
                $('#add-category').modal('hide'); // Close the modal
                location.reload(); // Refresh the table
            },
            error: function(xhr) {
                alert("Gagal menambahkan kategori. Pastikan input tidak kosong.");
            }
        });
    });
});
</script>

@endsection
