@extends('admin_dashboard')
@section('admin')

<div class="content">
					<div class="page-header">
						<div class="add-item d-flex">
							<div class="page-title">
								<h4>Peran Akses</h4>
								<h6>Kelola Data Peran Akses</h6>
							</div>
						</div>
						<div class="page-btn">
							<a href="{{ route('add.roles.permission') }}" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i> Tambah Peran Akses</a>
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
											<th>Nama Akses</th>
											<th class="no-sort">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($roles as $key => $item)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ $item->name }}</td>
											<td>
												<div class="d-flex flex-wrap gap-2">
                                                    @foreach($item->permissions as $perm)
													<span class="badge rounded-pill bg-outline-success">{{ $perm->name }}</span>
                                                    @endforeach
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 p-2" href="{{ route('admin.edit.roles', $item->id) }}">
														<i data-feather="edit" class="feather-edit"></i>
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

@endsection
