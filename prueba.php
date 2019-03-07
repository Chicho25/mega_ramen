<?php

date_default_timezone_set('america/lima'); //lugar de donde quiero la hora y fecha
include("include/config.php");
include("include/defs.php");

    $id_grua =19;
    $precio_hora = 360;
    $hora = 8;
    $fecha = "2019-02-";
    $termino = 1;

for ($i=22; $i < 29; $i++) {
  //continue;
  if ($i == 24){
    continue;
  }
    $arrCran = array("id_crane" => $id_grua,
                     "price_hour" => $precio_hora,
                     "hour_work" => $hora,
                     "total_day" => ($hora * $precio_hora),
                     "id_user_register" => 1,
                     "stat" => 1,
                     "date_register" => date("Y-m-d H:i:s"),
                     "insert_date" => $fecha.$i,
                     "term" => $termino);

    $nId = InsertRec("crm_report_dialy_craners", $arrCran);
    echo $i.'<br>';
  //}
}

$id_grua = 19;
$precio_hora = 360;
$hora = 8;
$fecha = "2019-03-";
$termino = 1;

for ($i=1; $i < 7; $i++) {
  //continue;
if ($i == 3 || $i == 4 || $i == 5){
    continue;
  }
$arrCran = array("id_crane" => $id_grua,
                 "price_hour" => $precio_hora,
                 "hour_work" => $hora,
                 "total_day" => ($hora * $precio_hora),
                 "id_user_register" => 1,
                 "stat" => 1,
                 "date_register" => date("Y-m-d H:i:s"),
                 "insert_date" => $fecha.$i,
                 "term" => $termino);

$nId = InsertRec("crm_report_dialy_craners", $arrCran);
echo $i.'<br>';
//}
}
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
