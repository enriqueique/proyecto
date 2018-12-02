<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/pagos.php"; 
		$pagos = new Pagos();
	?>

	<?php if (!isset($_POST['submit'])): ?>

		<?php $editarPagos = $pagos->edit($_GET['id']); ?>

				<?php include ('../header.php'); ?> 
			
			<div class="container">
				<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/pagos">Pagos</a>
            </li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
		      <div class="card mx-auto">
		        <div class="card-header">Editar Pago</div>
		        <div class="card-body">
		          <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST">
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="concepto" value="<?= $editarPagos[0]['concepto'] ?>">
		                    <label for="firstName">Concepto</label>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="firstName" class="form-control" placeholder="fecha" name="cantidad" value="<?= $editarPagos[0]['fecha'] ?>">
		                    <label for="firstName">Fecha</label>
		                  </div>
		                </div>
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="firstName" class="form-control" placeholder="Importe" required="required" name="estado" value="<?= $editarPagos[0]['importe'] ?>">
		                    <label for="firstName">Importe</label>
		                  </div>
		                </div>
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

		<?php $pagos->update($_POST, $_GET['id']); ?>
		
	<?php endif ?>
	 

<?php else: ?>

	<?php header("location: index.php"); ?>
	
<?php endif ?>