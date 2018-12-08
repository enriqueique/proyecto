
<?php 
  require "clases/utileria.php"; 
  $utileria = new Utileria();
?>

<?php if (!isset($_POST['nombre'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $utileriadatos = $utileria->index(); ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Utilería</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Registro de Útiles</div>
            <div class="card-body">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Nuevo Útil
              </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Estado</th>
                      <th>Fecha de Entrada</th>
		      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Estado</th>
                      <th>Fecha de Entrada</th>
    		      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($utileriadatos as $utileria): ?>
                        <tr>
                            <td><?= $utileria['nombre'] ?></td>
                            <td><?= $utileria['cantidad'] ?></td>
                            <td><?= $utileria['estado'] ?></td>
                            <td><?= $utileria['fentrada'] ?></td>
                            <td>
                              <a href="ver.php?id=<?= $utileria['id'] ?>">
                                  <span>ver</span>
                              </a>
                              |
                              <a href="editar.php?id=<?= $utileria['id'] ?>">
                                  <span>editar</span>
                              </a>
                              |
                              <a href="eliminar.php?id=<?= $utileria['id'] ?>">
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
        </div>
        <!-- /.container-fluid -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Útil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <form action="index.php" method="POST" id="agregarUtil">
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="firstName" class="form-control" placeholder="Ingresa nombre" required="required" autofocus="autofocus" name="nombre">
                                <label for="firstName">Nombre</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="lastName" class="form-control" placeholder="Ingresa Cantidad" name="cantidad">
                                <label for="cantidad">Cantidad</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-label-group">
                             <!-- <input type="text" id="lastName" class="form-control" placeholder="Ingresa Estado" name="estado">
                                <label for="estado">Estado</label> -->
				<select id="sel1" class="form-control" placeholder="Estado" required="required" name="estado">
			   <option>-- Seleccione Estado --</option>
			   <option>Buen Estado</option>
			   <option>En Mantenimiento</option>
			   <option>En Revisión</option>
			   <option>En Reparación</option>					
			</select>
                              </div>
                            </div>
			<div class="col-md-6">
                              <div class="form-label-group">
                                <input type="date" id="lastName" class="form-control" placeholder="Ingresa Fecha" name="fentrada">
                                <label for="lastName">Fecha de Ingreso</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarUtil').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>

  <?php include ('../footer.php'); ?> 

<?php else: ?>
          
  <?php $utileria->add($_POST); ?>

<?php endif ?>

  
