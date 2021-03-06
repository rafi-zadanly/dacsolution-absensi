<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data["page"] ?> - DAC Application</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASEURL ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASEURL ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">

    <!-- Jquery -->
    <script src="<?= BASEURL ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

    <!-- Loader (Wait Me) -->
    <link href="<?= BASEURL ?>/loader/waitMe.min.css" rel="stylesheet">
    <script src="<?= BASEURL ?>/loader/waitMe.min.js"></script>
</head>

<body id="page-top">
    <?php Flasher::flash(); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-2">DAC Solution</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $data["page"] == "Dashboard" ? "active" : ""; ?>">
                <a class="nav-link <?= $data["page"] == "Dashboard" ? "disabled" : ""; ?>" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Nav Item - Karyawan -->
            <li class="nav-item <?= $data["page"] == "Karyawan" ? "active" : ""; ?>">
                <a class="nav-link <?= $data["page"] == "Karyawan" ? "disabled" : ""; ?>" href="/karyawan">
                    <i class="fas fa-user-friends"></i>
                    <span>Karyawan</span>
                </a>      
            </li>

            <!-- Nav Item - Absensi -->
            <li class="nav-item <?= $data["page"] == "Absensi" ? "active" : ""; ?>">
                <a class="nav-link <?= $data["page"] == "Absensi" ? "disabled" : ""; ?>" href="/absensi">
                    <i class="fas fa-user-clock"></i>
                    <span>Absensi</span>
                </a>        
            </li>      

            <!-- Nav Item - Penggajian -->
            <li class="nav-item <?= $data["page"] == "Penggajian" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penggajianPages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-id-card-alt"></i>
                    <span>Penggajian</span>
                </a>
                <div id="penggajianPages" class="collapse <?= $data["page"] == "Penggajian" ? "show" : ""; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu :</h6>
                        <a class="collapse-item <?= $data["nested_page"] == "Gaji" ? "active" : ""; ?>" href="/penggajian/gaji">Gaji</a>
                        <a class="collapse-item <?= $data["nested_page"] == "Tunjangan" ? "active" : ""; ?>" href="/penggajian/tunjangan">Tunjangan</a>                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Cuti Menu -->
            <li class="nav-item <?= $data["page"] == "Cuti" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-id-card-alt"></i>
                    <span>Cuti</span>
                </a>
                <div id="collapsePages" class="collapse <?= $data["page"] == "Cuti" ? "show" : ""; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu :</h6>
                        <a class="collapse-item <?= $data["nested_page"] == "Kuota" ? "active" : ""; ?>" href="/cuti/kuota">Kuota</a>
                        <a class="collapse-item <?= $data["nested_page"] == "Riwayat" ? "active" : ""; ?>" href="/cuti/riwayat">Riwayat</a>
                        <a class="collapse-item <?= $data["nested_page"] == "Permintaan" ? "active" : ""; ?>" href="cuti/permintaan">Permintaan</a>            
                    </div>
                </div>
            </li>

            <!-- Nav Item - Inventory -->
            <li class="nav-item <?= $data["page"] == "Inventory" ? "active" : ""; ?>">
                <a class="nav-link <?= $data["page"] == "Inventory" ? "disabled" : ""; ?>" href="/inventory">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory</span>
                </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Laporan -->
            <li class="nav-item <?= $data["page"] == "Laporan" ? "active" : ""; ?>">
                <a class="nav-link <?= $data["page"] == "Laporan" ? "disabled" : ""; ?>" href="/laporan">
                    <i class="fas fa-file-upload"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>

                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">22 Oktober 2020</div>
                                <span class="font-weight-bold">Permintaan cuti dari Fatimah</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">19 Oktober 2020</div>
                                <span class="font-weight-bold">Permintaan cuti dari Rafi Zadanly</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">17 Oktober 2020</div>
                                <span class="font-weight-bold">Permintaan cuti dari Fatimah</span>
                            </div>
                        </a>

                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["auth"]["full_name"] ?></span>
                        <img class="img-profile rounded-circle" src="https://images.vexels.com/media/users/3/147101/isolated/preview/b4a49d4b864c74bb73de63f080ad7930-instagram-profile-button-by-vexels.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">