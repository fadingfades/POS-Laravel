@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
					<div class="page-header">
						<div class="add-item d-flex">
							<div class="page-title">
								<h4>Daftar Admin</h4>
								<h6>Kelola Data Admin</h6>
							</div>
						</div>
						<div class="page-btn">
							<a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-admin"><i data-feather="plus-circle" class="me-2"></i>Tambah Admin Baru</a>
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
								<table class="table datanew">
									<thead>
										<tr>
											<th class="no-sort">#</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Nomor Telepon</th>
											<th>Role</th>
											<th class="no-sort">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($alladminuser as $key => $item)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>
												<div class="productimgname">
													<div class="product-img">
														<img src="{{ (!empty($item->photo)) ? url('upload/admin_image/'.$item->photo) : url('upload/no_image.jpg') }}" alt="Example Image" class="img-201">
														<a href="javascript:void(0);">{{ $item->name }}</a>
													</div>
												</div>
											</td>
											<td>{{ $item->email }}</td>
											<td>{{ $item->phone }}</td>
											<td>
                                                @foreach($item->roles as $role)
                                                <span class="badge badge-linesuccess">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 p-2 mb-0 edit-admin-btn" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#edit-admin">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="me-2 p-2 mb-0" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#delete-admin">
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
		$('#add-admin').on('show.bs.modal', function () {
			$.ajax({
				url: '{{ route("admin.get.roles") }}',
				type: 'GET',
				dataType: 'json',
				success: function(roles) {
					let roleSelect = $('#addAdminForm select[name="roles"]');
					roleSelect.empty();
					roleSelect.append('<option disabled selected>Pilih Peran</option>');
					$.each(roles, function(index, role) {
						roleSelect.append(`<option value="${role.id}">${role.name}</option>`);
					});
				}
			});
		});

		$('#addAdminForm').on('submit', function(e) {
			e.preventDefault();

			let formData = new FormData(this);

			$.ajax({
				url: "{{ route('admin.store') }}",
				method: "POST",
				data: formData,
				dataType: "json",
				contentType: false,
				processData: false,
				success: function(response) {
					$('#add-admin').modal('hide');
					$('#addAdminForm')[0].reset();
					alert("Berhasil menambahkan admin!");
					location.reload(); // Optional: reload to see the new admin in the list
				},
				error: function(xhr) {
					console.log(xhr.responseJSON);
					alert("Gagal menambahkan admin. Periksa input kamu!");
				}
			});
		});

		$(document).on('click', '.edit-admin-btn', function () {
			let adminId = $(this).data('id');

			$.ajax({
				url: `/edit/admin/${adminId}`,
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					// Populate input fields
					let modal = $('#edit-admin');
					modal.find('input[name="id"]').val(response.adminuser.id);
					modal.find('input[name="name"]').val(response.adminuser.name);
					modal.find('input[name="email"]').val(response.adminuser.email);
					modal.find('input[name="phone"]').val(response.adminuser.phone);

					// Populate roles
					let roleSelect = modal.find('select[name="roles"]');
					roleSelect.empty();
					roleSelect.append('<option disabled selected>Pilih Peran</option>');
					$.each(response.roles, function(index, role) {
						const selected = response.adminuser.roles.includes(role.name) ? 'selected' : '';
						roleSelect.append(`<option value="${role.id}" ${selected}>${role.name}</option>`);
					});

					modal.modal('show');
				}
			});
		});

		$('#editAdminForm').on('submit', function(e) {
			e.preventDefault();

			let formData = new FormData(this);

			$.ajax({
				url: "{{ route('admin.update') }}",
				method: "POST",
				data: formData,
				dataType: "json",
				contentType: false,
				processData: false,
				success: function(response) {
					$('#edit-admin').modal('hide');
					$('#editAdminForm')[0].reset();
					alert("Berhasil memperbarui admin!")
					location.reload(); // Optional: reload to reflect the changes
				},
				error: function(xhr) {
					console.log(xhr.responseJSON);
					alert("Gagal memperbarui admin. Periksa inputmu!");
				}
			});
		});

		let adminIdToDelete = null;

		$(document).on('click', '[data-bs-target="#delete-admin"]', function () {
			adminIdToDelete = $(this).data('id');  // store admin id for delete
		});

		$('#confirmDeleteBtn').on('click', function() {
			if (!adminIdToDelete) return;

			$.ajax({
				url: `/delete/admin/${adminIdToDelete}`,  // Your GET delete route
				type: 'GET',
				success: function(response) {
					$('#delete-admin').modal('hide');
					alert("Admin berhasil dihapus.");
					location.reload();
				},
				error: function(xhr) {
					alert("Gagal menghapus admin.");
				}
			});
		});
			})
</script>

@endsection
