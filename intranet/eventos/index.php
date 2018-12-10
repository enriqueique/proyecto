<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
  require "clases/eventosHermanos.php"; 
  $allEventos = new EventosHermanos();
?>

<?php if (!isset($_POST['nombre'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $eventos = $allEventos->index(); ?>
      <div id="content-wrapper">

        <div class="container-fluid mb-3">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Eventos</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Todos los Eventos</div>
            <div class="card-body">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Nuevo Evento
              </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Fecha</th>
                      <th>Hora</th>
		      <th>Tipo</th>
                      <th>Asistencia</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Fecha</th>
                      <th>Hora</th>
		      <th>Tipo</th>
                      <th>Asistencia</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($eventos as $evento): ?>
                        <tr>
                            <td><?= $evento['nombre'] ?></td>
                            <td><?= $evento['direccion'] ?></td>
                            <td><?= date( "Y-m-d", strtotime( $evento['fecha'] ) ); ?></td>
                            <td><?= date( "H:m", strtotime( $evento['fecha'] ) ); ?></td>
			    <td><?= $evento['tipo'] ?></td>
                            <td>
                              <?php if ($evento['asistencia'] == 0 ) : ?>
                                <button class="btn btn-danger btn-sm">Sin asistencias</button>
                              <?php else: ?>
                                <button class="btn btn-primary btn-sm hermanos" data-id="<?= $evento['id'] ?>"><?= $evento['asistencia'] ?> asistencias</button>
                              <?php endif ?>
                            </td>
                            <td>
                              <a href="ver.php?id=<?= $evento['id'] ?>">
                                  <span>ver</span>
                              </a>
                              |
                              <a href="editar.php?id=<?= $evento['id'] ?>">
                                  <span>editar</span>
                              </a>
                              |
                              <a href="eliminar.php?id=<?= $evento['id'] ?>">
                                  <span>eliminar</span>
                              </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- DataTables Example -->
        </div>

        </div>
        <!-- /.container-fluid -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="POST" id="agregarEvento" class="formulariomodal">
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="nombre" value="" >
                            <label for="firstName">Nombre</label>
                          </div>
                          </div>
                           <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="direccion" value="" >
                            <label for="firstName">Dirección</label>
                          </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-3">
                          <div class="form-label-group">
                            <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="" >
                            <label for="inputPassword">Fecha</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-label-group">
                            <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="" >
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
			   <option>Ensayo Banda</option>	
			   <option>Otro</option>				
			</select>
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Descripción</label>
                        <textarea  class="form-control" name="observaciones" placeholder="Escribe aquí ..." rows="5" value=""></textarea>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarEvento').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>
<!-- LLAMAREMOS MEDIANTE AJAX A LOS USUARIOS QUE TIENEN EN LA BASE DE DATOS PARA ESE EVENTO -->
  <?php include ('../footer.php'); ?> 

<?php else: ?>

  <?php $allEventos->add($_POST); ?>

<?php endif ?>

  
