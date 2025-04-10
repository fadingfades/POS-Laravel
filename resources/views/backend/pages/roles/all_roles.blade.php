@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Peran</h4>
                <h6>Kelola Data Peran</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-roles"><i data-feather="plus-circle" class="me-2"></i> Tambah Peran Baru</a>
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
                            <th>Nama Peran</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2 edit-btn" href="#" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#edit-roles">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    <a class="me-2 p-2 delete-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#delete-roles">
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
        $('#addRolesForm').on('submit', function(e) {
            e.preventDefault();
            let rolesName = $('#add-roles-name').val();

            $.ajax({
                url: "{{ route('roles.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: rolesName
                },
                success: function(response) {
                    alert(response.message);
                    $('#add-roles').modal('hide'); // Close the modal
                    location.reload(); // Refresh the table
                },
                error: function(xhr) {
                    alert("Gagal menambahkan peran. Pastikan input tidak kosong.");
                }
            });
        });

        $('.edit-btn').on('click', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('#edit-roles-id').val(id);
            $('#edit-roles-name').val(name);
        });

        $('#editRolesForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#edit-roles-id').val();
            let name = $('#edit-roles-name').val();

            $.ajax({
                url: "{{ route('roles.update') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    name: name
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Refresh table after update
                },
                error: function(response) {
                    alert("Gagal memperbarui peran.");
                }
            });
        });

        $('.delete-btn').on('click', function() {
            let id = $(this).data('id');
            $('#delete-roles-id').val(id);
        });

        $('#confirm-delete-roles').on('click', function() {
            let id = $('#delete-roles-id').val();

            $.ajax({
                url: `/delete/roles/${id}`,
                method: "GET",
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Refresh table after delete
                },
                error: function(response) {
                    alert("Gagal menghapus peran.");
                }
            });
        });
    });
</script>

@endsection
