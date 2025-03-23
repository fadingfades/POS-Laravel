@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
@endphp

<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('backend/assets/img/naukii.png') }}" alt="">
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-white">
            <img src="{{ asset('backend/assets/img/naukii.png') }}" alt="">
        </a>
        <a href="{{ route('dashboard') }}" class="logo-small">
            <img src="{{ asset('backend/assets/img/naukii.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </li>
        <!-- /Search -->


        <!-- Notifications -->
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i>
            </a>
        </li>
        <!-- /Notifications -->

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);"><i data-feather="settings"></i></a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                            <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" alt="Example Image" class="img-203">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">{{ $adminData->name }}</span>
                        <span class="user-role">Super Admin</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" alt="" class="img-204">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>{{ $adminData->name }}</h6>
                            <h5>Super Admin</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"> <i class="me-2"></i>Akun</a>
                    <a class="dropdown-item" href="{{ route('change.password') }}"><i class="me-2"></i>Keamanan</a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('admin.logout') }}"><img src="{{ asset('backend/assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Keluar</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="general-settings.html">Settings</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>