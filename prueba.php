<?php

    if (isset($_POST['button1'])) {
      echo 'boton 1<br>';
    }
    if (isset($_POST['button2'])) {
      echo 'boton 2<br>';
    }
    if (isset($_POST['texto1'])) {
      echo $_POST['texto1'];
    }

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <input type="text" name="texto1" value="">
      <button type="submit" name="button1">ok</button>
      <button type="submit" name="button2">ok</button>
    </form>
  </body>
</html>
