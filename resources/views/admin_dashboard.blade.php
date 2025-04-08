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
		@include('body.sidebar')
		<!-- /Sidebar -->

		<div class="page-wrapper">
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

</body>

</html>