<?php 
  require "clases/pagos.php"; 
  $pago = new Pagos();
?>

<?php if (!isset($_POST['concepto'])): ?>

  <?php include ('../header.php'); ?> 
      <?php $pagosdatos = $pago->index(); ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Pagos</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Registro de Pagos</div>
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
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Concepto</th>
                      <th>Fecha</th>
                      <th>Importe</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($pagosdatos as $pago): ?>
                        <tr>
                            <td><?= $pago['concepto'] ?></td>
                            <td><?= $pago['fecha'] ?></td>
                            <td><?= $pago['importe'] ?></td>
                            
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
                      <form action="index.php" method="POST" id="agregarPago">
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="firstName" class="form-control" placeholder="Ingresa Concepto" required="required" autofocus="autofocus" name="concepto">
                                <label for="firstName">Concepto</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="date" id="lastName" class="form-control" placeholder="Ingresa Fecha" name="fecha">
                                <label for="lastName">Fecha</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-label-group">
                             <input type="double" id="lastName" class="form-control" placeholder="Ingresa Importe" required="required" name="importe">
                                <label for="lastName">Importe</label>
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

  <?php include ('../footer.php'); ?> 

<?php else: ?>
          
  <?php $pago->add($_POST); ?>

<?php endif ?>

  
