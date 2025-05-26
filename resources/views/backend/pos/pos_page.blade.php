@extends('admin_dashboard')
@section('admin')

<script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>

<style>
	.product-img {
		display: flex;
		align-items: center;
		gap: 8px;
		flex-wrap: wrap;
	}

	.img-201 {
		width: 80px !important;
		height: 80px !important;
		border-radius: 5%;
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

	.product-display {
		display: flex;
		align-items: center;
		gap: 8px;
		flex-wrap: wrap;
	}

	.img-202 {
		width: fit-content !important;
		height: 80px !important;
		border-radius: 5%;
		object-fit:contain;
	}

	.product-name {
		font-size: 14px;
		color: #000;
		text-decoration: none;
		white-space: nowrap; /* Mencegah teks turun ke bawah */
	}
</style>

<div class="content pos-design p-0">

					<div class="row align-items-start pos-wrapper">
						<div class="col-md-12 col-lg-8">
							<div class="pos-categories tabs_wrapper">
								<h5>Kategori</h5>
								<p>Pilih Kategori Dibawah</p>
								<ul class="tabs owl-carousel pos-category">
									<li id="all">
										<a href="javascript:void(0);">
											<img src="backend/assets/img/categories/category-01.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Semua Kategori</a></h6>
										<span>{{ $product->count() }} Items</span>
									</li>
									@foreach ($categories as $cat)
										@php
											$firstProduct = $product->firstWhere('category_id', $cat->id);
											$catImage = $firstProduct?->product_image;
										@endphp
										<li id="{{ $cat->id }}">
											<a href="javascript:void(0);">
												<img src="{{ asset($catImage) }}" alt="Categories">
											</a>
											<h6><a href="javascript:void(0);">{{ $cat->category_name }}</a></h6>
											<span>{{ $product->where('category_id', $cat->id)->count() }} Items</span>
										</li>
									@endforeach
								</ul>
								<div class="pos-products">
									<div class="d-flex align-items-center justify-content-between">
										<h5 class="mb-3">Produk</h5>
									</div>
									<div class="tabs_container">
										<div class="tab_content active" data-tab="all">
											<div class="row">
												@foreach($product as $key => $item)
												<div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
													<div class="product-info default-cover card">
														<a data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}" class="img-bg add-to-cart">
															<div class="product-img">
																<img src="{{ asset($item->product_image) }}" alt="Example Image" class="img-202">
																<span><i data-feather="check" class="feather-16"></i></span>
															</div>
														</a>
														<h6 class="cat-name"><a class="add-to-cart" data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}">{{ $item->category->category_name }}</a></h6>
														<h6 class="product-name"><a class="add-to-cart" data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}">{{ $item->product_name }}</a></h6>
														<div class="d-flex align-items-center justify-content-between price">
															<span>{{ $item->product_store }} Pcs</span>
															<p>Rp{{ number_format($item->selling_price, 0, ',', '.') }}</p>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
										@foreach($categories as $cat)
										<div class="tab_content" data-tab="{{ $cat->id }}">
											<div class="row">
												@foreach($product->where('category_id', $cat->id) as $item)
												<div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
													<div class="product-info default-cover card">
														<a data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}" class="img-bg add-to-cart">
															<div class="product-img">
																<img src="{{ asset($item->product_image) }}" alt="Example Image" class="img-202">
																<span><i data-feather="check" class="feather-16"></i></span>
															</div>
														</a>
														<h6 class="cat-name"><a class="add-to-cart" data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}">{{ $item->category->category_name }}</a></h6>
														<h6 class="product-name"><a class="add-to-cart" data-id="{{ $item->id }}" data-name="{{ $item->product_name }}" data-price="{{ $item->selling_price }}">{{ $item->product_name }}</a></h6>
														<div class="d-flex align-items-center justify-content-between price">
															<span>{{ $item->product_store }} Pcs</span>
															<p>Rp{{ number_format($item->selling_price, 0, ',', '.') }}</p>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-4 ps-0">
							<aside class="product-order-list">
								<div class="customer-info block-section">
									<h6>Informasi Pelanggan</h6>
									<div class="input-block d-flex align-items-center">
										<div class="flex-grow-1">
											<select class="select">
												@foreach($customer as $cus)
													<option value="{{ $cus->id }}">{{ $cus->name }}</option>
												@endforeach
											</select>
										</div>
										<a href="{{ route('all.customer') }}" class="btn btn-primary btn-icon"><i data-feather="user-plus" class="feather-16"></i></a>
									</div>
									<input type="text" class="form-control list" placeholder="Cari Produk">
								</div>

								<div class="product-added block-section">
									<div class="head-text d-flex align-items-center justify-content-between">
										<h6 class="d-flex align-items-center mb-0">Produk ditambahkan<span class="count">{{{ Cart::content()->count(); }}}</span></h6>
										<a href="javascript:void(0);" data-url="{{ route('cart.clear') }}" class="d-flex align-items-center text-danger confirm-text"><span class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all</a>
									</div>
									<div class="product-wrap">
										@foreach($cartItems as $cart)
										<div class="product-list d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
												<a href="javascript:void(0);" class="img-bg">
													<div class="productimgname">
														<div class="product-img">
															<img src="{{ asset($cart->options->image) }}" alt="Example Image" class="img-201">
														</div>
													</div>
												</a>
												<div class="info">
													<span>{{ $cart->options->product_code }}</span>
													<h6><a href="javascript:void(0);">{{ $cart->name }}</a></h6>
													<p>Rp {{ number_format($cart->price, 0, ',', '.') }}</p>
												</div>
											</div>
											<div class="qty-item text-center">
												<a href="javascript:void(0);"
												class="dec d-flex justify-content-center align-items-center qty-minus"
												data-rowid="{{ $cart->rowId }}">
													<i data-feather="minus-circle" class="feather-14"></i>
												</a>
												<input type="text" class="form-control text-center cart-qty-input"
													name="qty"
													value="{{ $cart->qty }}"
													data-rowid="{{ $cart->rowId }}"
													readonly>
												<a href="javascript:void(0);"
												class="inc d-flex justify-content-center align-items-center qty-plus"
												data-rowid="{{ $cart->rowId }}">
													<i data-feather="plus-circle" class="feather-14"></i>
												</a>
											</div>
											<div class="d-flex align-items-center action">
												<a href="javascript:void(0);" class="btn-icon delete-icon confirm-text" data-url="{{ url('/cart-remove/'.$cart->rowId) }}">
													<i data-feather="trash-2" class="feather-14"></i>
												</a>
											</div>
										</div>
										@endforeach
									</div>
								</div>
								<div class="block-section">
									<div class="order-total">
										<table class="table table-responsive table-borderless">
											<tr>
												<td>Jumlah</td>
												<td class="text-end">{{ Cart::count() }}</td>
											</tr>
											<tr>
											<tr>
												<td>Total</td>
												<td class="text-end">Rp{{ number_format(Cart::subtotal(), 0, ',', '.') }}</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="d-grid btn-block">
									<a class="btn btn-success" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#payment-completed">
										Pembayaran Selesai
									</a>
								</div>

							</aside>
						</div>
					</div>
				</div>

