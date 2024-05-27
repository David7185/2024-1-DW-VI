<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
<div class="row">
    <div class="col-12">
    <h1 class="h3 mb-3 fw-normal">Actas de reunion</h1>
    </div>
    <div class="col-md-9">
        <div class="col">
          <a href="<?= RUTA_URL?>actas/registro/<?php echo $datos['reunion']->id?>" class="btn btn-success link">Agregar Acta</a>
          </div>
    </div>

    <div class="col-md-3">
    <h1 class="h3 mb-3 fw-normal"><?php echo $datos['titulo'] ?></h1>
    <?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
          <form action="<?php echo RUTA_URL; ?>reuniones/editar/<?php echo $datos['reunion']->id ?>" method="POST">
   
          <div class="form-floating mb-3">
            <input type="text" disabled name="fecha" autofocus class="form-control form-control-sm"value="<?php if(isset($datos['reunion']->fecha)){echo $datos['reunion']->fecha;} ?>"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Fecha</label>
          </div>
          <div class="form-floating mb-3">
            <input type="time"disabled name="hora_inicio" class="form-control" value="<?php if(isset($datos['reunion']->hora_inicio)){echo $datos['reunion']->hora_inicio;} ?>" id="floatingPassword">
            <label for="floatingPassword">Hora de inicio</label>
          </div>
          <div class="form-floating mb-3">
            <input type="time" disabled name="hora_fin" class="form-control" value="<?php if(isset($datos['reunion']->hora_fin)){echo $datos['reunion']->hora_fin;} ?>"  id="floatingPassword" >
            <label for="floatingPassword">Hora fin</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" disabled name="invitados" class="form-control form-control-sm"value="<?php if(isset($datos['reunion']->invitados)){echo $datos['reunion']->invitados;} ?>"  id="floatingInput" >
            <label for="floatingInput">Invitados</label>
          </div>

          
  
    <!-- <button class="w-100 btn btn-lg btn-success" type="submit">Actualizar</button> -->
    </div>
  
    

    
</form>
    
</div>

 
  </div>
 
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>