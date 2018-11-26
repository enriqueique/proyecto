<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/eventosHermanos.php"; 
		$allEvento = new EventosHermanos();
	?>

	<?php if (!isset($_POST['submit'])): ?>

		<?php $evento = $allEvento->edit($_GET['id']); ?>

			<?php include ('../header.php'); ?> 
			
			<div class="container">
				<ol class="breadcrumb">
		            <li class="breadcrumb-item">
		              <a href="<?= $base_url ?>/intranet">Dashboard</a>
		            </li>
		            <li class="breadcrumb-item">
		              <a href="<?= $base_url ?>/intranet/hermanos">Eventos</a>
		            </li>
		            <li class="breadcrumb-item active">Editar</li>
		        </ol>
		        <div class="card mx-auto">
			        <div class="card-header">Editar Evento</div>
			        <div class="card-body">
			          <form action="editar.php?id=<?= $_GET['id'] ?>" method="POST">
			            <div class="form-group">
			              	<div class="form-row">
			                	<div class="col-md-6">
			                  <div class="form-label-group">
			                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="<?= $evento->nombre ?>" >
			                    <label for="firstName">Nombre</label>
			                  </div>
			                	</div>
			                	<div class="col-md-6">
			                  <div class="form-label-group">
			                    <input type="text" id="lastName" class="form-control" placeholder="Dirección" required="required" name="direccion" value="<?= $evento->direccion ?>" >
			                    <label for="lastName">Dirección</label>
			                  </div>
			                	</div>
			              	</div>
		            	</div>
			            <div class="form-group">
			              <div class="form-row">
			                <div class="col-md-6">
			                  <div class="form-label-group">
			                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="<?= date( "Y-m-d", strtotime( $evento->fecha ) ); ?>" >
			                    <label for="inputPassword">Fecha</label>
			                  </div>
			                </div>
			                <div class="col-md-6">
			                  <div class="form-label-group">
			                    <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="<?= date( "H:m", strtotime( $evento->fecha ) ); ?>" >
			                    <label for="inputPassword">Hora</label>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <div class="form-group">
						    <label for="exampleFormControlSelect1">Descripción</label>
						    <textarea  class="form-control" name="observaciones" placeholder="Escribe aquí ..." rows="8" value=""><?= $evento->observaciones ?></textarea>
						</div>
				            <a class="btn btn-secondary" href="javascript:history.back(-1);">Atrás</a>
				            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">  
				      </form>
			        </div>
			    </div>
			</div>

			<?php include ('../footer.php'); ?>

	<?php else: ?>

		<?php $allEvento->update($_POST, $_GET['id']); ?>
		
	<?php endif ?>
	 

<?php else: ?>

	<?php header("location: index.php"); ?>
	
<?php endif ?>

