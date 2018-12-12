<?php 
require 'clases/principal.php';
$allEventos = new Principal();
$eventos = $allEventos->eventos();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OnePage</title>

    <!-- Bootstrap core CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        
                <?php if (isset($_SESSION['user'])): ?>

        <a class="navbar-brand" href="eventos.php">Bienvenido <?= $_SESSION['user'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item">
              <a class="nav-link" href="#">Registrarse</a>
            </li>-->
            <?php if($_SESSION['rol'] == 1 ): ?>
            <li class="nav-item">
              <a class="nav-link" href="intranet/">Intranet</a>
            </li>
            <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="login/logout.php">Cerrar Sesión <i class="fa fa-sign-out"></i></a>
            </li>
            <?php else: ?>
 		<a class="navbar-brand" href="eventos.php">Hermandad Sanepita</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         	 <span class="navbar-toggler-icon"></span>
        	</button>
        	<div class="collapse navbar-collapse" id="navbarResponsive">
          		<ul class="navbar-nav ml-auto">
            		<li class="nav-item">
               	 <a class="nav-link" href="login/">Iniciar Sesión <i class="fa fa-sign-in"></i></a>
            	</li>
            	</ul>
              </div>
            <?php endif ?>
            
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white" style="background: url('assets/img/img5.jpg') no-repeat; background-size:cover;background-position: bottom;">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Semana Santa</h1>
          <h2 class="masthead-subheading mb-0">en Sevilla</h2>
          <a href="index.php" class="btn btn-info btn-xl rounded-pill mt-5">Volver</a>
        </div>
      </div>
      <!--
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>-->
    </header>

    <section id="eventos">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 order-lg-2">
            <div class="p-0">
              <img class="img-fluid rounded-circle" src="assets/img/num1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-9 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Eventos</h2>
                <?php if(count($eventos) > 0): ?>
                <table class="table">
                    <thead class="table-dark">
                        <tr><td>Nombre</td>
                        <td>Dirección</td>
                        <td>Fecha</td>
                        <td>Hora</td>
			            <td>Tipo</td>
			            <td>Observaciones</td>
			            <td>Acudir</td>
			        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventos as $evento) { ?>
                        <tr><td><?= $evento["nombre"] ?></td>
                            <td><?= $evento["direccion"] ?></td>
                            <td><?= date( "Y-m-d", strtotime( $evento['fecha'] ) ); ?></td>
                            <td><?= date( "H:m", strtotime( $evento['fecha'] ) ); ?></td>
                            <td><?= $evento['tipo'] ?></td>
                            <td><?= $evento['observaciones'] ?></td>
                               <?php 
                                $usuario = $_SESSION['userId'];
                                $eve = $evento['id'];
                                $confirmar = 'confirmar';
                                $existe = $allEventos->checkEvento($usuario, $evento['id']);
                                ?>
                                <td>
                                    <?php if ($existe != 0 ): ?>
                                        <button class="btn btn-secondary">Confirmado</button>
                                    <?php else: ?>
                                        <a class="btn btn-primary" href="eventos.php?asistencia=<?= $usuario.'&eve='.$eve.'&confirmar='.$confirmar ?>">Confirmar</a>
                                    <?php endif ?>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="table-dark">
                        <tr><td>Nombre</td>
                        <td>Dirección</td>
                        <td>Fecha</td>
                        <td>Hora</td>
			            <td>Tipo</td>
			            <td>Observaciones</td>
			            <td>Acudir</td>
			</tr>
                    </tfoot>
                </table>
                 <?php else: ?>
                <div class="alert alert-info" role="alert">
                  <strong>Lo siento.</strong> No hay Eventos disponibles en ese momento.
                </div>
              <?php endif ?>
                <a href="index.php" class="btn btn-info btn-xl rounded-pill mt-5">Atrás</a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Sanepita</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/vendor/jquery/jquery.min.js"></script>
    <script src="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php if(isset($_GET['confirmar'])): ?>
    
    <?php  $allEventos->eventos($_GET);  ?>
    
    <script>
        window.location.href = "eventos.php";
    </script>

<?php endif ?>
