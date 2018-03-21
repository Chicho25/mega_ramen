<?php

include("include/config.php");
include("include/defs.php");

$message = "";

  if (isset($_POST['mensaje'])) {
      include('twilio-php-master/Twilio/autoload.php');
      $sid = "ACdb0a657e59eaba02c6a0d88212718421"; // Your Account SID from www.twilio.com/console
      $token = "7a98260c62f5633f30f2baa3e9f7faa8"; // Your Auth Token from www.twilio.com/console

      $client = new Twilio\Rest\Client($sid, $token);
      $message = $client->messages->create(
      '+50760026773', // Text this number
      array(
        'from' => '+12673676863', // From a valid Twilio number
        'body' => 'Se le solicita en la recepcion '
      )
      );

      $message = '<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>El usuario ya fue notificado, por favor espere un momento</strong>
                  </div>';
  }
 ?>
 <?php
   /*if (isset($_POST['llamada'])) {
       include('twilio-php-master/Twilio/autoload.php');
       $sid = ""; // Your Account SID from www.twilio.com/console
       $token = ""; // Your Auth Token from www.twilio.com/console

       $client = new Twilio\Rest\Client($sid, $token);
       $call = $client->calls->create(
       '+50763721914', // Text this number
       '+12673676863',
       array(
         'url' => 'https://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
       )
      );
   } */
  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Recepcion Virtual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <!--<a href="tel:+50760026773">Llamar a Tayron</a>-->
    <!--<form class="" action="" method="post">
      <button type="submit" name="button">Enviar mensaje</button>
    </form>
    <form class="" action="" method="post">
      <button type="submit" name="llamada">llamada</button>
    </form>
    <a style="cursor:pointer;">Ver el archivo que contiene hola</a> -->


    <section class="container" style="width:100%; text-align:center;">
      <?php
            if($message !="")
                echo $message;
      ?>
      <h1>Recepción Virtual</h1>
      <div class="row" style="width:100%;" id="div-results">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <?php

        $categorias = GetRecords("SELECT * FROM rc_bussines where stat = 1");

        foreach ($categorias as $key => $value) { ?>

        <div class="card" style="width: 200px; margin:5px; float: left;">
          <img width="150" src="<?php echo $value['image'];?>" style="display:block; margin:auto;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $value['description']; ?></h5>
            <p class="card-text">Direcctorio telefonico de <?php echo $value['description']; ?></p>
            <a id="div-btnE<?php echo $value['id']; ?>" href="#" class="btn btn-primary">Ver</a>
          </div>
        </div>
        <script type="text/javascript">
          $(document).ready(function() {
           $('#div-btnE<?php echo $value['id']; ?>').click(function(){
              $.ajax({
              type: "POST",
              url: "employers.php?id=<?php echo $value['id']; ?>",
              success: function(a) {
                        $('#div-results').html(a);
              }
               });
           });
          });
        </script>
        <?php } ?>
      </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
