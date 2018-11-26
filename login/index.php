<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <?php if (!isset($_SESSION['user'])): ?>

      <body style="background-image: url('https://www.w3schools.com/howto/img_parallax.jpg'); height: 500px;background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">

        <div class="container">
          <div class="card card-login mx-auto mt-5" >
            <div class="card-header">Iniciar Sesión</div>
            <div class="card-body">

              <?php if (isset($_POST['submit'])): ?>

                <?php 
                  require "clases/login.php"; 
                  $login = new Login();
                  $error = $login->startLogin($_POST);
                ?>
                <div class="alert alert-danger">
                  <strong>Algo ha salido Mal</strong> <?= $error ?>
                </div>

              <?php endif ?>
              <form action="index.php" method="POST">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="email">
                    <label for="inputEmail">Correo Electrónico</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                    <label for="inputPassword">Contraseña</label>
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
              </form>
              <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Registrar una Cuenta</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

      </body>
  <?php else: ?>

    <?php header("Location: ../intranet") ?>
    
  <?php endif ?>

</html>
