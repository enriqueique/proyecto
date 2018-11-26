<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/hermanos.php"; 
		$hermanos = new Hermanos();
		$verHermano = $hermanos->edit($_GET['id']);
	?>

	<?php include ('../header.php'); ?> 
				
		<div class="container">

			<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/hermanos">Hermanos</a>
            </li>
            <li class="breadcrumb-item active">ver</li>
          </ol>
	      <div class="card mx-auto">
	        <div class="card-header">Ver Hermano</div>
	        <div class="card-body">
	          <form>
	            <div class="form-group">
	              <div class="form-row">
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="<?= $verHermano[0]['nombre'] ?>" readonly>
	                    <label for="firstName">Nombre</label>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required" name="apellidos" value="<?= $verHermano[0]['apellidos'] ?>" readonly>
	                    <label for="lastName">Apellidos</label>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="form-label-group">
	                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" name="email" value="<?= $verHermano[0]['email'] ?>" readonly>
	                <label for="inputEmail">Correo Electrónico</label>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="form-row">
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password" value="<?= $verHermano[0]['password'] ?>" readonly>
	                    <label for="inputPassword">Contraseña</label>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha de nacimiento" required="required" name="fnacimiento" value="<?= $verHermano[0]['fnacimiento'] ?>" readonly>
	                    <label for="inputPassword">Fecha de Nacimiento</label>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
				    <label for="exampleFormControlSelect1">Rol</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="rol" readonly>
				      <option value="3" <?php if($editarHermano[0]['rol'] == 3) echo "selected"; ?>>Invitado</option>
				      <option value="2" <?php if($editarHermano[0]['rol'] == 2) echo "selected"; ?>>Usuario</option>
				      <option value="1" <?php if($editarHermano[0]['rol'] == 1) echo "selected"; ?>>Administrador</option>
				    </select>
				</div>
	            <a class="btn btn-secondary" href="index.php">Atrás</a>
	            <a class="btn btn-primary" href="editar.php?id=<?= $verHermano[0]['id'] ?>">Editar</a>  
	          </form>
	        </div>
	      </div>
		</div>

	 <?php include ('../footer.php'); ?>

<?php else: ?>

	<?php header("Location: index.php"); ?>
	
<?php endif ?>
