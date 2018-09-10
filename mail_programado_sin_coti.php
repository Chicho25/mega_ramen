<?php
include("include/config.php");
include("include/defs.php");

$sql_obtener_email = GetRecords("select
                                    ce.number_tickets,
                                    cc.legal_name,
                                    ce.log_time,
                                    cco.name_contact,
                                    cco.last_name as last_name_contact,
                                    ce.proyect_name,
                                    ce.work_do,
                                    u.real_name,
                                    u.last_name,
                                    (select description from crm_type_media where id = ce.id_type_media) as media,
                                    (select count(*) from crm_quot where id_entry = ce.id) as contar
                                   from crm_entry ce inner join crm_customers cc on cc.id = ce.id_customer
                                  				           inner join crm_contact cco on cco.id = ce.id_contact
                                                     inner join users u on u.id = ce.log_user_register
                                  where
                                  (select count(*) from crm_quot where id_entry = ce.id) = 0");

date_default_timezone_set('america/lima');
$fecha= date('Y-m-d');
$hora= date('H:i:s');
$fecha_local = $fecha.' '.$hora;

//  if($fecha_local >= $value['remember_date']){

$subject = 'COTIZACIONES NO ENVIADAS';
$email_ventas = "tayron.arrieta@gruasshl.com, osalerno@gruasshl.com, luis.hernandez@gruas";

$to = $email_ventas;
//$to ='tayronperez17@gmail.com';
$repEmail = (isset($email_ventas) && $email_ventas != "") ? $email_ventas : '';
$conpania_nombre = 'SHL';
$repName = 'LISTADO DE COTIZACIONES NO ENVIADAS';
$eol = PHP_EOL;
$separator = md5(time());
$headers = 'From: '.$repName.' <'.$repEmail.'>'.$eol;
$headers .= 'MIME-Version: 1.0' .$eol;
$headers .= "Content-type: text/html;"; //boundary=\"".$separator."\"";
//$message1 = "--".$separator.$eol;
//$message1 .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$message1 .= "Esto es un email automatico." .$eol;


$message1 .= "<table border='1'>
              <tr>
                <td><b>Numero de Cotizacion</b></td>
                <td><b>Fecha de Registro</b></td>
                <td><b>Medio</b></td>
                <td><b>Cliente</b></td>
                <td><b>Contacto</b></td>
                <td><b>Nombre Proyecto</b></td>
                <td><b>Trabajo a Realizar</b></td>
                <td><b>Registrado Por</b></td>
              </tr>";
foreach ($sql_obtener_email as $key => $value) {
$message1 .= "<tr>
              <td>".$value['number_tickets']."</td>
              <td>".$value['log_time']."</td>
              <td>".$value['media']."</td>
              <td>".$value['legal_name']."</td>
              <td>".$value['name_contact']." ".$value['last_name_contact']."</td>
              <td>".$value['proyect_name']."</td>
              <td>".$value['work_do']."</td>
              <td>".$value['real_name']." ".$value['last_name']."</td>
            </tr>"; }

$message1 .="</table>";

$message .= "--".$separator.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= "--".$separator.$eol;
$message .= "--".$separator."--";

mail($to, $subject, $message1, $headers);

    //$arrStatus = array("send_email"=>1);

    //UpdateRec("crm_notes", "id=".$value['id'], $arrStatus);

//  }

// } ?>
