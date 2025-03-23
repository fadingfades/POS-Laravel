@extends('admin_dashboard')
@section('admin')

<style>
    .img-201 {
        width: 130px !important;
        height: 110px !important;
        object-fit: cover;
        border-radius: 10%;
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Akun</h4>
            <h6>Profil Akun</h6>
        </div>
    </div>
    <!-- /product list -->
    <div class="card">
        <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head"></div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" id="showImage" alt="Example Image" class="img-201">
                                <div class="profileupload">
                                    <input type="file" name="photo" id="image">
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $adminData->name }}</h2>
                                <h4>Perbarui Foto dan Detail Pribadi Anda</h4>
                            </div>
                        </div>
                        <!-- <div class="ms-auto">
                            <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $adminData->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $adminData->email }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" name="phone" value="{{ $adminData->phone }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-submit me-2">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /product list -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
