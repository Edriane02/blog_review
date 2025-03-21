<!-- GUEST LAYOUT -->

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | The Eastern Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('guestAssets/imgs/theme/favicon.png') }}">

    <meta name="description" content="The Eastern Review explores books in depth, helping both new and established titles gain more visibility and sales." />
    <meta name="keywords" content="professional book review service,book recommendations,book discovery,reading,author visibility,literature,in-depth book analysis,sales boost,the eastern review,book marketing,new books,book reviews,established authors,new authors,featured authors" />
    <meta name="author" content="The Eastern Review" />

    <meta property="og:title" content="The Eastern Review" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="The Eastern Review" />
    <meta property="og:description" content="The Eastern Review explores books in depth, helping both new and established titles gain more visibility and sales." />
    <meta property="og:image" content="{{ asset('guestAssets/imgs/theme/og_banner.png') }}"/>

    <!-- Site CSS  -->
    <link rel="stylesheet" href="{{ asset('guestAssets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('guestAssets/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('guestAssets/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('guestAssets/css/custom-styles.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .swal2-select {
            display: none !important;
        }
    </style>
</head>

<body>
 @include('partials.sweetalert')
    <div class="scroll-progress primary-bg"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="circle"></div>
    </div>
    <!-- Offcanvas sidebar -->
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
        <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    </aside>

    <!-- Start Header -->
    <header class="main-header header-style-1 font-heading">
        <div class="header-top">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-md-3 col-xs-6">
                        <a href="{{ route('home') }}"><img class="logo" width="125" src="{{ asset('guestAssets/imgs/theme/logo.png') }}" alt=""></a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">
                        <button class="search-icon d-md-inline"><span class="mr-15 text-muted"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <a class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow" href="{{ route('contactUs') }}">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky nav-background">
            <div class="container align-self-center">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block">
                    <nav>
                        <!-- Desktop menu -->
                        <ul class="main-menu d-none d-lg-inline font-small float-left">
                            <li> <a class="nav-links-color-desktop custom-hover" href="{{ route('home') }}">Home</a> </li>
                            <li> <a class="nav-links-color-desktop custom-hover" href="{{ route('latestReviewsPage') }}">Latest Reviews</a> </li>
                            <li> <a class="nav-links-color-desktop custom-hover" href="{{ route('featured.authors') }}">Featured Authors</a> </li>
                            <li> <a class="nav-links-color-desktop custom-hover" href="{{ route('contactUs') }}">Contact Us</a> </li>
                            <li> <a class="nav-links-color-desktop custom-hover" href="{{ route('aboutUs') }}">About Us</a> </li>
                            
                        </ul>
                        <ul class="main-menu d-none d-lg-inline font-small float-right">
                            @auth('client')
                                <!-- If the user is logged in -->
                                <li class="menu-item-has-children">
                                    <a class="nav-links-color-desktop custom-hover d-flex align-items-center" href="{{ route('clientProfile') }}">
                                        <img src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" alt="Profile Image" class="profile-image mr-2" />
                                        {{ session('client_fname') . ' ' . session('client_lname') }}
                                    </a>
                                    <ul class="sub-menu font-small">
                                        <li><a class="text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;Log out</a></li>
                                    </ul>
                                </li>
                            @else
                                <!-- If the user is not logged in -->
                                <li>
                                    <a class="nav-links-color-desktop custom-hover d-flex align-items-center" href="{{ route('login') }}">
                                        <img src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" alt="Profile Image" class="profile-image mr-2" />
                                        Log in to Your Account <i class="bi bi-box-arrow-in-right ml-1"></i>
                                    </a>
                                </li>
                            @endauth
                        </ul>

                        <!-- Mobile menu -->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li> <a href="{{ route('latestReviewsPage') }}">Latest Reviews</a> </li>
                            <li> <a href="{{ route('featured.authors') }}">Featured Authors</a> </li>
                            <li> <a href="{{ route('contactUs') }}">Contact Us</a> </li>
                            <li> <a href="{{ route('aboutUs') }}">About Us</a> </li>

                            @auth('client')
                                <!-- If the user is logged in -->
                                <li class="menu-item-has-children">
                                    <a class="nav-links-color-desktop d-flex align-items-center" href="{{ route('clientProfile') }}">
                                        <img src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" alt="Profile Image" class="profile-image mr-2" />
                                        {{ session('client_fname') . ' ' . session('client_lname') }}
                                    </a>
                                    <ul class="sub-menu font-small">
                                        <li><a class="text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;Log out</a></li>
                                    </ul>
                                </li>
                            @else
                                <!-- If the user is not logged in -->
                                <li>
                                    <a class="nav-links-color-desktop d-flex align-items-center" href="{{ route('login') }}">
                                        <img src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" alt="Profile Image" class="profile-image mr-2" />
                                        Log in to Your Account <i class="bi bi-box-arrow-in-right ml-1"></i>
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15 nav-links-color-desktop"></ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>

    <!-- Start search form -->
    <div class="main-search-form">
        <div class="container">
            <div class=" pt-50 pb-50 ">
                <div class="row mb-20">
                    <div class="col-12 align-self-center main-search-form-cover m-auto">
                        <p class="text-center"><span class="search-text-bg">Search</span></p>
                        <form action="{{ route('search') }}" method="GET" class="search-header">
                            <div class="input-group w-100">
                                <input type="text" name="query" id="search-bar" class="form-control" placeholder="Search for book title or author..." required>
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
                        <h5 class="suggested font-heading mb-20 text-muted"> <strong>Browse by tags:</strong></h5>
                        <ul class="list-inline d-inline-block">
                            @if($tags->count() > 0)
                                @foreach($tags as $tag)
                                    <li class="list-inline-item">
                                        <a href="{{ route('categorySearch', ['tagId' => $tag->id]) }}">{{ $tag->tag }}</a>
                                    </li>
                                @endforeach
                            @else
                                <div class="alert alert-info" role="alert">
                                    No tags found.
                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('contents')

    <!-- Footer start -->
    <footer class="pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar-widget wow fadeInUp animated mb-30">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">About</h5>
                        </div>
                        <div class="textwidget">
                            <h5><strong>The Eastern Review</strong></h5>
                            <p style="font-size: 15px;">
                                <i>Uncovering world’s stories, one book at a time.</i>
                            </p>
                            <!-- <p><strong class="color-black">Follow us</strong><br>
                                <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                    <li class="list-inline-item"><a class="fb" href="javascript:void(0)" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                </ul>
                                </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar-widget widget_categories wow fadeInUp animated mb-30" data-wow-delay="0.1s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Quick links</h5>
                        </div>
                        <ul class="font-small">
                            <li class="cat-item cat-item-2"><a href="{{ route('home') }}">Home</a></li>
                            <li class="cat-item cat-item-4"><a href="{{ route('latestReviewsPage') }}">Latest Reviews</a></li>
                            <li class="cat-item cat-item-4"><a href="{{ route('featured.authors') }}">Featured Authors</a></li>
                            <li class="cat-item cat-item-5"><a href="{{ route('contactUs') }}">​Contact Us</a></li>
                            <li class="cat-item cat-item-6"><a href="{{ route('aboutUs') }}">About Us</a></li>
                            <li class="cat-item cat-item-7"><a href="{{ route('login') }}">Log in to Your Account</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar-widget widget_newsletter wow fadeInUp animated mb-30" data-wow-delay="0.3s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Newsletter</h5>
                        </div>
                        <div class="newsletter">
                            <p class="font-medium">Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                            <form class="input-group form-subcriber mt-30 d-flex">
                                <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                                <button class="btn bg-primary text-white" type="submit" disabled>Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy-right pt-30 mt-20 wow fadeInUp animated">
                <p class="float-md-left font-small text-muted">© 2024 The Eastern Review</p>
            </div>
        </div>
    </footer>
    <!-- Footer end -->
    <div class="dark-mark"></div>

    <!-- Custom JS -->
    <!-- <script>
        document.getElementById('agreeCheckbox').addEventListener('change', function () {
            var button = document.getElementById('registerButton');
            button.disabled = !this.checked;
        });
    </script> -->

    <!-- Vendor JS -->
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