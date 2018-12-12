<?php session_start(); ?>
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

        <a class="navbar-brand" href="index.php">Bienvenido <?= $_SESSION['user'] ?></a>
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
 		    <a class="navbar-brand" href="#">Hermandad Sanepita</a>
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
          <a href="#eventos" class="btn btn-info btn-xl rounded-pill mt-5">Acciones</a>
        </div>
      </div>
    </header>

    <section id="eventos">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="assets/img/num1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Eventos</h2>
              <p>¿Harto de acudir al tablón de anuncios? Toda la información necesaria plasmada telemáticamente. En la palma de la mano y al momento disponible toda la información necesaria de los eventos organizados por la Hermandad, entra y ¡apúntate!</p>
                <a href="eventos.php" class="btn btn-info btn-xl rounded-pill mt-5">Ver Eventos</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="assets/img/num2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">Reuniones</h2>
              <p>¿El último en enterarte de todo? Aquí dispones de toda la información necesaria sobre las reuniones del equipo de gobierno, con las conclusiones de todas las actas de cada una de ellas sin la necesidad de tener que desplazarte.</p>
                <a href="reuniones.php" class="btn btn-info btn-xl rounded-pill mt-5">Ver Reuniones</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="assets/img/num3.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Pagos</h2>
              <p>¿Harto de tener que acudir a la sede para cumplir con los pagos anuales, que te inviten a merendar para que te cuenten la campaña de donaciones? Pues, vas a tener que seguir haciéndolo, de momento no hemos conseguido que se realicen telemáticamente, pero podrás acceder a los pagos que hayas realizado y comprobar que dinero va a donde.</p>
                <a href="pagos.php" class="btn btn-info btn-xl rounded-pill mt-5">Ver Pagos</a>
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
