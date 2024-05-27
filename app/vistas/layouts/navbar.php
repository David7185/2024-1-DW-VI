<header class="d-flex justify-content-center py-3">
  <div class="nav-item">
    <h5 class="title"> 
      <?php echo $_SESSION['nombres']; ?>
    </h5>
  </div>
  <ul class="nav nav-pills">
    <!-- RUTAS DE USUARIO PARA MEDICOS -->
    <?php if ($_SESSION['tipo_usuario'] != 1) { ?>
      <li class="nav-item"><a href="<?= RUTA_URL ?>reuniones" class="nav-link" aria-current="page">Reuniones</a></li>
    <?php } ?>
    <?php if ($_SESSION['tipo_usuario'] != 1) { ?>
      <li class="nav-item"><a href="<?= RUTA_URL ?>actas" class="nav-link">Actas</a></li>
    <?php } ?>
    <?php if ($_SESSION['tipo_usuario'] != 1) { ?>
      <li class="nav-item"><a href="<?= RUTA_URL ?>compromisos" class="nav-link">Compromisos</a></li>
    <?php } ?>
    <!-- RUTAS DE USUARIOS PARA PACIENTES -->
    <li class="nav-item"><a href="<?= RUTA_URL ?>auth/salir" class="nav-link">Salir</a></li>

  </ul>
</header>