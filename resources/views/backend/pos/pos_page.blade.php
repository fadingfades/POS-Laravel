@extends('admin_dashboard')
@section('admin')

<script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>

<style>
	.product-img {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 8px;
		flex-wrap: wrap;
		width: 80px;
		height: 80px;
	}

	.img-201 {
		width: 80px !important;
		height: 80px !important;
		border-radius: 5%;
		object-fit: contain;
		flex-shrink: 0;
		display: block;
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
		white-space: normal;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
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
											<select class="select" id="customer-select">
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
												<td>Total</td>
												<td class="text-end">Rp{{ number_format(Cart::subtotal(), 0, ',', '.') }}</td>
											</tr>
											<tr>
												<td>Uang Tunai</td>
												<td class="text-end">
													<input type="text" id="customer-cash" class="form-control form-control-sm text-end" placeholder="Rp 0">
												</td>
											</tr>
											<tr>
												<td>Kembalian</td>
												<td class="text-end"><strong id="change-amount">Rp 0</strong></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="d-grid btn-block">
									<a class="btn btn-success {{ Cart::count() == 0 ? 'disabled' : '' }}" href="javascript:void(0);" data-bs-toggle="modal" id="open-receipt" data-bs-target="#payment-completed" {{ Cart::count() == 0 ? 'aria-disabled=true tabindex=-1' : '' }} >Pembayaran Selesai</a>
								</div>

							</aside>
						</div>
					</div>
				</div>

<script>
	$(document).ready(function() {
		function formatToRupiah(angka) {
			let number_string = angka.replace(/[^,\d]/g, '').toString();
			let split = number_string.split(',');
			let sisa = split[0].length % 3;
			let rupiah = split[0].substr(0, sisa);
			let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				let separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			return 'Rp ' + rupiah;
		}

		function cleanRupiah(rpString) {
			return parseInt(rpString.replace(/[^\d]/g, '')) || 0;
		}

		$('#customer-cash').on('input', function () {
			let raw = $(this).val();
			let formatted = formatToRupiah(raw);
			$(this).val(formatted);

			let total = {{ str_replace('.', '', Cart::subtotal()) }};
			let cash = cleanRupiah(formatted);
			let change = cash - total;

			$('#change-amount').text(formatToRupiah(change > 0 ? change.toString() : '0'));
			$('#cash-paid-hidden').val(cash);
			$('#change-hidden').val(change > 0 ? change : 0);
		});

		$('#customer-cash').on('keypress', function (e) {
			if (!/[0-9]/.test(e.key)) {
				e.preventDefault();
			}
		});

		$('.add-to-cart').click(function () {
			const data = {
				id: $(this).data('id'),
				name: $(this).data('name'),
				price: $(this).data('price'),
				qty: 1,
				_token: '{{ csrf_token() }}'
			};

			$.post("{{ url('/add-cart') }}", data)
				.done(function (response) {
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: response.message,
						timer: 1200,
						showConfirmButton: false
					}).then(() => location.reload());
				})
				.fail(function (xhr) {
					let response = xhr.responseJSON;
					Swal.fire({
						icon: 'error',
						title: 'Gagal',
						text: response?.message || 'Gagal menambahkan produk!'
					});
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

		let debounceTimers = {};

		function updateCartQuantityDebounced($input, qty) {
			let rowId = $input.data('rowid');
			if (!rowId) return;

			clearTimeout(debounceTimers[rowId]);

			debounceTimers[rowId] = setTimeout(() => {
				$.ajax({
					url: `/cart-update/${rowId}`,
					method: "POST",
					data: {
						qty: qty,
						_token: '{{ csrf_token() }}'
					},
					success: function () {
						$input.val(qty);
						location.reload();
					},
					error: function () {
						alert('Gagal memperbarui jumlah produk.');
					}
				});
			}, 500);
		}

		$(".inc").on("click", function () {
			let $input = $(this).siblings('input[name="qty"]');
			let qty = parseInt($input.val()) || 0;
			let newQty = qty + 1;
			$input.val(newQty);
			updateCartQuantityDebounced($input, newQty);
		});

		$(".dec").on("click", function () {
			let $input = $(this).siblings('input[name="qty"]');
			let qty = parseInt($input.val()) || 0;
			let newQty = qty > 1 ? qty - 1 : 1;
			$input.val(newQty);
			updateCartQuantityDebounced($input, newQty);
		});

		$('#open-receipt').click(function () {
			let customerName = $('#select2-customer-select-container').text().trim();
			if (!customerName) customerName = '-';

			let cashPaid = $('#customer-cash').val().trim();
			let change = $('#change-amount').text().trim();

			$('#receipt-customer-name').text(customerName);
			$('#receipt-cash-paid').text(cashPaid || 'Rp 0');
			$('#receipt-change').text(change || 'Rp 0');
		});

		$('#submit-invoice-btn').on('click', function () {
			let selectedCustomerId = $('#customer-select').val();

			if (!selectedCustomerId) {
				alert('Pilih pelanggan terlebih dahulu.');
				return;
			}

			$('#invoice-customer-id').val(selectedCustomerId);

			$('#create-invoice-form').submit();
			setTimeout(function () {
				window.location.href = "{{ route('cart.clear') }}";
			}, 2000);
		});

		$('#submit-invoice-and-continue').on('click', function () {
			let selectedCustomerId = $('#customer-select').val();

			if (!selectedCustomerId) {
				alert('Pilih pelanggan terlebih dahulu.');
				return;
			}

			$('#invoice-customer-id').val(selectedCustomerId);

			$.ajax({
				url: "{{ url('/create-invoice') }}",
				method: "POST",
				data: $('#create-invoice-form').serialize(),
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				success: function () {
					window.location.href = "{{ route('cart.clear') }}";
				},
				error: function () {
					Swal.fire({
						icon: 'error',
						title: 'Gagal',
						text: 'Gagal menyelesaikan transaksi.'
					});
				}
			});
		});

		const barcodeInput = document.getElementById('barcode-input');

		function focusBarcodeInput() {
			if (document.activeElement !== barcodeInput) {
				barcodeInput.focus({ preventScroll: true });
			}
		}

		focusBarcodeInput();

		document.addEventListener('keydown', (e) => {
			const tag = document.activeElement.tagName;
			if (tag !== 'INPUT' && tag !== 'TEXTAREA' && tag !== 'SELECT') {
				focusBarcodeInput();
			}
		});

		barcodeInput.addEventListener('keypress', function (e) {
			if (e.key === 'Enter') {
				const code = barcodeInput.value.trim();
				if (code !== '') {
					addProductToCartByBarcode(code);
					barcodeInput.value = '';
				}
			}
		});

		function addProductToCartByBarcode(code) {
			$.ajax({
				url: '{{ url("/find-product-by-code") }}',
				method: 'GET',
				data: { code: code },
				success: function (product) {
					const data = {
						id: product.id,
						name: product.product_name,
						price: product.selling_price,
						qty: 1,
						_token: '{{ csrf_token() }}'
					};

					$.post("{{ url('/add-cart') }}", data)
						.done(function (response) {
							Swal.fire({
								icon: 'success',
								title: 'Produk Ditambahkan',
								text: response.message,
								timer: 1000,
								showConfirmButton: false
							}).then(() => location.reload());
						})
						.fail(() => {
							Swal.fire({
								icon: 'error',
								title: 'Gagal Menambahkan Produk'
							});
						});
				},
				error: function () {
					Swal.fire({
						icon: 'error',
						title: 'Produk Tidak Ditemukan',
						text: `Kode: ${code}`
					});
				}
			});
		}

		setInterval(() => {
			const active = document.activeElement;
			if (!active || (active.tagName !== 'INPUT' && active.tagName !== 'TEXTAREA' && active.tagName !== 'SELECT')) {
				document.getElementById('barcode-input').focus();
			}
		}, 2000);

		$('#submit-invoice-direct').on('click', function () {
			let selectedCustomerId = $('#customer-select').val();

			if (!selectedCustomerId) {
				Swal.fire({
					icon: 'warning',
					title: 'Pilih pelanggan terlebih dahulu.'
				});
				return;
			}

			let cashPaid = $('#customer-cash').val().trim();
			let change = $('#change-amount').text().trim();
			let cleanCash = cashPaid.replace(/[^\d]/g, '') || '0';
			let cleanChange = change.replace(/[^\d]/g, '') || '0';

			$('#invoice-customer-id').val(selectedCustomerId);
			$('#cash-paid-hidden').val(cleanCash);
			$('#change-hidden').val(cleanChange);

			$('#create-invoice-form').submit();

			setTimeout(function () {
				window.location.href = "{{ route('cart.clear') }}";
			}, 2000);
		});
	});
</script>

<div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<form action="pos.html">
					<div class="icon-head">
						<a href="javascript:void(0);">
							<i data-feather="check-circle" class="feather-40"></i>
						</a>
					</div>
					<h4>Pembayaran Selesai</h4>
					<div class="modal-footer d-sm-flex justify-content-between">
						<button type="button" id="submit-invoice-direct" class="btn btn-primary flex-fill">Cetak Resi<i class="feather-arrow-right-circle icon-me-5"></i></button>
						<button type="button" id="submit-invoice-and-continue" class="btn btn-secondary flex-fill">Pembelian Selanjutnya<i class="feather-arrow-right-circle icon-me-5"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="d-flex justify-content-end">
				<button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<h6>TEACHING FACTORY ALFAMART</h6>
					<p class="mb-0">SMK NEGERI 1 PANGKEP</p>
					<p class="mb-0">Jl. Sambungjawa, Pangkep</p>
				</div>

				<div class="tax-invoice">
					<h6 class="text-center">Resi Pembelian</h6>
					<div class="row">
						<div class="col-md-6">
							<div class="invoice-user-name"><span>Name: </span><span id="receipt-customer-name">-</span></div>
						</div>
						<div class="col-md-6">
							<div class="invoice-user-name"><span>Date: </span><span>{{ \Carbon\Carbon::now()->format('d.m.Y') }}</span></div>
						</div>
					</div>
				</div>

				<table class="table-borderless w-100 table-fit">
					<thead>
						<tr>
							<th># Item</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th class="text-end">Total</th>
						</tr>
					</thead>
					<tbody>
						@php $total = 0; $i = 1; @endphp
						@foreach ($cartItems as $item)
							@php
								$lineTotal = $item->price * $item->qty;
								$total += $lineTotal;
							@endphp
							<tr>
								<td title="{{ $item->name }}">{{ $i++ }}. {{ \Illuminate\Support\Str::limit($item->name, 16, '...') }}</td>
								<td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
								<td>{{ $item->qty }}</td>
								<td class="text-end">Rp {{ number_format($lineTotal, 0, ',', '.') }}</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="4">
								<table class="table-borderless w-100 table-fit">
									<tr>
										<td>Sub Total :</td>
										<td class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</td>
									</tr>
									<tr>
										<td>Total Bill :</td>
										<td class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</td>
									</tr>
									<tr>
										<td>Cash Paid :</td>
										<td class="text-end" id="receipt-cash-paid">Rp 0</td>
									</tr>
									<tr>
										<td><strong>Change :</strong></td>
										<td class="text-end" id="receipt-change"><strong>Rp 0</strong></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="text-center invoice-bar">
					<p>Terima kasih telah berbelanja bersama kami. Silakan datang kembali.</p>
					<button type="button" id="submit-invoice-btn" class="btn btn-primary">Cetak Resi</button>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="text" id="barcode-input" autocomplete="off" style="position: fixed; top: 0; left: 0; width: 1px; height: 1px; opacity: 0; z-index: 100;">

<form id="create-invoice-form" method="POST" action="{{ url('/create-invoice') }}" target="_blank" style="display: none;">
    @csrf
    <input type="hidden" name="customer_id" id="invoice-customer-id">
	<input type="hidden" name="cash_paid" id="cash-paid-hidden">
	<input type="hidden" name="change_amount" id="change-hidden">
</form>

@endsection
