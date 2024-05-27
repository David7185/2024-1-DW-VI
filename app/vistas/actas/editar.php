<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
<div class="row">
    <div class="col-12">
    <h1 class="h3 mb-3 fw-normal">Editar Medico</h1></div>
    <div class="col-md-6">
    <?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
          <form action="<?php echo RUTA_URL; ?>medicos/editar/<?php echo $datos['id'] ?>" method="POST">
   
    <div class="form-floating mb-3">
      <input type="text" name="nombreu" autofocus class="form-control form-control-sm"value="<?php if(isset($datos['nombreu'])){echo $datos['nombreu'];} ?>"  id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Nombre</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="apellidou" class="form-control form-control-sm" value="<?php if(isset($datos['apellidou'])){echo $datos['apellidou'];} ?>" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Apellido</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="telefono" class="form-control form-control-sm"value="<?php if(isset($datos['telefono'])){echo $datos['telefono'];} ?>"  id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Telefono</label>
    </div>
    <div class="form-group">
     <label>Eps</label>
     <select name="ep_cod" class="form-select">
     <?php foreach($datos['eps'] as $eps): ?>
     <option value="<?php echo $eps->codeps?>"><?php echo $eps->nombre?></option>
         
     <?php endforeach ?>
     </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-floating mb-3">
      <input type="text" name="direccion" class="form-control form-control-sm"value="<?php if(isset($datos['direccion'])){echo $datos['direccion'];} ?>"  id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Direccion</label>
    </div>
    <div class="form-floating mb-3">
      <input type="time" name="hora_inicio" class="form-control" value="<?php if(isset($datos['hora_inicio'])){echo $datos['hora_salida'];} ?>"  id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Hora de inicio</label>
    </div>
    <div class="form-floating mb-3">
      <input type="time" name="hora_salida" class="form-control" value="<?php if(isset($datos['hora_salida'])){echo $datos['hora_salida'];} ?>"  id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Hora salida</label>
    </div>
    
    <button class="w-100 btn btn-lg btn-success" type="submit">Actualizar</button>

    </div>
</form>
    
</div>

 
  </div>
 
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>