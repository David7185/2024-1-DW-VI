<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
<div class="row">
    <div class="col-12">
    <h1 class="h3 mb-3 fw-normal">Registrar Reunion</h1></div>
    <div class="col-md-6">
    <?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
          <form action="<?php echo RUTA_URL; ?>reuniones/insertar" method="POST">
   
    <div class="form-floating mb-3">
      <input type="date" name="fecha" autofocus class="form-control form-control-sm"value="<?php if(isset($datos['fecha'])){echo $datos['fecha'];} ?>"  id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Fecha</label>
    </div>
    <div class="form-floating mb-3">
      <input type="time" name="hora_inicio" class="form-control" value="<?php if(isset($datos['hora_inicio'])){echo $datos['hora_inicio'];} ?>" id="floatingPassword">
      <label for="floatingPassword">Hora de inicio</label>
    </div>
    <div class="form-floating mb-3">
      <input type="time" name="hora_fin" class="form-control" value="<?php if(isset($datos['hora_fin'])){echo $datos['hora_fin'];} ?>"  id="floatingPassword" >
      <label for="floatingPassword">Hora fin</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="invitados" class="form-control form-control-sm"value="<?php if(isset($datos['invitados'])){echo $datos['invitados'];} ?>"  id="floatingInput" >
      <label for="floatingInput">Invitados</label>
    </div>
      
    <button class="w-100 btn btn-lg btn-success" type="submit">Agregar</button>
    </div>

</form>
    
</div>

 
  </div>
 
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>