<?php
include("include/config.php");
include("include/defs.php");

$sql_obtener_email = GetRecords("select
                                count(*) as contar
                                from crm_report_dialy_craners
                                where DAY(date_register) = DAY(CURDATE())
                                and
                                MONTH(date_register) = MONTH(CURDATE())
                                and
                                YEAR(date_register) = YEAR(CURDATE()) ");

date_default_timezone_set('america/lima');
$fecha= date('Y-m-d');
$hora= date('H:i:s');
$fecha_local = $fecha.' '.$hora;

//  if($fecha_local >= $value['remember_date']){

$subject = 'REPORTE DIARIO NO REALIZADO';
$email_ventas = "osalerno@gruasshl.com, luis.hernandez@gruasshl.com, irma.rodriguez@gruasshl.com";
//$email_ventas = "tayron.arrieta@gruasshl.com";

$to = $email_ventas;
//$to ='tayronperez17@gmail.com';
$repEmail = "tayron.arrieta@gruasshl.com";
$conpania_nombre = 'SHL';
$repName = 'REPORTE DIARIO NO REALIZADO';
$eol = PHP_EOL;
$separator = md5(time());
$headers = 'From: '.$repName.' <'.$repEmail.'>'.$eol;
$headers .= 'MIME-Version: 1.0' .$eol;
$headers .= "Content-type: text/html;"; //boundary=\"".$separator."\"";
//$message1 = "--".$separator.$eol;
//$message1 .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$message1 .= "Esto es un email automatico. Mega Ramen" .$eol;

foreach ($sql_obtener_email as $key => $value) {
    if($value["contar"]==0){
        $message1 .= "<h3>El Reporte Diario no se ha realizado hasta el momento ".$fecha_local."</h3>";


$message1 .="</table>";

$message .= "--".$separator.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= "--".$separator.$eol;
$message .= "--".$separator."--";

mail($to, $subject, $message1, $headers);

}else{
    $message1 .= "";
    }
}

    //$arrStatus = array("send_email"=>1);

    //UpdateRec("crm_notes", "id=".$value['id'], $arrStatus);

//  }

// } ?>
