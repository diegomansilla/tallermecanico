<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema para Taller Mecánico</title>

    <link rel="icon" type="image/png" href="<?= base_url('public/img/carimg.jpg') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>public/js/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/DataTables/media/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap-5.3.8/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap-icons/bootstrap-icons.min.css">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('public/img/carimg.jpg') ?>" alt="Logo"
                        style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <div class="sidebar-brand-text mx-3">Taller Mecánico</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a href="<?php echo base_url() ?>public/panel" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Registros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url() ?>public/usuarios">
                    <i class="bi bi-person-rolodex"></i>
                    <span>Usuarios</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url() ?>public/clientes">
                    <i class="bi bi-people-fill"></i>

                    <span>Clientes</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url() ?>public/autos">
                    <i class="bi bi-car-front-fill"></i>
                    <span>Autos</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url() ?>public/proveedores">
                    <i class="bi bi-box-fill"></i>
                    <span>Proveedores</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url() ?>public/reparaciones">
                    <i class="bi bi-tools"></i>
                    <span>Reparaciones</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </li>

                        <button type="button" class="btn btn-link text-muted" data-toggle="modal"
                            data-target="#modalCreditos">
                            <i class="fas fa-info-circle"></i>
                        </button>

                        <div class="modal fade" id="modalCreditos" tabindex="-1" role="dialog"
                            aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="modal-header bg-primary text-white">
                                        <img src="<?= base_url('public/img/carimg.jpg') ?>" alt="Logo Institución"
                                            style="width: 50px; margin-bottom: 2px;">
                                        <h5 class="modal-title" id="modalLabel">Sistema para Taller Mecánico</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body text-center">
                                        <img src="<?= base_url('public/img/instituto_icon.png') ?>" alt="Logo Institución"
                                            style="width: 80px; margin-bottom: 15px;">
                                        <h6 class="text text-muted">Instituto Superior "Gaspar L. Benavento"</h6>
                                        <h6 class="font-weight-bold text-uppercase text-primary">Tecnicatura Superior en
                                            Análisis y Desarrollo de Software</h6>
                                        <h6 class="text text-muted">Materia: Programación III</h6>

                                        <hr>

                                        <div class="row text-left">
                                            <div class="col-md-6">
                                                <small
                                                    class="text-uppercase text-muted font-weight-bold">Alumno</small>
                                                <ul class="list-unstyled mt-2">
                                                    <li><i class="fas fa-code text-primary"></i> Mansilla, Diego</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <small
                                                    class="text-uppercase text-muted font-weight-bold">Docente</small>
                                                <ul class="list-unstyled mt-2">
                                                    <li><i class="fas fa-chalkboard-teacher text-success"></i> Prof.
                                                        Delfor Castro</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer bg-light d-flex justify-content-between">
                                        <small class="text-muted">Victoria, Entre Ríos - &copy;<?php echo date('Y') ?></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <!-- usuario usuario --><?php echo session()->get('usuario'); ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url(); ?>public/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <?php echo $titulo; ?>
                        </h1>

                    </div>