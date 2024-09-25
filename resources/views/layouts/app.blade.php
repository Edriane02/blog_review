<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Professional Book Review</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="guestAssets/imgs/theme/favicon.png">
    <!-- Site CSS  -->
    <link rel="stylesheet" href="guestAssets/css/style.css">
    <link rel="stylesheet" href="guestAssets/css/widgets.css">
    <link rel="stylesheet" href="guestAssets/css/responsive.css">
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
                        <a href="index.html"><img class="logo" src="guestAssets/imgs/theme/logo.png" alt=""></a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">
                        <button class="search-icon d-md-inline"><span class="mr-15 text-muted"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <button class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Contact Us Today!</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky">
            <div class="container align-self-center">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block float-left">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline font-small">
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li> <a href="">About Us</a> </li>
                            <li> <a href="">How We Work</a> </li>
                            <li> <a href="">Purchase Your Review</a> </li>
                            <li> <a href="">Latest Reviews</a> </li>
                            <li> <a href="">Testimonials</a> </li>
                            <li> <a href="">FAQ</a> </li>
                            <!-- <li> <a href="">Contact Us</a> </li> -->
                        </ul>
                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li> <a href="">About Us</a> </li>
                            <li> <a href="">How We Work</a> </li>
                            <li> <a href="">Purchase Your Review</a> </li>
                            <li> <a href="">Latest Reviews</a> </li>
                            <li> <a href="">Testimonials</a> </li>
                            <li> <a href="">FAQ</a> </li>
                            <!-- <li> <a href="">Contact Us</a> </li> -->
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        Follow us:&nbsp;&nbsp;<li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
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
                                <input type="text" id="search-bar" class="form-control" placeholder="Search for book title, author, genre">
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
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar-widget wow fadeInUp animated mb-30">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">About us</h5>
                        </div>
                        <div class="textwidget">
                            <p>
                                Start writing, no matter what. The water does not flow until the faucet is turned on.
                            </p>
                            <p><strong class="color-black">Address</strong><br>
                                123 Main Street<br>
                                New York, NY 10001</p>
                            <p><strong class="color-black">Follow us on</strong><br>
                                <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li class="list-inline-item"><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="sidebar-widget widget_categories wow fadeInUp animated mb-30" data-wow-delay="0.1s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Quick links</h5>
                        </div>
                        <ul class="font-small">
                            <li class="cat-item cat-item-2"><a href="#">About me</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Help & Support</a></li>
                            <li class="cat-item cat-item-5"><a href="#">​​Licensing Policy</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Refund Policy</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Hire me</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copy-right pt-30 mt-20 wow fadeInUp animated">
                <p class="float-md-left font-small text-muted">© 2024 Professional Book Review</p> 
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <div class="dark-mark"></div>

    <!-- Custom JS -->
    <script>
        document.getElementById('agreeCheckbox').addEventListener('change', function() {
            var button = document.getElementById('registerButton');
            button.disabled = !this.checked;
        });
    </script>

    <!-- Vendor JS-->
    <script src="./guestAssets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./guestAssets/js/vendor/popper.min.js"></script>
    <script src="./guestAssets/js/vendor/bootstrap.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.slicknav.js"></script>
    <script src="./guestAssets/js/vendor/slick.min.js"></script>
    <script src="./guestAssets/js/vendor/wow.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.ticker.js"></script>
    <script src="./guestAssets/js/vendor/jquery.vticker-min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="./guestAssets/js/vendor/jquery.sticky.js"></script>
    <script src="./guestAssets/js/vendor/perfect-scrollbar.js"></script>
    <script src="./guestAssets/js/vendor/waypoints.min.js"></script>
    <script src="./guestAssets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- Site JS -->
    <script src="./guestAssets/js/main.js"></script>
</body>

</html>