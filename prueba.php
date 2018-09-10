<?php

date_default_timezone_set('america/lima');//lugar de donde quiero la hora y fecha
    $fecha= date('Y-m-d');
    $hora= date('H:i:s');
    echo $fecha.'<br>';
    echo $hora;

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="time" name="fecha" value="">
        <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
