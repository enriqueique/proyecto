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

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= $base_url ?>/intranet">Panel</a>
            </li>
            <li class="breadcrumb-item active">Eventos</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
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
                            <td>
                              <?php if ($evento['asistencia'] == 0 ) : ?>
                                <span class="badge badge-danger">Sin asistencias</span>
                              <?php else: ?>
                                <span class="badge badge-primary hermanos" data-id="<?= $evento['id'] ?>"><?= $evento['asistencia'] ?> asistencias</span>
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

              <!-- TABLA HERMANOS AJAX -->
              <div id="tablahermanos">
                <hr>
                <h2>Hermanos que asistirán</h2>
                <table class="table table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Correo Electrónico</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="mostrarhermanos">
                  </tbody>
                </table>
              </div>

              <!-- FIN DE TABLAS AJAX -->
            </div>
          </div>
        </div>
        <script type="text/javascript">
          $('#tablahermanos').hide();
          $('.hermanos').on('click', function(){
              var evento = $(this).data('id');
              tabla(evento);
              $('#tablahermanos').show();
          });

          /*  $(function(){
            tabla();
          });  */


          function tabla(evento) {
            $.ajax({
              url: 'listahermanos.php',
              data:{'evento': evento },
              type: 'POST',
              success: function(res){
                var js = JSON.parse(res);
                var tabla;
                for (var i = 0; i < js.length; i++) {

                    tabla += '<tr><th scope="row">'+js[i].id+'</td><td>'+js[i].nombre+'</td><td>'+js[i].apellidos+'</td><td>'+js[i].email+'</td><td><a href="#"><span>eliminar</span></a></td><tr>';
                    
                }

                $('#mostrarhermanos').html(tabla);
              }

              });
          }

        </script>

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
                            <input type="text" id="lastName" class="form-control" placeholder="Dirección" required="required" name="direccion" value="" >
                            <label for="lastName">Dirección</label>
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

  
