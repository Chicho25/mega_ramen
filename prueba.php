<?php

date_default_timezone_set('america/lima'); //lugar de donde quiero la hora y fecha
include("include/config.php");
include("include/defs.php");

    $id_grua = 3;
    $precio_hora = 250;
    $hora = 8;
    $fecha = "2019-02-";
    $termino = 2;



for ($i=12; $i < 22; $i++) {

  if ($i == 13 || $i == 14 || $i == 15){
    //continue;
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
  }


}

$id_grua = 37;
$precio_hora = 360;
$hora = 8;
$fecha = "2019-02-";
$termino = 1;



for ($i=12; $i < 22; $i++) {

if ($i != 99){
//continue;
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
}


}

$id_grua = 19;
$precio_hora = 360;
$hora = 8;
$fecha = "2019-02-";
$termino = 1;



for ($i=12; $i < 22; $i++) {

if ($i != 17){
//continue;
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
}


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
