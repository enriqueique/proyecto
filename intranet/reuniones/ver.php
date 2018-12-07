<?php if (isset($_GET['id'])): ?>

	<?php 
		require "clases/reunionesHermanos.php"; 
		$allReunion = new ReunionesHermanos();
	 ?>


		<?php $reunion = $allReunion->show($_GET['id']); ?>

		<?php include ('../header.php'); ?> 
				
		<div class="container-fluid mb-3">
			<ol class="breadcrumb">
	            <li class="breadcrumb-item">
	              <a href="<?= $base_url ?>/intranet">Panel</a>
	            </li>
	            <li class="breadcrumb-item">
	              <a href="<?= $base_url ?>/intranet/reuniones">Reuniones</a>
	            </li>
	            <li class="breadcrumb-item active">Ver</li>
       		</ol>

			<div class="row">
				<div class="col-md-8">
					<div class="card mx-auto">
				        <div class="card-header"><i class="fa fa-calendar-check-o fa-lg"></i> Detalles de la Reunión</div>
				        <div class="card-body">
				        	<form>
					            <div class="form-group">
					              <div class="form-row">
					                <div class="col-md-6">
					                  <div class="form-label-group">
					                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="<?= $reunion->nombre ?>" readonly>
					                    <label for="firstName">Nombre</label>
					                  </div>
					                </div>
					               <div class="col-md-6">
					                  <div class="form-label-group">
					                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="tipo" value="<?= $reunion->tipo ?>" readonly>
					                    <label for="firstName">Tipo</label>
					                  </div>
					                </div>
					              </div>
					            </div>
					            <div class="form-group">
					              <div class="form-row">
					                <div class="col-md-6">
					                  <div class="form-label-group">
					                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="<?= date( "Y-m-d", strtotime( $reunion->fecha ) ); ?>" readonly>
					                    <label for="inputPassword">Fecha</label>
					                  </div>
					                </div>
					                <div class="col-md-6">
					                  <div class="form-label-group">
					                    <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="<?= date( "H:m", strtotime( $reunion->fecha ) ); ?>" readonly>
					                    <label for="inputPassword">Hora</label>
					                  </div>
					                </div>
					              </div>
					            </div>
					            <div class="form-group">
								    <label for="exampleFormControlSelect1">Descripción</label>
								    <textarea  class="form-control" name="observaciones" placeholder="Escribe aquí ..." rows="8" readonly> <?= $reunion->observaciones ?></textarea>
								</div>
					            <a class="btn btn-secondary" href="index.php">Atrás</a>
					            <a class="btn btn-primary" href="editar.php?id=<?= $reunion->id ?>">Editar</a>  
				        	</form>
				    	</div>
			    	</div>
				</div>

				<div class="col-md-4 disabled">
					<div class="card mx-auto">
				        <div class="card-header d-flex justify-content-between align-items-center">
				        	<span><i class="fa fa-users fa-lg"></i> Asistencia</span> 
				        	</span>
				        </div>
				        <div class="card-body">

							<table class="table">
							  <tbody id="listaHermanos">

							  </tbody>
							</table>
				        	
				    	</div>
			    	</div>
				</div>
			</div>
		    
		</div>

		<!-- SCRIPT PARA LISTAR HERMANOS -->
		<script type="text/javascript">
				var idReunion = <?= $reunion->id ?>;

				$(document).ready(function(){
					$("#addHermanos").click(function(){
						addHermanos(idEvento);
					});
				});

				listaHermanosReunion(idReunion);

				function listaHermanosReunion(reunion) {
		            $.ajax({
		              url: 'listahermanos.php',
		              data:{'reunion': reunion, 'tipo': 'listHermanos' },
		              type: 'POST',
		              dataType : 'json',
		              success: function(res){
		                var lista;
		                if (res.length>0){
			                for (var i = 0; i < res.length; i++) {
			                	
			                	idHermano = '<th>#' + (i+1) + '</th>';
			                	nombre = '<td>' + res[i].nombre + '</td>';
			                	apellidos = '<td>' + res[i].apellidos + '</td>';
			                	eliminar = '<td><button disabled title="Desactivado" type="button" class="close text-danger" onclick="eliminarHermano('+ reunion + ',' + res[i].id +')"><span aria-hidden="true">&times;</span></button>';
			                	openli = '<tr style="border:1px solid rgb(233, 236, 239); border-radius:3px; background:rgb(233, 236, 239)">';
			                	closeli = '</tr>';

			                    lista += openli + idHermano + nombre + apellidos + eliminar + closeli;
			                    
			                }
		                }else{
		                	lista = '<div class="alert alert-info" role="alert">No hay ningun hermano agregado a este evento.</div>';
		                }
		                

		                $('#listaHermanos').html(lista);
		              }

		            });
	          	}

		</script>
		<!-- FIN DEL SCRIPT -->
	 	<?php include ('../footer.php'); ?>

<?php else: ?>

	<?php header("Location: index.php"); ?>
	
<?php endif ?>
