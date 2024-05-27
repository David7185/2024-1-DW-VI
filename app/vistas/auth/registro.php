<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<main class="form-signin">
<?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
  <form action="<?php echo RUTA_URL; ?>auth/insertar" method="POST">
   
    <h1 class="h3 mb-3 fw-normal">Crear una cuenta</h1>

    <div class="form-floating mb-3">
      <input type="text" name="nombres" autofocus class="form-control form-control-sm"value="<?php if(isset($datos['nombres'])){echo $datos['nombres'];} ?>"  id="floatingInput" placeholder="Ingresar nombres">
      <label for="floatingInput">Nombre</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="apellidos" class="form-control form-control-sm" value="<?php if(isset($datos['apellidos'])){echo $datos['apellidos'];} ?>" id="floatingInput" placeholder="Ingresar apellids">
      <label for="floatingInput">Apellido</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control form-control-sm"value="<?php if(isset($datos['email'])){echo $datos['email'];} ?>"  id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-group mb-3">
     <label>Rol</label>
     <select name="rol" class="form-select">
            <option value="principal">Principal</option>
            <option value="asistente">Asistente</option>
     </select>
    </div>
    
    <div class="form-floating mb-3">
      <input type="password" name="clave"class="form-control form-control-sm"  id="floatingPassword" placeholder="Ingresar clave">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="clave2" class="form-control"  id="floatingPassword2" placeholder="Repetir clave">
      <label for="floatingPassword2">Repite Contraseña</label>
    </div>

    <div class="mb-3">

        <a  href="<?= RUTA_URL ?>auth/login">Iniciar Sesion</a>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
  
   
  </form>
</main>
 
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>