<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
    <div class="card">
    
        <div class="card-header">
            <?=$datos['titulo']?>
        </div>
        <div class="card-body">
          <div class="col">
          </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#cod</th>
              <th scope="col">ID Reunión</th>
              <th scope="col">Acontecimientos</th>
              <th scope="col">Contenido</th>
              <th scope="col">Estado</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($datos['actas'] as $acta): ?>
                        <tr>
                            <td><?php echo $acta->id ?></td>
                            <td><?php echo $acta->id_reunion ?></td>
                            <td><?php echo $acta->acontecimientos ?></td>
                            <td><?php echo $acta->contenido ?></td>
                            <?php if($acta->estado){ ?>
                             <td><span class="badge bg-success">Activo</span></td>
                             <?php } ?>
                             <?php if(!$acta->estado){ ?>
                             <td><span class="badge bg-danger">Inactivo</span></td>
                             <?php } ?>
                            <td>
                            <a href="<?php echo RUTA_URL;?>actas/<?php echo $acta->id?>" class="btn btn-info">Ver detalle</a>
                            <a href="<?php echo RUTA_URL;?>actas/editar/<?php echo $acta->id?>" class="btn btn-warning">Editar</a>
                            <a href="#" title="Eliminar registro" data-href="<?=RUTA_URL?>actas/eliminar/<?=$acta->id;?>" class="btn btn-danger eliminar">Eliminar</a>
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
