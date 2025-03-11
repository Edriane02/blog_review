<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Unauthorized | Literary Critics Guild Reviews CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Literary Critics Guild Reviews offers in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books." />
    <meta name="keywords" content="book reviews,professional book review service,literature,book marketing,author visibility,sales boost,new books,established authors,literary reviews,book discovery,in-depth book analysis,reading,book recommendations,literary critics guild reviews" />
    <meta name="author" content="Literary Critics Guild Reviews" />

    <meta property="og:title" content="Literary Critics Guild Reviews"/>
    <meta property="og:type" content="website"/>
    <!-- <meta property="og:url" content="https://www.yoursite.com/"/> -->
    <meta property="og:site_name" content="Literary Critics Guild Reviews"/>
    <meta property="og:description" content="Literary Critics Guild Reviews offers in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books."/>
    <meta property="og:image" content="{{ asset('guestAssets/imgs/theme/og_banner.png') }}"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminAssets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{ asset('adminAssets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
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
                                    <div class="text-center p-5">
                                        <h1 style="font-size: 6em;" class="error-page"><span>Oops!</span></h1>
                                        <h4 class="mb-4 mt-5"><strong>Unauthorized</strong></h4>
                                        <p class="mb-4 mx-auto">Sorry, you don't have permission to access this page.</p>
                                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('dashboard') }}"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                                        <a class="btn btn-danger waves-effect waves-light" href="{{ route('logout') }}">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center text-white">
                            <p>© <script>document.write(new Date().getFullYear())</script> Literary Critics Guild Reviews CMS</p>
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