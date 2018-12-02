<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/pagos.php"; 
		$pagos = new Pagos();
		$verPagos = $pagos->edit($_GET['id']);
	?>

	<?php include ('../header.php'); ?> 
				
		<div class="container">

			<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/hermanos">Pagos</a>
            </li>
            <li class="breadcrumb-item active">ver</li>
          </ol>
	      <div class="card mx-auto">
	        <div class="card-header">Ver Pago</div>
	        <div class="card-body">
	          <form>
	            <div class="form-group">
	              <div class="form-row">
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="concepto" value="<?= $verPago[0]['concepto'] ?>" readonly>
	                    <label for="firstName">Concepto</label>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-label-group">
	                    <input type="date" id="inputPassword" class="form-control" placeholder="fecha" required="required" name="fecha" value="<?= $verPago[0]['fecha'] ?>" readonly>
	                    <label for="inputPassword">Fecha</label>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="form-label-group">
	                <input type="date" id="inputPassword" class="form-control" placeholder="importe" required="required" name="importe" value="<?= $verPago[0]['importe'] ?>" readonly>
	                    <label for="inputPassword">Importe</label>
	              </div>
	            </div>
                  
	            <a class="btn btn-secondary" href="index.php">Atrás</a>
	            <a class="btn btn-primary" href="editar.php?id=<?= $verPago[0]['id'] ?>">Editar</a>  
	          </form>
	        </div>
	      </div>
		</div>

	 <?php include ('../footer.php'); ?>

<?php else: ?>

	<?php header("Location: index.php"); ?>
	
<?php endif ?>