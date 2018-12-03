<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
  require "clases/reunionesHermanos.php"; 
  $allReuniones = new ReunionesHermanos();
?>

<?php if (!isset($_POST['nombre'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $reuniones = $allReuniones->index(); ?>
      <div id="content-wrapper">

        <div class="container-fluid mb-3">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Reuniones</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Todos los Reuniones</div>
            <div class="card-body">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Nueva Reunion
              </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
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
                      <th>Fecha</th>
                      <th>Hora</th>
		      <th>Tipo</th>
                      <th>Asistencia</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($reuniones as $reunion): ?>
                        <tr>
                            <td><?= $reunion['nombre'] ?></td>
                            <td><?= date( "Y-m-d", strtotime( $reunion['fecha'] ) ); ?></td>
                            <td><?= date( "H:m", strtotime( $reunion['fecha'] ) ); ?></td>
			    <td><?= $reunion['tipo'] ?></td>
                            <td>
                              <?php if ($reunion['asistencia'] == 0 ) : ?>
                                <button class="btn btn-danger btn-sm">Sin asistencias</button>
                              <?php else: ?>
                                <button class="btn btn-primary btn-sm hermanos" data-id="<?= $reunion['id'] ?>"><?= $reunion['asistencia'] ?> asistencias</button>
                              <?php endif ?>
                            </td>
                            <td>
                              <a href="ver.php?id=<?= $reunion['id'] ?>">
                                  <span>ver</span>
                              </a>
                              |
                              <a href="editar.php?id=<?= $reunion['id'] ?>">
                                  <span>editar</span>
                              </a>
                              |
                              <a href="eliminar.php?id=<?= $reunion['id'] ?>">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Nueva Reunion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="POST" id="agregarReunion" class="formulariomodal">
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
                            <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="tipo" value="" >
                            <label for="firstName">Tipo</label>
                          </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="date" id="inputPassword" class="form-control" placeholder="Fecha" required="required" name="fecha" value="" >
                            <label for="inputPassword">Fecha</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="time" id="inputPassword" class="form-control" placeholder="Hora" required="required" name="hora" value="" >
                            <label for="inputPassword">Hora</label>
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
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarReunion').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>
<!-- LLAMAREMOS MEDIANTE AJAX A LOS USUARIOS QUE TIENEN EN LA BASE DE DATOS PARA ESE EVENTO -->
  <?php include ('../footer.php'); ?> 

<?php else: ?>

  <?php $allReuniones->add($_POST); ?>

<?php endif ?>

  
