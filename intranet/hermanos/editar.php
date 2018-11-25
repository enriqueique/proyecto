<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/hermanos.php"; 
		$hermanos = new Hermanos();
	?>

	<?php if (!isset($_POST['submit'])): ?>

		<?php $editarHermano = $hermanos->edit($_GET['id']); ?>

				<?php include ('../header.php'); ?> 
			
			<div class="container">
				<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/hermanos">Hermanos</a>
            </li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
		      <div class="card mx-auto">
		        <div class="card-header">Editar Hermano</div>
		        <div class="card-body">
		          <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST">
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="<?= $editarHermano[0]['nombre'] ?>">
		                    <label for="firstName">Nombre</label>
		                  </div>
		                </div>
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required" name="apellidos" value="<?= $editarHermano[0]['apellidos'] ?>">
		                    <label for="lastName">Apellidos</label>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="form-group">
		              <div class="form-label-group">
		                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" name="email" value="<?= $editarHermano[0]['email'] ?>">
		                <label for="inputEmail">Correo Electrónico</label>
		              </div>
		            </div>
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password" value="<?= $editarHermano[0]['password'] ?>">
		                    <label for="inputPassword">Contraseña</label>
		                  </div>
		                </div>
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha de nacimiento" required="required" name="fnacimiento" value="<?= $editarHermano[0]['fnacimiento'] ?>">
		                    <label for="inputPassword">Fecha de Nacimiento</label>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="form-group">
					    <label for="exampleFormControlSelect1">Rol</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="rol">
					      <option value="3" <?php if($editarHermano[0]['rol'] == 3) echo "selected"; ?>>Invitado</option>
					      <option value="2" <?php if($editarHermano[0]['rol'] == 2) echo "selected"; ?>>Usuario</option>
					      <option value="1" <?php if($editarHermano[0]['rol'] == 1) echo "selected"; ?>>Administrador</option>
					    </select>
					  </div>
		            <a class="btn btn-secondary" href="javascript:history.back(-1);">Atrás</a>
		            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">  
		          </form>
		        </div>
		      </div>
			</div>
		 <?php include ('../footer.php'); ?>

	<?php else: ?>

		<?php $hermanos->update($_POST, $_GET['id']); ?>
		
	<?php endif ?>
	 

<?php else: ?>

	<?php header("location: index.php"); ?>
	
<?php endif ?>

