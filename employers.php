<?php

include("include/config.php");
include("include/defs.php");

if ($_GET['id'] == 1) {

$categorias = GetRecords("SELECT * FROM rc_category where stat = 1");

foreach ($categorias as $key => $value) { ?>

      <div class="card" style="width: 200px; margin:5px; float: left;">
        <img class="card-img-top" src="<?php echo $value['image']; ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $value['description']; ?></h5>
          <p class="card-text"><?php echo $value['description']; ?></p>
          <a href="#" id="div-btn<?php echo $value['id']; ?>" class="btn btn-primary">Solicitar</a>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
         $('#div-btn<?php echo $value['id']; ?>').click(function(){
            $.ajax({
            type: "POST",
            url: "employers_details.php?categorie=<?php echo $value['id']; ?>",
            success: function(a) {
                      $('#div-results').html(a);
            }
             });
         });
        });
      </script>

<?php }

}elseif($_GET['id'] == 2){

  $categorias = GetRecords("SELECT * FROM rc_employer where stat = 1 and id_bussines = 2");

  foreach ($categorias as $key => $value) { ?>

  <div class="card" style="width: 200px; margin:5px; float: left;">
    <img width="150" style="display:block; margin:auto;" src="recept/user.png">
    <div class="card-body">
      <h5 class="card-title"><?php echo $value['name_employer'].' '.$value['last_name']; ?></h5>
      <p class="card-text"><?php echo $value['number_phone']; ?></p>
      <a href="#" class="btn btn-primary">Solicitar</a>
    </div>
  </div>

<?php }
} ?>

<div class="card" style="width: 200px; margin:5px; float: left;">
  <img width="150" src="recept/back.png" style="display:block; margin:auto;">
  <div class="card-body">
    <h5 class="card-title">Volver al inicio</h5>
    <p class="card-text">Regresar al inicio</p>
    <a href="recepcion.php" class="btn btn-primary">Volver al inicio</a>
  </div>
</div>
