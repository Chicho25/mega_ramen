<?php
include("include/config.php");
include("include/defs.php");

$categorias = GetRecords("SELECT * FROM rc_employer where stat = 1 and id_bussines = 1 and id_category =".$_GET['categorie']);

foreach ($categorias as $key => $value) { ?>

<div class="card" style="width: 200px; margin:5px; float: left;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['name_employer'].' '.$value['last_name']; ?></h5>
    <p class="card-text"><?php echo $value['number_phone']; ?></p>
    <a href="#" class="btn btn-primary">Solicitar</a>
  </div>
</div>

<?php } ?>
