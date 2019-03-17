<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Leobox</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css">
        <link rel="stylesheet" href="assets/css/datatables/datatables.min.css">
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.3.2/viewer.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
        <style>
        #jstree_filebrowser .folder { background:url('assets/icons/filebrowser/678084-folder-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file { background:url('assets/icons/filebrowser/File-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-pdf { background:url('assets/icons/filebrowser/647710-pdf-512.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-as { background-position: -36px 0 }
		#jstree_filebrowser .file-c { background-position: -72px -0px }
		#jstree_filebrowser .file-iso { background-position: -108px -0px }
		#jstree_filebrowser .file-htm, #jstree_filebrowser .file-html, #jstree_filebrowser .file-xml, #jstree_filebrowser .file-xsl { background:url('assets/icons/filebrowser/html5-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-cf { background-position: -162px -0px }
		#jstree_filebrowser .file-cpp { background-position: -216px -0px }
		#jstree_filebrowser .file-cs { background-position: -236px -0px }
		#jstree_filebrowser .file-sql { background:url('assets/icons/filebrowser/application-x-sqlite2.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-xls, #jstree_filebrowser .file-xlsx { background-position: -362px -0px }
		#jstree_filebrowser .file-h { background-position: -488px -0px }
		#jstree_filebrowser .file-crt, #jstree_filebrowser .file-pem, #jstree_filebrowser .file-cer { background-position: -452px -18px }
		#jstree_filebrowser .file-php { background-position: -108px -18px }
		#jstree_filebrowser .file-jpg, #jstree_filebrowser .file-jpeg, #jstree_filebrowser .file-png, #jstree_filebrowser .file-gif, #jstree_filebrowser .file-bmp { background:url('assets/icons/filebrowser/image-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-ppt, #jstree_filebrowser .file-pptx { background:url('assets/icons/filebrowser/647711-powerpoint-512.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-rb { background-position: -180px -18px }
		#jstree_filebrowser .file-text, #jstree_filebrowser .file-txt, #jstree_filebrowser .file-md, #jstree_filebrowser .file-log, #jstree_filebrowser .file-htaccess { background:url('assets/icons/filebrowser/file-02-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-doc, #jstree_filebrowser .file-docx { background:url('assets/icons/filebrowser/647713-word-512.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-zip, #jstree_filebrowser .file-gz, #jstree_filebrowser .file-tar, #jstree_filebrowser .file-rar, #jstree_filebrowser .file-tgz{ background:url('assets/icons/filebrowser/file-zip-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-js { background:url('assets/icons/filebrowser/187_Js_logo_logos-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-css { background:url('assets/icons/filebrowser/css-256.png') center no-repeat; background-size: 28px 28px; }
		#jstree_filebrowser .file-fla { background-position: -398px -0px }
        </style>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page home-page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="index.php?module=files" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="assets/img/logo-big.png" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="assets/img/logo.png" alt="logo" class="logo-small">
                                </div>
                            </a>

                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                            <!-- <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li> -->
                            <!-- End Search -->
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                    </li>
                                    <li>
                                        <a class="dropdown-item no-padding-bottom" style="text-align: center;"> 
                                            Hello <?php echo $_SESSION['display_name'] ?> !
                                        </a>
                                    </li>
                                    <li class="separator"></li>
                                    <!-- <li>
                                        <a href="pages-faq.html" class="dropdown-item no-padding-top"> 
                                            Profile
                                        </a>
                                    </li> -->
                                    <li><a rel="nofollow" href="index.php?module=connexion&action=logout" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        </br>
                        <span class="heading">My Leobox</span>
                        <ul class="list-unstyled">
                            <li id="files"><a href="index.php?module=files"><i class="ti ti-folder"></i><span>My Files</span></a></li>
                            <li id="sharedme"><a href="index.php?module=sharedme"><i class="ti ti-sharethis"></i><span>Shared with me</span></a></li>
                        </ul>
                        <span class="heading">My addons</span>
                        <ul class="list-unstyled">
                            <li id="myview"><a href="index.php?module=myview"><i class="ti ti-bar-chart"></i><span>My View</span></a></li>
                        </ul>
                    </nav>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <!-- Begin Page Content -->
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                    <!-- Begin Container -->  
                    <?php echo $module->getControleur()->getVue()->getContenu();?>
                    <!-- End Container -->
                    <!-- Begin Success Modal -->
                    <div id="delay-modal" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <div class="sa-icon sa-success animate" style="display: block;">
                                        <span class="sa-line sa-tip animateSuccessTip"></span>
                                        <span class="sa-line sa-long animateSuccessLong"></span>
                                        <div class="sa-placeholder"></div>
                                        <div class="sa-fix"></div>
                                    </div>
                                    <div class="section-title mt-5 mb-5">
                                        <h2 class="text-dark">Meeting successfully created</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Success Modal -->
                    <!-- Begin Page Footer-->
                    <footer class="main-footer">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                <p class="text-gradient-02">Create by ARIF Ibrar - ASATEKIN Dilan - HAMICHE Sacha</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="documentation.html">About US</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="changelog.html">Contact US</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/chart/chart.min.js"></script>
        <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <script src="assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="assets/vendors/js/datatables/buttons.print.min.js"></script>
        <!-- End Page Vendor Js -->
        <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="http://danml.com/js/download2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.3.2/viewer.min.js"></script>
        <script src="assets/img-viewer/jquery-viewer.min.js"></script>
        <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        var modules = getParameterByName('module');
        $("#"+modules).addClass("active");
        </script>
        <!-- End Page Snippets -->
    </body>
</html>