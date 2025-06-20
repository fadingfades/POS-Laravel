<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Nauki POS</title>

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

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon-32x32.png') }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-datetimepicker.min.css') }}">

	<!-- animation CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/animate.css') }}">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.bootstrap5.min.css') }}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/owlcarousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/owlcarousel/owl.theme.default.min.css') }}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@include('body.header')
		<!-- /Header -->

		<!-- Sidebar -->
		@if (!Route::is('pos'))
    		@include('body.sidebar')
		@endif
		<!-- /Sidebar -->

		<div class="page-wrapper {{ Route::is('pos') ? 'pos-pg-wrapper ms-0' : '' }}">
			@yield('admin')
		</div>

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>

	<!-- Feather Icon JS -->
	<script src="{{ asset('backend/assets/js/feather.min.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('backend/assets/js/jquery.slimscroll.min.js') }}"></script>

	<!-- Datatable JS -->
	<script src="{{ asset('backend/assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/dataTables.bootstrap5.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Select2 JS -->
	<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>

	<!-- Datetimepicker JS -->
	<script src="{{ asset('backend/assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('backend/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/apexchart/chart-data.js') }}"></script>

	<!-- Sweetalert 2 -->
	<script src="{{ asset('backend/assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

	<!-- Owl JS -->
	<script src="{{ asset('backend/assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('backend/assets/js/theme-script.js') }}"></script>
	<script src="{{ asset('backend/assets/js/script.js') }}"></script>

	<div class="modal fade" id="add-category">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Tambah Kategori</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="addCategoryForm">
								@csrf
								<div class="mb-3">
									<label class="form-label">Kategori</label>
									<input type="text" class="form-control" id="add-category-name" name="category_name">
								</div>
								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Tambah Kategori</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="edit-category">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Ubah Kategori</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="editCategoryForm">
								@csrf
								<input type="hidden" id="edit-category-id" name="id">
								<div class="mb-3">
									<label class="form-label">Kategori</label>
									<input type="text" class="form-control" id="edit-category-name" name="category_name">
								</div>
								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Simpan Perubahan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="delete-category">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="card bg-white border-0">
							<div class="alert custom-alert1 alert-danger">
								<div class="text-center px-5 pb-0">
									<div class="custom-alert-icon">
										<i class="feather-info flex-shrink-0"></i>
									</div>
									<h5>Apakah Anda yakin?</h5>
									<p>Anda tidak akan bisa membatalkannya!</p>
									<div class="">
										<button id="confirm-delete" class="btn btn-sm btn-danger m-1">Hapus</button>
										<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
									</div>
									<input type="hidden" id="delete-category-id">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="delete-products">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="card bg-white border-0">
							<div class="alert custom-alert1 alert-danger">
								<div class="text-center  px-5 pb-0">
									<div class="custom-alert-icon">
										<i class="feather-info flex-shrink-0"></i>
									</div>
									<h5>Apakah Anda yakin?</h5>
									<p class="">Anda tidak akan bisa membatalkannya!</p>
									<div class="">
										<a id="confirm-delete-product" class="btn btn-sm btn-danger m-1" href="#">Hapus</a>
										<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Customer -->
	<div class="modal fade" id="add-units">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Tambah Pelanggan</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="addCustomerForm" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Example Image" class="img-202">
										</div>
										<div class="mb-3">
											<div class="image-upload mb-0">
												<input type="file" id="image" name="image">
												<div class="image-uploads">
													<h4>Ganti Foto</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Customer -->

	<!-- Edit Customer -->
	<div class="modal fade" id="edit-units">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Ubah Data Pelanggan</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="updateCustomerForm" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="id" id="edit_customer_id">
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img src="" id="showImage-edit" alt="Example Image" class="img-202">
										</div>
										<div class="mb-3">
											<div class="image-upload mb-0">
												<input type="file" id="image-edit" name="image">
												<div class="image-uploads">
													<h4>Ganti Foto</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Customer -->

	<!-- Detail Customer -->
	<div class="modal fade" id="detail-units">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Informasi Pelanggan</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form action="customers.html">
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img src="" alt="Example Image" class="img-202">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Kembali</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Detail Customer -->

	<!-- Delete Data -->
	<div class="modal fade" id="delete-units">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="card bg-white border-0">
							<div class="alert custom-alert1 alert-danger">
								<div class="text-center  px-5 pb-0">
									<div class="custom-alert-icon">
										<i class="feather-info flex-shrink-0"></i>
									</div>
									<h5>Apakah Anda yakin?</h5>
									<p class="">Anda tidak akan bisa membatalkannya!</p>
									<div class="">
										<button class="btn btn-sm btn-danger m-1">Hapus</button>
										<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Data -->

	<!-- Add Supplier -->
	<div class="modal fade" id="add-supplier">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Tambah Suplier</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="addSupplierForm" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img id="showImage-supplier" src="{{ url('upload/no_image.jpg') }}" alt="Example Image" class="img-202">
										</div>
										<div class="mb-3">
											<div class="image-upload mb-0">
												<input id="image-supplier" name="image" type="file">
												<div class="image-uploads">
													<h4>Ganti Foto</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Tipe Suplier</label>
											<select name="type" class="select">
												<option value="Distributor">Distributor</option>
												<option value="Stakeholder">Stakeholder</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-2">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Supplier -->

	<!-- Edit Supplier -->
	<div class="modal fade" id="edit-supplier">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Ubah Suplier</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form id="editSupplierForm" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="id" id="edit_supplier_id">
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img id="showImage-supplier" src="" alt="Example Image" class="img-202">
										</div>
										<div class="mb-3">
											<div class="image-upload mb-0">
												<input id="image-supplier" name="image" type="file">
												<div class="image-uploads">
													<h4>Ganti Foto</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Tipe Suplier</label>
											<select name="type" class="select">
												<option value="Distributor">Distributor</option>
                                                <option value="Stakeholder">Stakeholder</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-2">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Supplier -->

	<!-- Detail Supplier -->
	<div class="modal fade" id="detail-supplier">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Informasi Suplier</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form action="customers.html">
								<div class="modal-title-head people-cust-avatar">
									<h6>Foto</h6>
								</div>
								<div class="new-employee-field">
									<div class="profile-pic-upload">
										<div class="profile-pic people-profile-pic">
											<img src="" alt="Example Image" class="img-202">
										</div>
										<div class="mb-3">
											<div class="image-upload mb-0">
												<input type="file">
												<div class="image-uploads">
													<h4>Ganti Foto</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nomor Telfon</label>
											<input class="form-control" name="phone" type="text">
										</div>
									</div>
									<div class="col-lg-12 pe-0">
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" name="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Toko</label>
											<input type="text" name="shopname" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Tipe Suplier</label>
											<select name="type" class="select">
												<option>Distributor</option>
												<option>Stakeholder</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Akun Holder</label>
											<input type="text" name="account_holder" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="input-blocks">
											<label class="mb-2">Nama Bank</label>
											<input class="form-control" name="bank_name" type="text">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-2">
											<label class="form-label">Cabang Bank</label>
											<input type="text" name="bank_branch" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 pe-0">
										<div class="mb-3">
											<label class="form-label">Asal Kota</label>
											<input type="text" name="city" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Kembali</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Detail Supplier -->

	<!-- Delete Supplier -->
	<div class="modal fade" id="delete-supplier">
		<div class="modal-dialog modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="card bg-white border-0">
							<div class="alert custom-alert1 alert-danger">
								<div class="text-center  px-5 pb-0">
									<div class="custom-alert-icon">
										<i class="feather-info flex-shrink-0"></i>
									</div>
									<h5>Apakah Anda yakin?</h5>
									<p class="">Anda tidak akan bisa membatalkannya!</p>
									<div class="">
										<button class="btn btn-sm btn-danger m-1">Hapus</button>
										<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Supplier -->

	<div class="modal fade" id="delete-employee">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="card bg-white border-0">
								<div class="alert custom-alert1 alert-danger">
									<div class="text-center  px-5 pb-0">
										<div class="custom-alert-icon">
											<i class="feather-info flex-shrink-0"></i>
										</div>
										<h5>Apakah Anda yakin?</h5>
										<p class="">Anda tidak akan bisa membatalkannya!</p>
										<div class="">
											<a id="confirm-delete-employee" class="btn btn-sm btn-danger m-1" href="#">Hapus</a>
											<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="add-roles">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Tambah Peran</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="addRolesForm">
									<div class="mb-0">
										<label class="form-label">Nama Peran</label>
										<input type="text" name="name" id="add-roles-name" class="form-control">
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-submit">Buat Data</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="edit-roles">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Ubah Data</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="editRolesForm">
									@csrf
									<input type="hidden" id="edit-roles-id" name="id">
									<div class="mb-0">
										<label class="form-label">Nama Peran</label>
										<input type="text" name="name" id="edit-roles-name" class="form-control">
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-submit">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="delete-roles">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="card bg-white border-0">
								<div class="alert custom-alert1 alert-danger">
									<div class="text-center  px-5 pb-0">
										<div class="custom-alert-icon">
											<i class="feather-info flex-shrink-0"></i>
										</div>
										<h5>Apakah Anda yakin?</h5>
										<p class="">Anda tidak akan bisa membatalkannya!</p>
										<div class="">
											<button id="confirm-delete-roles" class="btn btn-sm btn-danger m-1">Hapus</button>
											<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
										</div>
										<input type="hidden" id="delete-roles-id">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="add-permission">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Tambah Akses</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="addPermissionForm">
									@csrf
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Nama Akses</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Nama Group</label>
											<select name="group_name" class="select">
												<option value="POS">POS</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Pelanggan">Pelanggan</option>
                                                <option value="Suplier">Suplier</option>
                                                <option value="Kehadiran">Kehadiran</option>
                                                <option value="Kategori">Kategori</option>
                                                <option value="Produk">Produk</option>
                                                <option value="Stok">Stok</option>
                                                <option value="Peran">Peran</option>
											</select>
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-submit">Buat Data</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="edit-permission">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Ubah Data</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="editPermissionForm">
									@csrf
									<input type="hidden" name="id" id="edit_permission_id">
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Nama Akses</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Nama Group</label>
											<select name="group_name" class="select">
												<option value="POS">POS</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Pelanggan">Pelanggan</option>
                                                <option value="Suplier">Suplier</option>
                                                <option value="Kehadiran">Kehadiran</option>
                                                <option value="Kategori">Kategori</option>
                                                <option value="Produk">Produk</option>
                                                <option value="Stok">Stok</option>
                                                <option value="Peran">Peran</option>
											</select>
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-submit">Buat Data</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="delete-permission">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="card bg-white border-0">
								<div class="alert custom-alert1 alert-danger">
									<div class="text-center  px-5 pb-0">
										<div class="custom-alert-icon">
											<i class="feather-info flex-shrink-0"></i>
										</div>
										<h5>Apakah Anda yakin?</h5>
										<p class="">Anda tidak akan bisa membatalkannya!</p>
										<div class="">
											<button class="btn btn-sm btn-danger m-1">Hapus</button>
											<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

				<!-- Add User -->
		<div class="modal fade" id="add-admin">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Tambah Admin Baru</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="addAdminForm" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Nama</label>
												<input type="text" name="name" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Nomor Telepon</label>
												<input type="text" name="phone" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Password</label>
												<div class="pass-group">
													<input type="password" name="password" class="pass-input">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-blocks">
												<label>Bertugas Sebagai</label>
												<select name="roles" class="select">
												</select>
											</div>
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-submit">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add User -->

		<!-- Edit User -->
		<div class="modal fade" id="edit-admin">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Ubah Info Admin</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form id="editAdminForm" method="POST" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id">
									<div class="row">
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Nama</label>
												<input type="text" name="name" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-blocks">
												<label>Nomor Telepon</label>
												<input type="text" name="phone" class="form-control">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-blocks">
												<label>Bertugas Sebagai</label>
												<select name="roles" class="select">
													<option>Kasir</option>
													<option>Manager</option>
													<option>Admin</option>
												</select>
											</div>
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-submit">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit User -->

        <!-- Delete Data -->
		<div class="modal fade" id="delete-admin">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="card bg-white border-0">
								<div class="alert custom-alert1 alert-danger">
									<div class="text-center  px-5 pb-0">
										<div class="custom-alert-icon">
											<i class="feather-info flex-shrink-0"></i>
										</div>
										<h5>Apakah Anda yakin?</h5>
										<p class="">Anda tidak akan bisa membatalkannya!</p>
										<div class="">
											<button id="confirmDeleteBtn" class="btn btn-sm btn-danger m-1">Hapus</button>
											<button class="btn btn-sm btn-submit m-1" data-bs-dismiss="modal">Batal</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Data -->

</body>

</html>