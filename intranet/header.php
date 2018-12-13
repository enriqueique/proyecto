<?php $base_url = "AÑADE TU URL PRINCIPAL AQUI"; ?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Blank Page</title>

    <!-- Bootstrap core CSS-->
    <link href="<?= $base_url ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= $base_url ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?= $base_url ?>/assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $base_url ?>/assets/css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  </head>

  <body id="page-top" class="sidebar-toggled">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?= $base_url ?>/index.php">Salir de Administración</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw fa-2x"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
          </div>
        </li>
      </ul>

    </nav>
<div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/hermanos/">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hermanos</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/reuniones/">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reuniones</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/eventos/">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Eventos</span></a>
        </li>

	<li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/pagos/">
            <i class="fas fa-fw fa-table"></i>
            <span>Pagos</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>/intranet/utileria/">
            <i class="fas fa-fw fa-table"></i>
            <span>Utileria</span></a>
        </li>

        
      </ul>

      <div id="content-wrapper">

