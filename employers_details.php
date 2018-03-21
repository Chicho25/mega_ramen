<?php
include("include/config.php");
include("include/defs.php");

$categorias = GetRecords("SELECT * FROM rc_employer where stat = 1 and id_bussines = 1 and id_category =".$_GET['categorie']);

foreach ($categorias as $key => $value) { ?>

<form class="" action="" method="post">
  <div class="card" style="width: 200px; margin:5px; float: left;">
    <img width="150" style="display:block; margin:auto;" src="recept/user.png">
    <div class="card-body">
      <h5 class="card-title"><?php echo $value['name_employer'].' '.$value['last_name']; ?></h5>
      <p class="card-text"><?php echo $value['number_phone']; ?></p>
      <button name="mensaje" class="btn btn-primary">Solicitar</button>
      <input type="hidden" name="n_telefono" value="<?php echo $value['number_phone']; ?>">
    </div>
  </div>
</form>

<?php } ?>

<div class="card" style="width: 200px; margin:5px; float: left;">
  <img width="150" src="recept/back.png" style="display:block; margin:auto;">
  <div class="card-body">
    <h5 class="card-title">Volver al inicio</h5>
    <p class="card-text">Regresar al inicio</p>
    <a href="recepcion.php" class="btn btn-primary">Volver al inicio</a>
  </div>
</div>
