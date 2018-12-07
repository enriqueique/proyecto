<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/utileria.php"; 
		$utileria = new Utileria();
	?>

	<?php if (!isset($_POST['submit'])): ?>

		<?php $editarUtileria = $utileria->edit($_GET['id']); ?>

				<?php include ('../header.php'); ?> 
			
			<div class="container">
				<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/utileria">Utileria</a>
            </li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
		      <div class="card mx-auto">
		        <div class="card-header">Editar Útil</div>
		        <div class="card-body">
		          <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST">
		            <div class="form-group">
	              <div class="form-row">
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="firstName" class="form-control" placeholder="nombre" required="required" autofocus="autofocus" name="nombre" value="<?= $editarUtileria[0]['nombre'] ?>">
	                    <label for="firstname">Nombre</label>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="lastName" class="form-control" placeholder="cantidad" required="required" name="cantidad" value="<?= $editarUtileria[0]['cantidad'] ?>">
	                    <label for="lastName">Cantidad</label>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="form-label-group">
	                 <input type="text" id="inputEmail" class="form-control" placeholder="Estado" required="required" name="estado" value="<?= $editarUtileria[0]['estado'] ?>">
	                    <label for="inputEmail">Estado</label>
	              </div>
	            </div>
		            <a class="btn btn-secondary" href="javascript:history.back(-1);">Atrás</a>
		            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">  
		          </form>
		        </div>
		      </div>
			</div>
		 <?php include ('../footer.php'); ?>

	<?php else: ?>

		<?php $utileria->update($_POST, $_GET['id']); ?>
		
	<?php endif ?>
	 

<?php else: ?>

	<?php header("location: index.php"); ?>
	
<?php endif ?>
