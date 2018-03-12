<?php
  if (isset($_POST['button'])) {
      include('twilio-php-master/Twilio/autoload.php');
      $sid = "ACdb0a657e59eaba02c6a0d88212718421"; // Your Account SID from www.twilio.com/console
      $token = "7a98260c62f5633f30f2baa3e9f7faa8"; // Your Auth Token from www.twilio.com/console

      $client = new Twilio\Rest\Client($sid, $token);
      $message = $client->messages->create(
      '+50760026773', // Text this number
      array(
        'from' => '+12673676863', // From a valid Twilio number
        'body' => 'Hello from Twilio!'
      )
      );
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!--<a href="tel:+50760026773">Llamar a Tayron</a>-->
    <form class="" action="" method="post">
      <button type="submit" name="button">Enviar mensaje</button>
    </form>
  </body>
</html>
