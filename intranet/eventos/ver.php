<?php if (isset($_GET['id'])): ?>
	<?php 
  		require "clases/eventosHermanos.php"; 
		$allEvento = new EventosHermanos();
		$evento = $allEvento->show($_GET['id']);
	?>

	<?php include ('../header.php'); ?> 
				
		<div class="container">
			<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet/hermanos">Eventos</a>
            </li>
            <li class="breadcrumb-item active">ver</li>
       		</ol>
		    <div class="card mx-auto">
		        <div class="card-header">Detalles del Evento</div>
		        <div class="card-body">
		          <form>
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="<?= $evento->nombre ?>" readonly>
		                    <label for="firstName">Nombre</label>
		                  </div>
		                </div>
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="text" id="lastName" class="form-control" placeholder="Dirección" required="required" name="direccion" value="<?= $evento->direccion ?>" readonly>
		                    <label for="lastName">Dirección</label>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="form-group">
		              <div class="form-row">
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="<?= date( "Y-m-d", strtotime( $evento->fecha ) ); ?>" readonly>
		                    <label for="inputPassword">Fecha</label>
		                  </div>
		                </div>
		                <div class="col-md-6">
		                  <div class="form-label-group">
		                    <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="<?= date( "H:m", strtotime( $evento->fecha ) ); ?>" readonly>
		                    <label for="inputPassword">Hora</label>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="form-group">
					    <label for="exampleFormControlSelect1">Descripción</label>
					    <textarea  class="form-control" name="observaciones" placeholder="Escribe aquí ..." rows="8" readonly> <?= $evento->observaciones ?></textarea>
					</div>
		            <a class="btn btn-secondary" href="index.php">Atrás</a>
		            <a class="btn btn-primary" href="editar.php?id=<?= $evento->id ?>">Editar</a>  
		          </form>
		    </div>
	      </div>
		</div>

	 <?php include ('../footer.php'); ?>

<?php else: ?>

	<?php header("Location: index.php"); ?>
	
<?php endif ?>
