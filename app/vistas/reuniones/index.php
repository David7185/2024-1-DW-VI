<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
    <div class="card">
    
        <div class="card-header">
            <?=$datos['titulo']?>
        </div>
        <div class="card-body">
          <div class="col">
          <a href="<?= RUTA_URL?>reuniones/registro" class="btn btn-success link">Agregar Reunion</a>
          </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#cod</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora inicio</th>
              <th scope="col">Hora fin</th>
              <th scope="col">Dia</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($datos['reuniones'] as $reunion): ?>
                        <tr>
                            <td><?php echo $reunion->id ?></td>
                            <td><?php echo $reunion->fecha ?></td>
                            <td><?php echo $reunion->hora_inicio ?></td>
                            <td><?php echo $reunion->hora_fin ?></td>
                            <td><?php echo $reunion->dia ?></td>
                            <td>
                            <a href="<?php echo RUTA_URL;?>actas/<?php echo $reunion->id?>" class="btn btn-info">Ver detalle</a>
                            <a href="<?php echo RUTA_URL;?>reuniones/editar/<?php echo $reunion->id?>" class="btn btn-warning">Editar</a>
                            <a  href="#"  title="Eliminar registro" data-href="<?=RUTA_URL?>reuniones/eliminar/<?=$reunion->id;?>" class="btn btn-danger eliminar">Eliminar</a>
                          </td>
                        </tr>
                       
                        <?php endforeach ?>
        
          </tbody>
        </table>
      </div>
        </div>
    </div>
  
  </div>

<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>