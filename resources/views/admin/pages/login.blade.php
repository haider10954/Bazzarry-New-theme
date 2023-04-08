<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Bazaarry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{asset('admin_assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin_assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admin_assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <styel>

    </styel>
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
                                    <img src="{{asset('admin_assets/images/logo-light.png')}}" alt="" height="20">
                                </a>
                            </div>
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
                                    <form id="loginForm">
                                        @csrf
                                        <div class="prompt"></div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                            <div class="error-email"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5" placeholder="Enter password" id="password-input" name="password">
                                                <button onclick="TogglePassword() "class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                            <div class="error-password"></div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit" id="submitForm">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
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
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Bazaarry. Crafted with <i class="mdi mdi-heart text-danger"></i> by Haseeb and Company
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
    <script src="{{asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin_assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin_assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admin_assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('admin_assets/js/plugins.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- particles js -->
    <script src="{{asset('admin_assets/libs/particles.js/particles.js')}}"></script>
    <!-- particles app js -->
    <script src="{{asset('admin_assets/js/pages/particles.app.js')}}"></script>
    <!-- password-addon init -->
    <script src="{{asset('admin_assets/js/pages/password-addon.init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        // Create an instance of Notyf
        var notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top',
            },
        });
        $("#loginForm").on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($("#loginForm")[0]);
            formData = new FormData($("#loginForm")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('admin_auth_login') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {
                    $("#submitForm").prop('disabled', true);
                    $("#submitForm").html('<div class="spinner-border custom-spin-style me-2" role="status"> <span class="visually-hidden">Loading...</span> </div> Processing');
                },
                success: function(res) {
                    if (res.success == true) {
                        $("#submitForm").prop('disabled', false);
                        $("#submitForm").html('Sign In');
                        notyf.success({
                            message:res.message ,
                            duration: 3000
                        });
                        setTimeout(function() {
                            window.location.href = "{{ route('admin-dashboard') }}";
                        }, 3200);
                        $('error-email').html('');
                        $('.error-password').html('');

                    } else {
                        $("#submitForm").prop('disabled', false);
                        $("#submitForm").html('Sign In');
                        notyf.error({
                            message:res.message ,
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
                    if (e.responseJSON.errors['password']) {
                        $('.error-password').html('<small class=" error-message text-danger">' + e.responseJSON.errors['password'][0] + '</small>');
                    }
                }

            });
        });
        // Change the type of input to password or text
        function TogglePassword() {
            var temp = document.getElementById("password-input");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
    </script>
</body>

</html>
