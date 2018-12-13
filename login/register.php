<?php session_start(); ?>
<?php if (!isset($_SESSION['user'])): ?>
    <!DOCTYPE html>
    <html lang="en">

      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Register</title>

        <!-- Bootstrap core CSS-->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

      </head>

      <body class="bg-dark">

        <div class="container">
          <div class="card card-register mx-auto mt-5">
            <div class="card-header">Registrar una Cuenta</div>
            <div class="card-body">
                  <?php if (isset($_POST['nombre'])): ?>  
                    <?php 
                      require "clases/login.php"; 
                      $login = new Login();
                      $error = $login->register($_POST);
                    ?>
                    <div class="alert alert-danger">
                      <strong><?= $error ?></strong>
                    </div>

                  <?php endif ?>
                  <form action="../login/register.php" method="POST" id="agregarHermano">
                            <div class="form-group">
                              <div class="form-row">
                                <div class="col-md-6">
                                  <div class="form-label-group">
                                    <input type="text" id="firstName" class="form-control" placeholder="Ingresa nombre" required="required" autofocus="autofocus" name="nombre">
                                    <label for="firstName">Nombre</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-label-group">
                                    <input type="text" id="lastName" class="form-control" placeholder="Ingresa Apellidos" name="apellidos">
                                    <label for="lastName">Apellidos</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Ingresa correo electrónico" required="required" name="email">
                                <label for="inputEmail">Correo Electrónico</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-row">
                                <div class="col-md-6">
                                  <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required" name="password">
                                    <label for="inputPassword">Contraseña</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-label-group">
                                    <input type="date" id="confirmPassword" class="form-control" placeholder="Fecha de Nacimiento" required="required" name="fnacimiento">
                                    <label for="confirmPassword">Fecha de Nacimiento</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
              <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarHermano').submit();">Guardar</button>
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

    </html>


<?php else: ?>

  <?php header("Location: ../") ?>

<?php endif ?>