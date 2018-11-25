<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/utileria.php"; 
		$utileria = new Utileria();
		$verutileria = $utileria->edit($_GET['id']);
	?>

	<?php include ('../header.php'); ?> 
				
		<div class="container">

			<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/utileria">Utileria</a>
            </li>
            <li class="breadcrumb-item active">ver</li>
          </ol>
	      <div class="card mx-auto">
	        <div class="card-header">Ver Útil</div>
	        <div class="card-body">
	          <form>
	            <div class="form-group">
	              <div class="form-row">
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="firstName" class="form-control" placeholder="nombre" required="required" autofocus="autofocus" name="nombre" value="<?= $verutileria[0]['nombre'] ?>" readonly>
	                    <label for="firstname">Nombre</label>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="lastName" class="form-control" placeholder="cantidad" required="required" name="cantidad" value="<?= $verutileria[0]['cantidad'] ?>" readonly>
	                    <label for="lastName">Cantidad</label>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="form-label-group">
	                 <input type="text" id="inputEmail" class="form-control" placeholder="Estado" required="required" name="estado" value="<?= $verutileria[0]['estado'] ?>" readonly>
	                    <label for="inputEmail">Estado</label>
	              </div>
	            </div>
	            <a class="btn btn-secondary" href="index.php">Atrás</a>
	            <a class="btn btn-primary" href="editar.php?id=<?= $verutileria[0]['id'] ?>">Editar</a>  
	          </form>
	        </div>
	      </div>
		</div>

	 <?php include ('../footer.php'); ?>

<?php else: ?>

	<?php header("Location: index.php"); ?>
	
<?php endif ?>