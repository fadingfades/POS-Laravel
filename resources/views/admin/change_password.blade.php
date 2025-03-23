@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
@endphp

@extends('admin_dashboard')
@section('admin')

<style>
    .img-201 {
        width: 130px !important;
        height: 110px !important;
        object-fit: cover;
        border-radius: 100%;
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

</style>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Keamanan</h4>
            <h6>Password</h6>
        </div>
    </div>
    <!-- /product list -->
    <div class="card">
        <div class="card-body">
            <div class="profile-set">
                <div class="profile-head">

                </div>
                <div class="profile-top">
                    <div class="profile-content">
                        <div class="profile-contentimg">
                            <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" alt="Example Image" class="img-201">
                        </div>
                        <div class="profile-contentname">
                            <h2>{{ $adminData->name }}</h2>
                        </div>
                    </div>
                    <!-- <div class="ms-auto">
                        <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                        <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                    </div> -->
                </div>
            </div>
            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg- col-sm-12">
                        <div class="input-blocks">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <div class="pass-group">
                                <input type="password" name="old_password" id="old_password" class="pass-input form-control">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <div class="pass-group">
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="pass-input form-control">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /product list -->
</div>

@endsection
