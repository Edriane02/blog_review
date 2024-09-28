<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Professional Book Review CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="adminAssets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="../adminAssets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../adminAssets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../adminAssets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">
                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="../adminAssets/images/logo-dark.png" height="40" alt="logo">
                                        </a>
                                        <h5 class="text-primary mb-2 mt-4">Welcome to Professional Book Review CMS!</h5>
                                        <p class="text-muted">Sign in to continue.</p>
                                    </div>

                                    <form method="POST" action="{{ route('loginAction') }}">
                                        @csrf
                                    <!-- Form Start -->
                                        <div class="mb-3">
                                            <label for="useremail">Email</label>
                                            <input type="text" name="email" class="form-control" id="useremail" placeholder="Enter email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <!-- <p>Don't have an account?<a href="auth-register.html" class="fw-bold text-white"> Register</a> </p> -->
                            <p>© <script>document.write(new Date().getFullYear())</script> Professional Book Review CMS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="../adminAssets/libs/jquery/jquery.min.js"></script>
    <script src="../adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminAssets/libs/metismenu/metisMenu.min.js"></script>
    <script src="../adminAssets/libs/simplebar/simplebar.min.js"></script>
    <script src="../adminAssets/libs/node-waves/waves.min.js"></script>
    <script src="../adminAssets/js/app.js"></script>

</body>
</html>