<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | The Eastern Review CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The Eastern Review explores books in depth, helping both new and established titles gain more visibility and sales." />
    <meta name="keywords" content="professional book review service,book recommendations,book discovery,reading,author visibility,literature,in-depth book analysis,sales boost,the eastern review,book marketing,new books,book reviews,established authors,new authors,featured authors" />
    <meta name="author" content="The Eastern Review" />

    <meta property="og:title" content="The Eastern Review"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://theeasternreview.com"/>
    <meta property="og:site_name" content="The Eastern Review"/>
    <meta property="og:description" content="The Eastern Review explores books in depth, helping both new and established titles gain more visibility and sales."/>
    <meta property="og:image" content="{{ asset('guestAssets/imgs/theme/og_banner.png') }}"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminAssets/images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{ asset('adminAssets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .auth-page-bg {
            --bs-bg-opacity: 1;
            background-color: #B3876E;
        }

        .auth-welcome-text {
            color: #B3876E;
        }
    </style>

</head>
<body class="authentication-bg auth-page-bg">
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
                                            <img src="{{ asset('adminAssets/images/logo-dark.png') }}" height="70" alt="logo">
                                        </a>
                                        <h5 class="auth-welcome-text mb-2 mt-4">Welcome to The Eastern Review CMS!</h5>
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
                                                <!-- <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-label" for="customControlInline">Remember me</label> -->
                                            </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                    <!-- Form end -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>© <script>document.write(new Date().getFullYear())</script> The Eastern Review CMS</p>
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