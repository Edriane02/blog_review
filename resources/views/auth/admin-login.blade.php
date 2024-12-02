<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Literary Critical Guild Reviews CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Literary Critical Guild Reviews offers in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books." />
    <meta name="keywords" content="book reviews,professional book review service,literature,book marketing,author visibility,sales boost,new books,established authors,literary reviews,book discovery,in-depth book analysis,reading,book recommendations,literary critical guild reviews" />
    <meta name="author" content="Literary Critical Guild Reviews" />

    <meta property="og:title" content="Literary Critical Guild Reviews"/>
    <meta property="og:type" content="website"/>
    <!-- <meta property="og:url" content="https://www.yoursite.com/"/> -->
    <meta property="og:site_name" content="Literary Critical Guild Reviews"/>
    <meta property="og:description" content="Literary Critical Guild Reviews offers in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books."/>
    <meta property="og:image" content="{{ asset('guestAssets/imgs/theme/og_banner.png') }}"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminAssets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{ asset('adminAssets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="authentication-bg bg-primary">
@include('partials.sweetalert')

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
                                            <img src="{{ asset('adminAssets/images/logo-dark.png') }}" height="40" alt="logo">
                                        </a>
                                        <h5 class="text-primary mb-2 mt-4">Welcome to Literary Critical Guild Reviews CMS!</h5>
                                        <p class="text-muted">Sign in to continue</p>
                                    </div>

                                    <!-- Form start -->
                                    <form method="POST" action="{{ route('adminLoginAction') }}">
                                        @csrf

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
                                    <!-- Form end -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <!-- <p>Don't have an account?<a href="#" class="fw-bold text-white"> Register</a> </p> -->
                            <p>© <script>document.write(new Date().getFullYear())</script> Literary Critical Guild Reviews CMS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- JavaScript -->
    <script src="{{ asset('adminAssets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/app.js') }}"></script>

</body>
</html>