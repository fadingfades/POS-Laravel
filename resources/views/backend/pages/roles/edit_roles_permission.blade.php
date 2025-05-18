@extends('admin_dashboard')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .custom_checkbox {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
        font-size: 14px;
        user-select: none;
        display: inline-block;
    }

    .custom_checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .custom_checkbox .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #fff;
        border: 2px solid #999;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .custom_checkbox input:checked ~ .checkmark {
        background-color: #fd7e14;
        border-color: #fd7e14;
    }

    .custom_checkbox .checkmark::after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom_checkbox input:checked ~ .checkmark::after {
        display: block;
    }

    .custom_checkbox .checkmark::after {
        top: 4px;
        left: 4px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: white;
    }
</style>

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Edit Peran Akses</h4>
                <h6>Perbarui Hak Akses Peran: <strong>{{ $role->name }}</strong></h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ route('all.roles.permission') }}" class="btn btn-secondary">
                        <i data-feather="arrow-left" class="me-2"></i>Kembali Ke Daftar Peran Akses
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <form action="{{ route('role.permission.update', $role->id) }}" method="POST">
        @csrf
        <input type="hidden" name="permission[]" value="">
        <div class="card">
            <div class="card-body add-product pb-0">
                <div class="accordion-card-one accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">
                                <div class="addproduct-icon">
                                    <h5><i data-feather="info" class="add-info"></i><span>Informasi Peran Akses</span></h5>
                                    <a href="javascript:void(0);"><i data-feather="chevron-down" class="chevron-down-add"></i></a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Nama Peran</label>
                                        <h5 class="fw-semibold text-primary">{{ $role->name }}</h5>
                                    </div>

                                    <label class="form-label">Pilih Semua</label>
                                    <div class="col-lg-12 mb-3">
                                        <label class="custom_checkbox mb-2">
                                            <input type="checkbox" id="selectAllPermissions">
                                            <span class="checkmark"></span>
                                            Centang Semua Perizinan
                                        </label>
                                    </div>

                                    @foreach($permission_groups as $group)
                                        @php
                                            $groupSlug = Str::slug($group->group_name);
                                            $groupPermissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp

                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="mb-3 add-product permission-group" data-group="{{ $groupSlug }}">
                                                <label class="custom_checkbox form-label group-checkbox mb-2">
                                                    <input type="checkbox" class="group-master">
                                                    <span class="checkmark"></span>
                                                    {{ $group->group_name }}
                                                </label>

                                                <div class="row">
                                                    @foreach($groupPermissions as $permission)
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <label class="custom_checkbox mb-2">
                                                                <input
                                                                    type="checkbox"
                                                                    class="permission-checkbox"
                                                                    name="permission[]"
                                                                    value="{{ $permission->id }}"
                                                                    data-group="{{ $groupSlug }}"
                                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                >
                                                                <span class="checkmark"></span>
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end accordion -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan Data </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on('change', '.permission-group .group-master', function() {
        let $groupDiv = $(this).closest('.permission-group');
        $groupDiv.find('.permission-checkbox').prop('checked', $(this).is(':checked'));
    });

    $(document).on('change', '.permission-checkbox', function() {
        let group = $(this).data('group');
        let $groupDiv = $(`.permission-group[data-group="${group}"]`);
        let allChecked = $groupDiv.find('.permission-checkbox').length === $groupDiv.find('.permission-checkbox:checked').length;
        $groupDiv.find('.group-master').prop('checked', allChecked);
    });

    $('#selectAllPermissions').on('change', function() {
        const checked = $(this).is(':checked');
        $('.permission-checkbox').prop('checked', checked).trigger('change');
        $('.group-master').prop('checked', checked);
    });
</script>

@endsection
