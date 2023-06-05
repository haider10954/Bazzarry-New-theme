@php
    if(!isset($useAssets))
        {
            $useAssets = [];
        }
@endphp
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>

    <meta charset="utf-8" />
    <title>Sign In | Bazaarry Seller</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Seller Dashboard for bazaarry Sellers" name="description" />
    <meta content="Haseeb" name="author" />
    <!-- App favicon -->
@include("seller.includes.head")
</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="{{asset('admin_assets/images/admin-logo.png')}}" alt="" height="35">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Seller Dashboard Authentication</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Bazaarry.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form id="seller_login">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="username" name="email" placeholder="Enter email">
                                        <div class="error-email">

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" class="form-control pe-5" placeholder="Enter password" id="password-input">
                                            <button onclick="TogglePassword()" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        <div class="error-password">

                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" id="submitForm" type="submit">Sign In</button>
{{--                                        <button type="button" class="btn btn-light mt-2 bg-gradient waves-effect waves-light w-100">Sign In with Google</button>--}}

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Not a member yet ? <a href="{{route("seller-signup")}}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Bazaarry. Crafted with <i class="mdi mdi-heart text-danger"></i> by Haseeb and Company
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
@include("seller.includes.script")
<script>
    // Create an instance of Notyf
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });
    $("#seller_login").on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData($("#seller_login")[0]);
        formData = new FormData($("#seller_login")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('seller_auth_login') }}",
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                $("#submitForm").prop('disabled', true);
                $("#submitForm").html('<div class="spinner-border custom-spin-style" role="status"> <span class="visually-hidden">Loading...</span> </div> <span class="ms-1">Processing...</span>');
            },
            success: function(res) {
                if (res.success === true) {
                    $("#submitForm").prop('disabled', false);
                    $("#submitForm").html('Sign In');
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.href = "{{ route('seller-dashboard') }}";
                    }, 3200);
                    $('.error-email').html('');
                    $('.error-password').html('');

                } else {
                    $("#submitForm").prop('disabled', false);
                    $("#submitForm").html('Sign In');
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })

                }
            },
            error: function(e) {
                $("#submitForm").prop('disabled', false);
                $("#submitForm").html('Login');
                if (e.responseJSON.errors['email']) {
                    $('.error-email').html('<small class=" error-message text-danger">' + e.responseJSON.errors['email'][0] + '</small>');
                }
                if (e.responseJSON.errors['name']) {
                    $('.error-name').html('<small class=" error-message text-danger">' + e.responseJSON.errors['name'][0] + '</small>');
                }
                if (e.responseJSON.errors['phone_number']) {
                    $('.error-number').html('<small class=" error-message text-danger">' + e.responseJSON.errors['phone_number'][0] + '</small>');
                }
                if (e.responseJSON.errors['password']) {
                    $('.error-password').html('<small class=" error-message text-danger">' + e.responseJSON.errors['password'][0] + '</small>');
                }
            }

        });
    });
</script>
</body>
</html>