<script>
$(document).ready(function() {
	$('.add-to-cart').click(function () {
		const data = {
			id: $(this).data('id'),
			name: $(this).data('name'),
			price: $(this).data('price'),
			qty: 1,
			_token: '{{ csrf_token() }}'
		};

		$.post("{{ url('/add-cart') }}", data, function () {
			location.reload();
		}).fail(function () {
			alert('Stok habis atau gagal menambahkan!');
		});
	});

	$(document).on('click', '.confirm-text', function (e) {
		e.preventDefault();

		let url = $(this).data('url');

		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Anda tidak akan bisa membatalkannya!",
			type: "warning",
			showCancelButton: !0,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus",
			confirmButtonClass: "btn btn-primary",
			cancelButtonClass: "btn btn-danger ml-1",
			buttonsStyling: !1,
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = url;
			}
		});
	});

	$(".inc, .dec").off("click");

	$(".inc").on("click", function () {
		let $input = $(this).siblings('input[name="qty"]');
		let qty = parseInt($input.val()) || 0;
		let newQty = qty + 1;
		updateCartQuantity($input, newQty);
	});

	$(".dec").on("click", function () {
		let $input = $(this).siblings('input[name="qty"]');
		let qty = parseInt($input.val()) || 0;
		let newQty = qty > 1 ? qty - 1 : 1;
		updateCartQuantity($input, newQty);
	});

	function updateCartQuantity($input, qty) {
		let rowId = $input.data('rowid');
		if (!rowId) return;

		$.ajax({
			url: `/cart-update/${rowId}`,
			method: "POST",
			data: {
				qty: qty,
				_token: '{{ csrf_token() }}'
			},
			success: function (response) {
				$input.val(qty);
				location.reload();
			},
			error: function () {
				alert('Gagal memperbarui jumlah produk.');
			}
		});
	}
});
</script>

@endsection
