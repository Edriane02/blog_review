<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Professional Book Review CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../adminAssets/images/favicon.ico">

    <!-- plugin css -->
    <link href="../adminAssets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="../adminAssets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../adminAssets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../adminAssets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="../adminAssets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../adminAssets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom Font (Quote) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../adminAssets/css/custom-styles.css" rel="stylesheet" type="text/css" />

    <!-- Image file upload CSS -->
    <link href="assets/css/image-upload.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                <!-- LOGO -->
                 <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="../adminAssets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="../adminAssets/images/logo-dark.png" alt="" height="35">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="../adminAssets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="../adminAssets/images/logo-light.png" alt="" height="20">
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
                            <img class="rounded-circle header-profile-user" src="../adminAssets/images/users/avatar-7.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">James</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="profile.html"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('index') }}" class="waves-effect">
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
                            <a href="add-post.html" class="waves-effect">
                                <i class="dripicons-article"></i>
                                <span>Add New Post</span>
                            </a>
                        </li>

                        <li>
                            <a href="tags.html" class="waves-effect">
                                <i class="dripicons-tag"></i>
                                <span>Tags</span>
                            </a>
                        </li>

                        <li>
                            <a href="reviewers.html" class="waves-effect">
                                <i class="dripicons-jewel"></i>
                                <span>Reviewers</span>
                            </a>
                        </li>

                        <li>
                            <a href="client-users.html" class="waves-effect">
                                <i class="dripicons-user-group"></i>
                                <span>Users (Client)</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-toggles"></i>
                                <span>Designation</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="all-users.html">All Users</a></li>
                                <li><a href="add-user.html">Add New User</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

    <div class="main-content">

    @yield('contents')

        <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            © <script>document.write(new Date().getFullYear())</script> Professional Book Review CMS
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="../adminAssets/libs/jquery/jquery.min.js"></script>
    <script src="../adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminAssets/libs/metismenu/metisMenu.min.js"></script>
    <script src="../adminAssets/libs/simplebar/simplebar.min.js"></script>
    <script src="../adminAssets/libs/node-waves/waves.min.js"></script>

    <!-- Required datatable js -->
    <script src="../adminAssets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../adminAssets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="../adminAssets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../adminAssets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="../adminAssets/js/pages/datatables.init.js"></script>

    <!-- Image file upload JS -->
    <script src="../adminAssets/js/image-upload.js"></script>

    <!-- apexcharts -->
    <!-- <script src="../adminAssets/libs/apexcharts/apexcharts.min.js"></script> -->

    <!-- Plugins js-->
    <script src="../adminAssets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../adminAssets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../adminAssets/js/pages/dashboard.init.js"></script>
    <script src="../adminAssets/js/app.js"></script>

</body>
</html>