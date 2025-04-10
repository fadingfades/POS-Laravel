@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Akses Kontrol</h4>
                <h6>Kelola Data Akses Kontrol</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-permission"><i data-feather="plus-circle" class="me-2"></i> Tambah Akses Baru</a>
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
            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th class="no-sort">#</th>
                            <th>Nama Akses</th>
                            <th>Nama Group</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->group_name }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2 btn-edit" data-id="{{ $item->id }}" href="#" data-bs-toggle="modal" data-bs-target="#edit-permission">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    <a class="me-2 p-2 btn-delete" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#delete-permission">
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
        $('#addPermissionForm').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('permission.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#add-permission').modal('hide');
                    $('#addPermissionForm')[0].reset();
                    alert('Akses berhasil ditambahkan');
                    location.reload();
                },
                error: function () {
                    alert('Gagal menambahkan akses');
                }
            });
        });

        $(document).on('click', '.btn-edit', function (e) {
            e.preventDefault();
            let permissionId = $(this).data('id');
            $.ajax({
                url: "/edit/permission/" + permissionId, // route: GET /edit/customer/{id}
                type: "GET",
                success: function (data) {
                    // Update edit modal input fields
                    $('#edit_permission_id').val(data.id);
                    $('#edit-permission [name="name"]').val(data.name);
                    $('#edit-permission [name="group_name"]').val(data.group_name).trigger('change');
                    $('#edit-permission').modal('show');
                },
                error: function () {
                    alert('Gagal mengambil data izin untuk diedit');
                }
            });
        });

        $('#editPermissionForm').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('permission.update') }}", // ✅ Correct route
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#edit-permission').modal('hide');
                    $('#editPermissionForm')[0].reset();
                    alert('Akses berhasil diperbarui');
                    location.reload(); // Or call your loadCustomers() function if you have one
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert('Gagal memperbarui akses');
                }
            });
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            deletePermissionId = $(this).data('id');
            $('#delete-permission').modal('show');
        });

        $('#delete-permission').on('click', '.btn-danger', function (e) {
            e.preventDefault();
            if (deletePermissionId) {
                $.ajax({
                    url: "/delete/permission/" + deletePermissionId,  // GET route for delete
                    type: "GET",
                    success: function () {
                        $('#delete-permission').modal('hide');
                        alert('Akses berhasil dihapus');
                        location.reload();
                    },
                    error: function () {
                        alert('Gagal menghapus akses');
                    }
                });
            }
        });
    });
</script>

@endsection
