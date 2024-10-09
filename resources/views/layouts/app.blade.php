<!-- GUEST LAYOUT -->

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Professional Book Review</title>
    <meta name="description" content="Professional book review service offering in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books." />
    <meta name="keywords" content="book reviews,professional book review service,literature,book marketing,author visibility,sales boost,new books,established authors,literary reviews,book discovery,in-depth book analysis,reading,book recommendations" />
    <meta name="author" content="Professional Book Review" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('guestAssets/imgs/theme/favicon.png') }}">
    <!-- Site CSS  -->
    <link rel="stylesheet" href="{{ asset('guestAssets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('guestAssets/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('guestAssets/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('guestAssets/css/custom-styles.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    @if(Session::has('success'))
        <div class="row-cell dk">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="row-cell dk">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="scroll-progress primary-bg"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="circle"></div>
    </div>
    <!--Offcanvas sidebar-->
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
        <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    </aside>

    <!-- Start Header -->
    <header class="main-header header-style-1 font-heading">
        <div class="header-top">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-md-3 col-xs-6">
                        <a href="{{ route('home') }}"><img class="logo" src="{{ asset('guestAssets/imgs/theme/logo.png') }}"
                                alt=""></a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">
                        <button class="search-icon d-md-inline"><span class="mr-15 text-muted"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <a class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow" href="#">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky nav-background">
            <div class="container align-self-center">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block float-left">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline font-small">
                            <li> <a class="nav-links-color-desktop" href="{{ route('home') }}">Home</a> </li>
                            <li> <a class="nav-links-color-desktop" href="latest-reviews.html">Latest Reviews</a> </li>
                            <li> <a class="nav-links-color-desktop" href="contact-us.html">Contact Us</a> </li>
                            <li> <a class="nav-links-color-desktop" href="about-us.html">About Us</a> </li>
                            <li> <a class="nav-links-color-desktop" href="login.html">Log in to Your Account <i class="bi bi-box-arrow-in-right"></i></a> </li>
                        </ul>
                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li> <a href="latest-reviews.html">Latest Reviews</a> </li>
                            <li> <a href="contact-us.html">Contact Us</a> </li>
                            <li> <a href="about-us.html">About Us</a> </li>
                            <li> <a href="login.html">Log in to Your Account <i class="bi bi-box-arrow-in-right"></i></a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15 nav-links-color-desktop">
                        Follow us:&nbsp;&nbsp;<li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="javascript:void(0);"><i class="elegant-icon social_facebook"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>
    <!--Start search form-->
    <div class="main-search-form">
        <div class="container">
            <div class=" pt-50 pb-50 ">
                <div class="row mb-20">
                    <div class="col-12 align-self-center main-search-form-cover m-auto">
                        <p class="text-center"><span class="search-text-bg">Search</span></p>
                        <form action="search-results.html" class="search-header">
                            <div class="input-group w-100">
                                <input type="text" id="search-bar" class="form-control"
                                    placeholder="Search for book title or author">
                                <div class="input-group-append">
                                    <button class="btn btn-search bg-white" type="submit">
                                        <i class="elegant-icon icon_search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-80 text-center">
                    <div class="col-12 font-small suggested-area">
                        <h5 class="suggested font-heading mb-20 text-muted"> <strong>Suggested tags:</strong></h5>
                        <ul class="list-inline d-inline-block">
                            <li class="list-inline-item"><a href="category-results.html">Fiction</a></li>
                            <li class="list-inline-item"><a href="category-results.html">Non-Fiction</a></li>
                            <li class="list-inline-item"><a href="category-results.html">Mystery</a></li>
                            <li class="list-inline-item"><a href="category-results.html">Comedy</a></li>
                            <li class="list-inline-item"><a href="category-results.html">Novel</a></li>
                            <li class="list-inline-item"><a href="category-results.html">Biography</a></li>
                            <li class="list-inline-item"><a href="category-results.html">True Crime</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('contents')

    <!-- Footer Start-->
    <footer class="pt-50 pb-20">
        <div class="container">
            <div class="footer-copy-right pt-30 mt-20 wow fadeInUp animated">
                <p class="float-md-left font-medium text-muted">© 2024 Professional Book Review</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <div class="dark-mark"></div>

    <!-- Custom JS -->
    <script>
        document.getElementById('agreeCheckbox').addEventListener('change', function () {
            var button = document.getElementById('registerButton');
            button.disabled = !this.checked;
        });
    </script>

    <!-- Vendor JS-->
    <script src="{{ asset('guestAssets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.ticker.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.sticky.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('guestAssets/js/vendor/jquery.theia.sticky.js') }}"></script>
    <!-- Site JS -->
    <script src="{{ asset('guestAssets/js/main.js') }}"></script>

</body>

</html>