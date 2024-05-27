<?php  require RUTA_APP .'/vistas/plantilla/header.php'?>
<div class="container">
<?php  require RUTA_APP .'/vistas/layouts/navbar.php'?>
    <div class="card">
    
        <div class="card-header">
            <?=$datos['titulo']?>
        </div>
        <div class="card-body">
         <h3>Bienvenido <?=  $_SESSION['tipo_usuario']?></h3>
        </div>
    </div>
  
  </div>

<?php  require RUTA_APP .'/vistas/plantilla/footer.php'?>