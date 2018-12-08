<?php if (isset($_GET['id'])): ?>
	<?php 
		require "clases/eventosHermanos.php"; 
		$allEvento = new EventosHermanos();
	?>

	<?php if (!isset($_POST['submit'])): ?>

		<?php $evento = $allEvento->edit($_GET['id']); ?>

		<?php include ('../header.php'); ?> 
			
		<div class="container-fluid mb-3">
			<ol class="breadcrumb">
	            <li class="breadcrumb-item">
	              <a href="<?= $base_url ?>/intranet">Panel</a>
	            </li>
	            <li class="breadcrumb-item">
	              <a href="<?= $base_url ?>/intranet/eventos">Eventos</a>
	            </li>
	            <li class="breadcrumb-item active">Editar</li>
	        </ol>

			<div class="row">
				<div class="col-md-8">
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
				                <div class="col-md-3">
				                  <div class="form-label-group">
				                    <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="<?= date( "Y-m-d", strtotime( $evento->fecha ) ); ?>" >
				                    <label for="inputPassword">Fecha</label>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-label-group">
				                    <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="<?= date( "H:m", strtotime( $evento->fecha ) ); ?>" >
				                    <label for="inputPassword">Hora</label>
				                  </div>
				                </div>
						<div class="col-md-6">
					                  <div class="form-label-group">
					                    <select id="inputEmail" class="form-control" placeholder="Tipo" required="required" name="tipo">
			   <option>Semana Santa</option>
			   <option>Reunión Informativa</option>
			   <option>Convivencia</option>
			   <option>Conferencia</option>
			   <option>Procesión</option>
			   <option>Asuntos Internos</option>
			   <option>Ensayos Banda</option>
			   <option>Otro</option>					
			</select>
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
				<div class="col-md-4">
					<div class="card mx-auto">
				        <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fa fa-users fa-lg"></i> Asistencia</span> <button class="btn btn-primary btn-sm" data-toggle="modal" id="addHermanos" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Añadir</span></div>
				        <div class="card-body">

							<table class="table table-hover">
							  <tbody id="listaHermanos">
							   
							  </tbody>
							</table>
				        	
				    	</div>
			    	</div>
				</div>
			</div>

		</div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Añadir Hermanos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" class="formulariomodal" id="agregarHermanosForm">
                	<table class="table table-hover">
					  <tbody id="agregarHermanos">
					   
					  </tbody>
					</table>
					
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarHermanosForm').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>

		<!-- SCRIPT PARA LISTAR HERMANOS -->
		<script type="text/javascript">
				var idEvento = <?= $evento->id ?>;

				$(document).ready(function(){
					$("#addHermanos").click(function(){
						addHermanos(idEvento);
					});
				});

				listaHermanosEvento(idEvento);

				function addHermanos(evento) {
		            $.ajax({
		              url: 'listahermanos.php',
		              data:{'evento': evento, 'tipo': 'addHermanos' },
		              type: 'POST',
		              dataType : 'json',
		              success: function(res){
		                var lista;
		                if (res.length>0){
			                for (var i = 0; i < res.length; i++) {

			                	idHermano = '<th>#' + (i+1) + '</th>';
			                	nombre = '<td>' + res[i].nombre + '</td>';
			                	apellidos = '<td>' + res[i].apellidos + '</td>';
			                	check = '<td><input type="checkbox" id="customCheck'+ res[i].id +'" name="addAsistencia[]" value="'+ res[i].id +'"></td>';
			                	openli = '<tr for="customCheck'+ res[i].id +'">';
			                	closeli = '</tr>';

			                    lista += openli + idHermano + nombre + apellidos + check + closeli;
			                    
			                }
		                }else{
		                	lista = '<div class="alert alert-info" role="alert">No hay hermanos disponibles ...</div>';
		                }
		                

		                $('#agregarHermanos').html(lista);
		              }

		            });
	          	}

				function listaHermanosEvento(evento) {
		            $.ajax({
		              url: 'listahermanos.php',
		              data:{'evento': evento, 'tipo': 'listHermanos' },
		              type: 'POST',
		              dataType : 'json',
		              success: function(res){
		                var lista;
		                if (res.length>0){
			                for (var i = 0; i < res.length; i++) {
			                	
			                	idHermano = '<th>#' + (i+1) + '</th>';
			                	nombre = '<td>' + res[i].nombre + '</td>';
			                	apellidos = '<td>' + res[i].apellidos + '</td>';
			                	eliminar = '<td><button title="Eliminar" type="button" class="close text-danger" onclick="eliminarHermano('+ evento + ',' + res[i].id +')"><span aria-hidden="true">&times;</span></button>';
			                	openli = '<tr>';
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

	          	function eliminarHermano(evento,hermano) {
		            var confirmacion = confirm("Estas Seguro que quieres eliminar a ese Hermano?");
		            	if( confirmacion == true ){
			                $.ajax({
				                url: 'listahermanos.php',
				                data:{'evento': evento, 'hermano': hermano},
				                type: 'POST',
				                success: function(){
				                    listaHermanosEvento(evento);
				                }

		                	});

		            	}else{
		                	alert("Has cancelado la confirmacion");
		             	}      
	        	}

		</script>
		<!-- FIN DEL SCRIPT -->

		<?php include ('../footer.php'); ?>		
	
		<?php if (isset($_POST['addAsistencia'])): ?>

			<?php $allEvento->addHermanos($_GET['id'], $_POST);?>
			
		<?php endif ?>

	<?php else: ?>

		<?php $allEvento->update($_POST, $_GET['id']); ?>

	<?php endif ?>	 

<?php else: ?>

	<?php header("location: index.php"); ?>
	
<?php endif ?>

