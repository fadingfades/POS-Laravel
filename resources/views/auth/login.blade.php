<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Nauki Pos</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon-32x32.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    </head>
    <body class="account-page">

        <div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div>

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper">
                    <div class="login-img">
                        <img src="{{ asset('backend/assets/img/authentication/payment.png') }}" alt="img">
                    </div>
                    <div class="login-content">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="login-userset">
                                <div class="login-logo logo-normal">
                                    <img src="{{ asset('backend/assets/img/naukii.png') }}" alt="img">
                                </div>
                                <a href="index.html" class="login-logo logo-white">
                                    <img src="{{ asset('backend/assets/img/naukii.png') }}"  alt="">
                                </a>
                                <div class="login-userheading">
                                    <h3>Login</h3>
                                    <h4>Silahkan login menggunakan username dan password</h4>
                                </div>
                                <div class="form-login">
                                    <label>Username / Email / Nomor HP</label>
                                    <div class="form-addons">
                                        <input type="text" name="login" id="login" class="form-control">
                                        <img src="{{ asset('backend/assets/img/icons/mail.svg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" id="password" class="pass-input">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button type="submit" class="btn btn-login">Sign In</button>
                                </div>
                                <div class="form-sociallink">
                                    <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                        <p>Copyright &copy; 2025 Nauki POS. All rights reserved</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<div class="customizer-links" id="setdata">
			<ul class="sticky-sidebar">
				<li class="sidebar-icons">
					<a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
						data-bs-original-title="Theme">
						<i data-feather="settings" class="feather-five"></i>
					</a>
				</li>
			</ul>
		</div>

		<!-- jQuery -->
        <script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>

        <!-- Feather Icon JS -->
		<script src="{{ asset('backend/assets/js/feather.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Custom JS -->
        <script src="{{ asset('backend/assets/js/theme-script.js') }}"></script>
		<script src="{{ asset('backend/assets/js/script.js') }}"></script>

    </body>
</html>