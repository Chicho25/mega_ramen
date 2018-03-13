<?php

include("include/config.php");
include("include/defs.php");

  if (isset($_POST['button'])) {
      include('twilio-php-master/Twilio/autoload.php');
      $sid = ""; // Your Account SID from www.twilio.com/console
      $token = ""; // Your Auth Token from www.twilio.com/console

      $client = new Twilio\Rest\Client($sid, $token);
      $message = $client->messages->create(
      '+50764221316', // Text this number
      array(
        'from' => '+12673676863', // From a valid Twilio number
        'body' => 'Come poronga de negro'
      )
      );
  }
 ?>
 <?php
   if (isset($_POST['llamada'])) {
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
   }
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
    <form class="" action="" method="post">
      <button type="submit" name="button">Enviar mensaje</button>
    </form>
    <form class="" action="" method="post">
      <button type="submit" name="llamada">llamada</button>
    </form>
    <a id="div-btn1" style="cursor:pointer;">Ver el archivo que contiene hola</a>
    <div id="div-results"></div>
    <?php $categorias = GetRecords("SELECT * FROM rc_category where stat = 1"); ?>
    <section class="container" style="width:100%;">
      <div class="row" style="width:100%;">
    <?php foreach ($categorias as $key => $value) { ?>

          <div class="card" style="width: 200px; margin:5px; float: left;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $value['description']; ?></h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Solicitar</a>
            </div>
          </div>

    <?php } ?>
      </div>
    </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
       $('#div-btn1').click(function(){
          $.ajax({
          type: "POST",
          url: "employers.php",
          success: function(a) {
                    $('#div-results').html(a);
          }
           });
       });
      });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
