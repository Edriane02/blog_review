<!-- CMS LAYOUT -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Professional Book Review CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional book review service offering in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books." />
    <meta name="keywords" content="book reviews,professional book review service,literature,book marketing,author visibility,sales boost,new books,established authors,literary reviews,book discovery,in-depth book analysis,reading,book recommendations" />
    <meta name="author" content="Professional Book Review" />

    <meta property="og:title" content="Professional Book Review"/>
    <meta property="og:type" content="website"/>
    <!-- <meta property="og:url" content="https://www.yoursite.com/"/> -->
    <meta property="og:site_name" content="Professional Book Review Service"/>
    <meta property="og:description" content="Professional book review service offering in-depth reviews that explore literature's worlds and perspectives. Boost visibility and sales for both new and established books."/>
    <!-- <meta property="og:image" content="https://www.yoursite.com/images/book-review.png"/> -->

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminAssets/images/favicon.ico') }}">

    <link href="{{ asset('adminAssets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugin css -->
    <link href="{{ asset('adminAssets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('adminAssets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="{{ asset('adminAssets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Custom font (Quote) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('adminAssets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('adminAssets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('adminAssets/css/custom-styles.css') }}" rel="stylesheet" type="text/css" />

    <!-- Image file upload CSS -->
    <link href="{{ asset('adminAssets/css/image-upload.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

    <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                <!-- Logo -->
                 <div class="navbar-brand-box">
                    <a href="{{ route('dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('adminAssets/images/logo-sm.png') }}" alt="Site logo" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('adminAssets/images/logo-dark.png') }}" alt="Site logo" height="35">
                        </span>
                    </a>

                    <a href="{{ route('dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('adminAssets/images/logo-sm.png') }}" alt="Site logo" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('adminAssets/images/logo-light.png') }}" alt="Site logo" height="20">
                        </span>
                    </a>
                </div>
                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('guestAssets/imgs/static/default_photo_resized.jpg') }}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">{{ session('admin_fname') . ' ' . session('admin_lname') }}
                            </span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('profilePage') }}"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-exit-to-app font-size-16 align-middle me-1 text-danger"></i> Log out</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Side menu -->
                <div id="sidebar-menu">
                    <!-- Left menu start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('home') }}" target="_blank" class="waves-effect">
                                <i class="dripicons-web"></i>
                                <span>Go to Website</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('posts') }}" class="waves-effect">
                                <i class="dripicons-list"></i>
                                <span>All Posts</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('newPost') }}" class="waves-effect">
                                <i class="dripicons-article"></i>
                                <span>Add New Post</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tags') }}" class="waves-effect">
                                <i class="dripicons-tag"></i>
                                <span>Tags</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('reviewer') }}" class="waves-effect">
                                <i class="dripicons-jewel"></i>
                                <span>Reviewers</span>
                            </a>
                        </li>

                            <li>
                                <a href="{{ route('messages') }}" class="waves-effect">
                                    <i class="dripicons-message"></i>
                                    <span>Messages</span>
                                </a>
                            </li>
                        @if(auth()->user()->adminUserProfile->designationType->designation == 'management')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-toggles"></i>
                                <span>Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <span>Users</span>
                                    </a>
                                    <ul>
                                        <li><a href="{{ route('all-users') }}">All Users</a></li>
                                        <li><a href="{{ route('admin-users') }}">Admin</a></li>
                                        <li><a href="{{ route('client-users') }}">Client</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('designation')}}">Roles</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left sidebar end -->

    <div class="main-content">

    @yield('contents')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        ©
                        <script>document.write(new Date().getFullYear())</script> Professional Book Review CMS
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- End main content -->

    </div>
    <!-- End layout-wrapper -->

    <!-- JavaScript -->
    <script src="{{ asset('adminAssets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Required DataTable JS -->
    <script src="{{ asset('adminAssets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('adminAssets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init JS -->
    <script src="{{ asset('adminAssets/js/pages/datatables.init.js') }}"></script>

    <!-- Image file upload JS -->
    <script src="{{ asset('adminAssets/js/image-upload.js') }}"></script>

    <script src="{{ asset('adminAssets/libs/select2/js/select2.min.js') }}"></script>

    <!-- TinyMCE JS -->
    <script src="{{ asset('adminAssets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- Init JS -->
    <script src="{{ asset('adminAssets/js/pages/form-editor.init.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('adminAssets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('adminAssets/libs/dropzone/min/dropzone.min.js') }}"></script>

    <script src="{{ asset('adminAssets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ asset('adminAssets/js/app.js') }}"></script>

</body>
</html>