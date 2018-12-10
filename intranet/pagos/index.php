<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
  require "clases/pagosHermanos.php"; 
  $allPagos = new PagosHermanos();
?>

<?php if (!isset($_POST['concepto'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $pagos = $allPagos->index(); ?>
      <div id="content-wrapper">

        <div class="container-fluid mb-3">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Pagos</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Todos los Pagos</div>
            <div class="card-body">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Nuevo Pago
              </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Concepto</th>
                      <th>Fecha</th>
		      <th>Importe</th>
		      <th>Pagos</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Concepto</th>
                      <th>Fecha</th>
		      <th>Importe</th>
                      <th>Pagos</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($pagos as $pago): ?>
                        <tr>
                            <td><?= $pago['concepto'] ?></td>
                            <td><?= $pago['fecha'] ?></td>
			    <td>€ <?= $pago['importe'] ?></td>
                            <td>
                              <?php if ($pago['pago'] == 0 ) : ?>
                                <button class="btn btn-danger btn-sm">Sin pagos</button>
                              <?php else: ?>
                                <button class="btn btn-primary btn-sm hermanos" data-id="<?= $pago['id'] ?>"><?= $pago['pago'] ?> pago</button>
                              <?php endif ?>
                            </td>
                            <td>
                              <a href="ver.php?id=<?= $pago['id'] ?>">
                                  <span>ver</span>
                              </a>
                              |
                              <a href="editar.php?id=<?= $pago['id'] ?>">
                                  <span>editar</span>
                              </a>
                              |
                              <a href="eliminar.php?id=<?= $pago['id'] ?>">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="POST" id="agregarPago" class="formulariomodal">
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="concepto" value="" >
                            <label for="firstName">Concepto</label>
                          </div>
                          </div>
                           <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="date" id="firstName" class="form-control" placeholder="Fecha" required="required" autofocus="autofocus" name="fecha" value="" >
                            <label for="firstName">Fecha</label>
                          </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <div class="form-label-group">
                            <input type="double" id="inputPassword" class="form-control" placeholder="Importe" required="required" name="importe" value="" >
                            <label for="inputPassword">Importe</label>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('agregarPago').submit();">Guardar</button>
              </div>
            </div>
          </div>
        </div>
<!-- LLAMAREMOS MEDIANTE AJAX A LOS USUARIOS QUE TIENEN EN LA BASE DE DATOS PARA ESE EVENTO -->
  <?php include ('../footer.php'); ?> 

<?php else: ?>

  <?php $allPagos->add($_POST); ?>

<?php endif ?>

  
