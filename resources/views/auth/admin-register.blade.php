<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Professional Book Review CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/adminAssets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/adminAssets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/adminAssets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/adminAssets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg bg-dark">
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
                                            <img src="/adminAssets/images/logo-dark.png" height="40" alt="logo">
                                        </a>
                                        <h5 class="text-primary mb-2 mt-4">Register</h5>
                                        <!-- NOTE: Register only one admin account. -->
                                    </div>

                                    <!-- Form Start -->
                                    <form method="POST"  action="{{ route('registerUserAdmin') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mname" placeholder="Middle Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center text-white">
                            <p>Already have an account? <a href="auth-login.html" class="fw-bold text-white">Login</a></p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Professional Book Review CMS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="/adminAssets/libs/jquery/jquery.min.js"></script>
    <script src="/adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminAssets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/adminAssets/libs/simplebar/simplebar.min.js"></script>
    <script src="/adminAssets/libs/node-waves/waves.min.js"></script>

    <script src="/adminAssets/js/app.js"></script>
</body>
</html>