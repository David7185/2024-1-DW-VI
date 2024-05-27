<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<main class="form-signin">
<?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
  <form action="<?php echo RUTA_URL;?>auth/iniciarsesion" method="post" >

    <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" name="clave" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <div class="mb-3">

        <a  href="<?= RUTA_URL ?>auth/registrar">Registrarme</a>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>
   
  </form>
</main>
<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>