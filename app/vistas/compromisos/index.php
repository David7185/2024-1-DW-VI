<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
    <div class="card">
    
        <div class="card-header">
            <?=$datos['titulo']?>
        </div>
        <div class="card-body">
          <div class="col">
          <a href="<?= RUTA_URL?>medicos/registro" class="btn btn-success link">Agregar Medico</a>
          </div>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#cod</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
             
              <th scope="col">Hora_inicio</th>
              <th scope="col">Hora_salida</th>
              <th scope="col">Telefono</th>
              <th scope="col">Direccion</th>
              <th scope="col">Eps</th>
              <th scope="col">Rol</th>
              <th scope="col">Activo</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($datos['medicos'] as $user): ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->nombreu ?></td>
                            <td><?php echo $user->apellidou ?></td>
                            <td><?php echo $user->correou ?></td>
                            <td><?php echo $user->hora_salida ?></td>
                            <td><?php echo $user->hora_inicio ?></td>
                            <td><?php echo $user->telefono ?></td>
                            <td><?php echo $user->direccion ?></td>
                            <td><?php echo $user->ep_cod ?></td>
                            <td><?php echo $user->id_rol ?></td>
                            <?php if($user->activo){ ?>
                             <td><span class="badge bg-success">Activo</span></td>
                             <?php } ?>
                             <?php if(!$user->activo){ ?>
                             <td><span class="badge bg-danger">Inactivo</span></td>
                             <?php } ?>
                            <td>
                            <a href="<?php echo RUTA_URL;?>medicos/editar/<?php echo $user->id?>" class="btn btn-warning">Editar</a>
                            <?php if(!$user->activo){ ?>
                            <a  href="#"  title="Eliminar registro" data-href="<?=RUTA_URL?>medicos/reingresar/<?=$user->id;?>" class="btn btn-info reingresar">Reingresar</a>
                            <?php } ?>
                            <?php if($user->activo){ ?>
                            <a  href="#"  title="Eliminar registro" data-href="<?=RUTA_URL?>medicos/eliminar/<?=$user->id;?>" class="btn btn-danger eliminar">Eliminar</a>
                            <?php } ?>
                          </td>
                        </tr>
                       
                        <?php endforeach ?>
        
          </tbody>
        </table>
      </div>
        </div>
    </div>
  
  </div>
<footer>
<a href='https://www.freepik.es/vectores/patron'>Vector de Patrón creado por rawpixel.com - www.freepik.es</a>
  Iconos diseñados por <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.es</a></div>
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>