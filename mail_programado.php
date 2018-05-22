<?php
include("include/config.php");
include("include/defs.php");

$sql_obtener_email = GetRecords("SELECT
                                      crm_notes.id,
                                      crm_entry.number_tickets,
                                      crm_entry.proyect_name,
                                      crm_notes.conten_note,
                                      crm_notes.log_time,
                                      crm_notes.remember_date,
                                      users.real_name,
                                      users.last_name
                                    FROM crm_notes inner join users on crm_notes.log_user_register = users.id
                                                   inner join crm_entry on crm_entry.id = crm_notes.id_entry
                                    WHERE
                                        crm_notes.type_note = 3
                                      and
                                        crm_notes.send_email = 0");

date_default_timezone_set('america/lima');
$fecha= date('Y-m-d');
$hora= date('H:i:s');
$fecha_local = $fecha.' '.$hora;

foreach ($sql_obtener_email as $key => $value) {

  if($fecha_local >= $value['remember_date']){

$subject = 'RECORDATORIO MEGA RAMEN';
$email_ventas = "ventas@gruasshl.com";

$to = $email_ventas;
//$to ='tayronperez17@gmail.com';
$repEmail = (isset($email_ventas) && $email_ventas != "") ? $email_ventas : '';
$conpania_nombre = 'SHL';
$repName = 'RECORDATORIO SHL';
$eol = PHP_EOL;
$separator = md5(time());
$headers = 'From: '.$repName.' <'.$repEmail.'>'.$eol;
$headers .= 'MIME-Version: 1.0' .$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
$message = "--".$separator.$eol;
$message .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$message .= "Esto es un recordatorio automatico." .$eol;
$message .= "El contenido del Recordatorio es: ".$value['conten_note'].$eol;
$message .= "El recordatorio fue registrado el dia: ".$value['log_time'].$eol;
$message .= "Por el usuario: " .$value['real_name'].' '.$value['last_name'].$eol;
$message .= "Este recordatorio pertenece a el proyecto: " .$value['proyect_name'].$eol;
$message .= "Numero de Ticket: " .$value['number_tickets'].$eol;
$message .= "--".$separator.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= "--".$separator.$eol;
$message .= "--".$separator."--";

mail($to, $subject, $message, $headers);

    $arrStatus = array("send_email"=>1);

    UpdateRec("crm_notes", "id=".$value['id'], $arrStatus);

  }

} ?>
