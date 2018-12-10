
<?php 
  require "clases/hermanos.php"; 
  $hermanos = new Hermanos();
?>

<?php if (!isset($_POST['nombre'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $hermanosdatos = $hermanos->index(); ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Hermanos</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Registro de Hermanos</div>
            <div class="card-body">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Nuevo Hermano
              </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th> Correo Electrónico</th>
                      <th>F.Nacimiento</th>
                      <th>F.Inscripción</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th> Correo Electrónico</th>
                      <th>F.Nacimiento</th>
                      <th>F.Inscripción</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($hermanosdatos as $hermano): ?>
                        <tr>
                            <td><?= $hermano['nombre'] ?></td>
                            <td><?= $hermano['apellidos'] ?></td>
                            <td><?= $hermano['email'] ?></td>
                            <td><?= $hermano['fnacimiento'] ?></td>
                            <td><?= $hermano['finscripcion'] ?></td>
                            <td>
                              <?php
                                  if($hermano['rol'] == 3) echo "<span class='badge badge-primary'>Invitado</span>";
                                  if($hermano['rol'] == 2) echo "<span class='badge badge-warning'>Usuario</span>";
                                  if($hermano['rol'] == 1) echo "<span class='badge badge-danger'>Admin</span>";
                              ?>
                              
                            </td>
                            <td>
                              <a href="ver.php?id=<?= $hermano['id'] ?>">
                                  <span>ver</span>
                              </a>
                              |
                              <a href="editar.php?id=<?= $hermano['id'] ?>">
                                  <span>editar</span>
                              </a>
                              |
                              <a href="eliminar.php?id=<?= $hermano['id'] ?>">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Hermano</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <form action="index.php" method="POST" id="agregarHermano">
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
                                <input type="text" id="lastName" class="form-control" placeholder="Ingresa Apellidos" name="apellidos">
                                <label for="lastName">Apellidos</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Ingresa correo electrónico" required="required" name="email">
                            <label for="inputEmail">Correo Electrónico</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required" name="password">
                                <label for="inputPassword">Contraseña</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="date" id="confirmPassword" class="form-control" placeholder="Fecha de Nacimiento" required="required" name="fnacimiento">
                                <label for="confirmPassword">Fecha de Nacimiento</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarHermano').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>

  <?php include ('../footer.php'); ?> 

<?php else: ?>

  <?php $hermanos->add($_POST); ?>

<?php endif ?>

  
