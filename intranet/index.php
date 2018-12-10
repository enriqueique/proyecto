<?php include ('header.php'); ?>

    <div class="container-fluid">

      <!--Redireccion a index.php -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Panel</a>
        </li>
        <li class="breadcrumb-item active">Gestión</li>
      </ol>

      <!-- Page Content -->
      <h1>Acceso Rápido</h1>
      <hr>
        <p><a href="<?= $base_url ?>/intranet/hermanos/">Hermanos</a></p>
	<p><a href="<?= $base_url ?>/intranet/eventos">Eventos</a></p>
	<p><a href="<?= $base_url ?>/intranet/reuniones">Reuniones</a></p>
	<p><a href="<?= $base_url ?>/intranet/pagos">Pagos</a></p>
	<p><a href="<?= $base_url ?>/intranet/utileria">Utileria</a></p>

    </div>


<?php include('footer.php'); ?>
