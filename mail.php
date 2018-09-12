<?php
    ob_start();
    session_start();
    include("include/config.php");
    include("include/defs.php");
    /*$arrCust = GetRecord("customer", "id = ".$customer);
    $getUserEmail = GetRecord("users", "id = ".$_SESSION['USER_ID']);
    $uEmail = $arrCust['email'];
    $arrCompany = GetRecord("company", "id = ".$_SESSION['USER_COMPANY']);/*/

    $arrQuotCrate = GetRecords("select * from crm_quot where id = '".$_GET['id']."'");

    $id = $arrQuotCrate[0]['id'];
    $id_customer = $arrQuotCrate[0]['id_customer'];
    $id_contact = $arrQuotCrate[0]['id_contact'];
    $id_tikete = $arrQuotCrate[0]['id_entry'];
    $proyect_name = $arrQuotCrate[0]['proyect_name'];
    $proyect_locate = $arrQuotCrate[0]['adress_proyect'];
    $contact_site = $arrQuotCrate[0]['contact_site'];
    $description_charge = $arrQuotCrate[0]['description_charge'];
    $dimensions = $arrQuotCrate[0]['dimensions'];
    $radio_giro = $arrQuotCrate[0]['radio_giro'];
    $height = $arrQuotCrate[0]['height'];
    $weight_max = $arrQuotCrate[0]['weight_max'];
    $email = $arrQuotCrate[0]['email'];
    $perception_value_work = $arrQuotCrate[0]['perception_value_work'];
    $service_customer = $arrQuotCrate[0]['customer_service_agreement'];
    $id_entry = $arrQuotCrate[0]['id_entry'];
    $comentary = $arrQuotCrate[0]['comentary'];
    $venta_gravable = $arrQuotCrate[0]['taxable_sale'];
    $venta_no_gravable = $arrQuotCrate[0]['non_taxable_sale'];
    $itbms = $arrQuotCrate[0]['itbms'];
    $total = $arrQuotCrate[0]['total'];
    $id_seller = $arrQuotCrate[0]['id_seller'];
    $date_send = $arrQuotCrate[0]['date_send'];
    $version = $arrQuotCrate[0]['version'];
    $number_tickets = $arrQuotCrate[0]['number_tickets'];

    $telefono_cliente = GetRecords("select phone_1, legal_name from crm_customers where id =".$id_customer);
    $telefono_contacto = GetRecords("select phone_1, name_contact, last_name from crm_contact where id =".$id_contact);
    $vendedor_nombre = GetRecords("select real_name, last_name from users where id =".$id_seller);
    $numero_tikete = GetRecords("select number_tickets from crm_entry where id=".$id_tikete);

    $nomrbe_archivo = $numero_tikete[0]['number_tickets'].' V-'.$version;

    $html = '
            <html>
            <head>
              <title>'.$nomrbe_archivo.'</title>
            </head>
            <body style="font-family: arial; font-size: 10pt;">
             <table width="100%">
               <tr>
               <th style="text-align: center; width:200px;"><img width="100" src="http://ofertadeviaje.com/mega_ramen/images/1800.jpg"></th>
               <th style="text-align: center; width:200px;"><img width="100" src="http://ofertadeviaje.com/mega_ramen/images/logoshl.png"></th>
               <th style="text-align: center; width:200px;">Tel. 507 2315818 <br>
                                                 Fax. 507 2316811 <br>
                                                 www.Gruasshl.com<br>
                                                 <img width="100" src="http://ofertadeviaje.com/mega_ramen/images/modular.png"></th>
               </tr>
              </table>

             <div style="border:2px solid black; border-radius:5px; margin:3px;">
               <table width="100%">
                 <tr>
                   <th style="text-align: left;">COTIZACION: </th>
                   <th style="text-align: left;">'.$nomrbe_archivo.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">EMAIL: </th>
                   <th style="text-align: left;">'.$email.'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">FECHA: </th>
                   <th style="text-align: left;">'.$date_send.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">TELEFONO: </th>
                   <th style="text-align: left;">'.$telefono_cliente[0]['phone_1'].'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">CLIENTE: </th>
                   <th style="text-align: left;">'.$telefono_cliente[0]['legal_name'].'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">CELULAR: </th>
                   <th style="text-align: left;">'.$telefono_contacto[0]['phone_1'].'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">CONTACTO: </th>
                   <th style="text-align: left;">'.$telefono_contacto[0]['name_contact'].' '.$telefono_contacto[0]['last_name'].'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">VENDEDOR: </th>
                   <th style="text-align: left;">'.$vendedor_nombre[0]['real_name'].' '.$vendedor_nombre[0]['last_name'].'</th>
                 </tr>
               </table>
             </div>

             <div style="border:2px solid black; border-radius:5px; margin:3px;">
               <table width="100%">
                 <tr>
                   <th style="text-align: left;">PROYECTO: </th>
                   <th style="text-align: left;">'.$proyect_name.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">CONTACTO EN CAMPO: </th>
                   <th style="text-align: left;">'.$contact_site.'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">DIRECCION: </th>
                   <th style="text-align: left;">'.$proyect_locate.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;"></th>
                 </tr>
               </table>
             </div>

             <div style="border:2px solid black; border-radius:5px; margin:3px; table-layout:fixed;">

               <table width="100%" style="table-layout:fixed;">
                 <tr>
                   <th style="text-align: center; background-color:#1e4799;">
                    <div style="border-radius:5px; color:white; width:100%;">DESCRIPCION</div>
                   </th>';
                  if ($id_customer == 104 || $id_customer == 333):
                  $html .= '   <th style="text-align: center;">SERIAL</th>';
                 endif;
                   $html .= '<th style="text-align: center; background-color:#1e4799;">
                    <div style=" border-radius:5px; color:white; width:100%;">TIPO</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;" width="150">
                    <div style="border-radius:5px; color:white; width:100%;">PRECIO</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;">
                    <div style="border-radius:5px; color:white; width:100%;">CANTIDAD</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;">
                    <div style="border-radius:5px; color:white; width:100%;">SUBTOTAL</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;">
                    <div style="border-radius:5px; color:white; width:100%;">ITBMS</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;">
                    <div style="border-radius:5px; color:white; width:100%;">TOTAL</div>
                   </th>
                 </tr>';
                 $arrProduct = GetRecords("(select
                                             crm_craner.name_craner as name_product,
                                             crm_craner.price_hour,
                                             crm_craner.price_day,
                                             crm_craner.price_week,
                                             crm_craner.price_mon,
                                             crm_craner.price_year,
                                             0 as price,
                                             crm_quot_producs.id as id_tmp,
                                             crm_quot_producs.log_time,
                                             crm_quot_producs.type_product,
                                             crm_quot_producs.id_produc,
                                             crm_quot_producs.price,
                                             crm_quot_producs.quantity,
                                             crm_quot_producs.itbms,
                                             crm_quot_producs.total,
                                             crm_quot_producs.comentary,
                                             crm_quot_producs.type,
                                             crm_quot_producs.itbms_product,
                                             crm_quot_producs.type_detail
                                             from
                                             crm_craner inner join crm_quot_producs on crm_quot_producs.id_produc = crm_craner.id
                                             where
                                             crm_quot_producs.stat in (1,2)
                                             and
                                             crm_quot_producs.type_product = 0
                                             and
                                             crm_quot_producs.id_quot = '".$_GET['id']."')
                                             union
                                             (select
                                             crm_service.name_service as name_product,
                                             crm_service.price as price_hour,
                                             crm_service.flag as price_day,
                                             0 as price_week,
                                             0 as price_mon,
                                             0 as price_year,
                                             crm_service.price,
                                             crm_quot_producs.id as id_tmp,
                                             crm_quot_producs.log_time,
                                             crm_quot_producs.type_product,
                                             crm_quot_producs.id_produc,
                                             crm_quot_producs.price,
                                             crm_quot_producs.quantity,
                                             crm_quot_producs.itbms,
                                             crm_quot_producs.total,
                                             crm_quot_producs.comentary,
                                             crm_quot_producs.type,
                                             crm_quot_producs.itbms_product,
                                             crm_quot_producs.type_detail
                                             from
                                             crm_service inner join crm_quot_producs on crm_quot_producs.id_produc = crm_service.id
                                             where
                                             crm_quot_producs.stat in (1,2)
                                             and
                                             crm_quot_producs.type_product = 1
                                             and
                                             crm_quot_producs.id_quot = '".$_GET['id']."')
                                             order by 8 asc");

               $itbms_for_product_sum = 0;

               foreach ($arrProduct as $key => $valueProdut) {

                 $total_cantidad = $valueProdut['price'] * $valueProdut['quantity'];

                 $itbms_for_product = ($valueProdut['itbms_product'] * $total_cantidad)/100;

               $html.='<tr>
                   <th style="text-align: left; width:200px;">'.$valueProdut['name_product'].'</th>
                   ';
                  if ($id_customer == 104 || $id_customer == 333):
                  $html .= '   <th style="text-align: center;">'.$valueProdut['serial'].'</th>';
                 endif;
                   $html .= '
                   <th style="text-align: left;">'.$valueProdut['type_detail'].'</th>
                   <th style="text-align: left;">'.number_format($valueProdut['price'],2,".",",").'</th>
                   <th style="text-align: left;">'.$valueProdut['quantity'].'</th>
                   <th style="text-align: left;">'.number_format($total_cantidad,2,".",",").'</th>
                   <th style="text-align: left;">'.number_format($itbms_for_product,2,".",",").'</th>
                   <th style="text-align: right; width:250px;">'.number_format($valueProdut['total'],2,".",",").'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">Destalle: </th>
                   <th colspan="4" style="text-align: left;">'.$valueProdut['comentary'].'</th>
                 </tr>
                 <tr>
                   <th colspan="5" style="text-align: left;"></th>
                 </tr>';
                 $itbms_for_product_sum += $itbms_for_product;
               }
               $html.='</table>
               </div>

             <div style="padding:3px;">
               <div style="border:2px solid black; border-radius:5px; float:left; width:350px; margin:3px;">
                 <table width="100%">
                   <tr>
                     <th>Para los efectos contables, se requiere el envio de la Orden de compra
                         aprobada por el cliente</th>
                   </tr>
                   <tr>
                     <th>Tel: (507) 231-6866 o (507) 231-5818 Fax: (507) 231-6811</th>
                   </tr>
                   <tr>
                     <th>Email: info@gruasshl.com</th>
                   </tr>
                   <tr>
                     <th>www.Gruasshl.com</th>
                   </tr>
                   <tr>
                     <th>Carretera Transismica, Milla 8</th>
                   </tr>
                 </table>
               </div>

               <div style="border:2px solid black; border-radius:5px; float:right; width:300px; margin:3px;">
                 <table width="100%">
                   <tr>
                     <th style="text-align: left;">VENTA GRAVABLE:</th>
                     <th style="text-align: left;">'.number_format($venta_gravable,2,".",",").'</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">VENTA NO GRAVABLE:</th>
                     <th style="text-align: left;">'.number_format($venta_no_gravable,2,".",",").'</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">ITBMS:</th>
                     <th style="text-align: left;">'.number_format($itbms_for_product_sum,2,".",",").'</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">TOTAL:</th>
                     <th style="text-align: left;">'.number_format($total,2,".",",").'</th>
                   </tr>
                 </table>
               </div>
             </div>
             <div style="border:2px solid black; border-radius:5px;">
               <table width="100%">
                 <tr>
                   <th style="text-align: left;">COMENTARIO: '.$comentary.'</th>
                 </tr>
               </table>
             </div>
          </body>
        </html>';

        ############################### terminos y condiciones #################################

        $html2 = '
                <html>
                <head>
                <meta charset="utf-8">
                </head>
                <body style="font-family: arial; font-size: 10pt;">
                 <table width="100%">
                   <tr>
                   <th style="text-align: center; width:200px;"><img width="100" src="http://ofertadeviaje.com/mega_ramen/images/1800.jpg"></th>
                   <th style="text-align: center; width:200px;"><img width="100" src="http://ofertadeviaje.com/mega_ramen/images/logoshl.png"></th>
                   <th style="text-align: center; width:200px;">Tel. 507 2315818 <br>
                                                     Fax. 507 2316811 <br>
                                                     www.Gruasshl.com<br>
                                                     <img width="100" src="http://ofertadeviaje.com/mega_ramen/images/modular.png"></th>
                   </tr>
                  </table>

                 <div style="margin:3px;">
                   <table width="100%" style="font-size:08px;">
                    <tr>
                      <th style="text-align: left;"><b>Nota 1:</b> NO TRABAJAMOS POR HOROMETRO.</th>
                    </tr>
                    <tr>
                      <th style="text-align: left;">Nota 2: El tiempo de armado, desarmado y reubicación de la grúa y sus accesorios cuenta como tiempo de trabajo. </th>
                    </tr>
                    <tr>
                      <th style="text-align: left;">Nota 3: Permiso de cierre de calle por gestión y cuenta del cliente. </th>
                    </tr>
                    <tr>
                      <th style="text-align: left;">Nota 4: Aislamiento del cableado eléctrico corre por gestión y cuenta del cliente. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 5: Cliente Provee los puntos de levantamiento de la estructura.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 6: no incluye aparejador ni señalero. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 7: Los domingos y días feriados tendrá un cargo mínimo de 8h min consecutivas y recargo de 30%, y serán trabajados según disponibilidad del operador.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 8: No nos hacemos responsables por ningún tipo atraso en el proyecto. En caso de desperfecto en la grúa nosotros procederemos a su reparación o de ser posible el reemplazo de la misma, sin embargo, el cliente podrá desistir del servicio en caso de considerar el tiempo de reparación o reemplazo muy extenso. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 9: Nuestra póliza tiene un límite de responsabilidad civil y daños a terceros de $250,000.00 por lo tanto el cliente nos exonera de toda reclamación superior a este monto en caso de siniestro. Si Ésta cláusula no es aceptable el único remedio exclusivo ser• desistir del servicio.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 10: Si la lluvia no permite trabajar al menos 5h, se facturan 5h min.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 11: El tiempo atascado o encerrado cuenta como tiempo de trabajo.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 12: cambios de fecha de inicio con 1 día hábil al info@gruasshl.com, de lo contrario se cobrarán 5h mínimas. LTM1800 y LR1600 requieren 6 días hábiles de anticipación. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 13: El cliente debe preparar el suelo para soportar el peso de la grúa en todo momento, no nos hacemos responsables por grietas o roturas en el suelo o pavimento. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 14: Tarifas, cargos, Fiscalización o cuotas requeridas para entrar al sitio de trabajo corren por cuenta del cliente. El cliente debe tramitar, pagar, coordinar permisos, áreas y seguridad requeridas durante y al finalizar el trabajo, para mantener en el sitio la grúa hasta que la misma pueda ser retirada de acuerdo a los horarios y días hábiles que el tránsito permite para retirar los equipos. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 15: Todo trabajo donde la pieza tenga un valor de $500,000 o más lleva un seguro cotizado aparte y una supervisión especial con un mínimo de 24 horas de trabajo. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 16: Fajas: El cliente acepta proveer una superficie resistente y libre de aristas, formas cortantes, altas temperaturas etc. Que puedan romper o deteriorar las fajas. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 17: Si la grúa no puede accesar al proyecto se considera día de espera. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 18: El cliente debe proveer vigilancia al equipo en caso que el mismo deba permanecer en el proyecto. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 19: De requerirse instalación de Jib fijo o abatible y contrapesos adicionales a lo cotizado, tendrá un costo adicional. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 20: La grúa se mueve sin contrapesos si el terreno este en óptimas condiciones y plano, de lo contrario se cobrar• el transporte $250/día </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 21: Se cobrar• 2% mensual por mora después de 30 días de emitida la factura. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 22: Toda Disputa comercial o legal ser• en territorio Panameño bajo la ley Panameña. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 23: LA HORA DEL OPERADOR DE LA MAQUINA SON CONSECUTIVOS DESDE EL COMIENZO DEL TURNO DE TRABAJO. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 24: Equipos están sujeto a disponibilidad al momento que sean requeridos. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 25: Para proceder con el trabajo requerimos de orden de compra firmada.</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 26: Viernes Santo Cerrado sin operaciones comerciales. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 27: Una vez inicia el trabajo la ̇nica manera de romper continuidad es cumpliendo con el cargo mínimo y desmovilizar el equipo. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 28: Día de Espera 5h sin oper y 8h con oper, sin afectar mínimos. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 29: Costo por Radio dañado $267.50 </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 30: Extensión del periodo de alquiler está sujeto a disponibilidad. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Nota 31: Tiempo de Charlas Diarias de seguridad cuenta como tiempo de trabajo. </th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Condición de pago: Contado</th>
                      </tr>
                      <tr>
                      <th style="text-align: left;">Contado Pago Crédito: Procede si el cliente completa nuestros formularios y es aprobado por SHL. El Crédito máximo es a 30 días y comienza desde el cierre de la factura de SHL y envío al cliente (no al cierre del mes contable del cliente). </th>
                    </tr>
                   </table>
                 </div>

                 <div style="margin:3px;">
                   <table width="100%">
                     <tr>
                       <th style="text-align: center; border: 2px solid blue; border-radius:5px;">
                          Para los efectos contables, se requiere el envio de la Orden de Compra aprobada por el Cliente
                          Tel: (507) 231-6866 o (507) 231-5818 Fax: (507) 231-6811 email: info@gruasshl.com
                          www.Gruasshl.com Apartado 0850-00753. Carretera TransÌstmica, Milla 8.1
                      </th>
                     </tr>
                   </table>
                 </div>
                 </body>
                </html>';

include("pdf/mpdf.php");
$mpdf=new mPDF();
//$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->AddPage();
$mpdf->WriteHTML($html2);
//$content= $mpdf->Output('test.pdf', 'F'); // Saving pdf to attach to email
//$mpdf->Output();

$subject = 'COTIZACION / GRUAS SHL: #'.$nomrbe_archivo.' PROYECTO: '.$proyect_name;
$fileName = $nomrbe_archivo.'.pdf';
//if ($_SESSION['MR_USER_ROLE'] == 4) {
//    $email_ventas = "facturacion@gruasshl.com";
//}else{
    $email_ventas = "ventas@gruasshl.com";
//}
$to = $email.','.$email_ventas.', irma.rodriguez@gruasshl.com, tayron.arrieta@gruasshl.com';
//$to ='tayronperez17@gmail.com';
$repEmail = (isset($email_ventas) && $email_ventas != "") ? $email_ventas : '';
$conpania_nombre = 'SHL';
$repName = 'Ventas SHL';
$fileatt = $mpdf->Output($fileName, 'S');
$attachment = chunk_split(base64_encode($fileatt));
$eol = PHP_EOL;
$separator = md5(time());
$headers = 'From: '.$repName.' <'.$repEmail.'>'.$eol;
$headers .= 'MIME-Version: 1.0' .$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
$message = "--".$separator.$eol;
$message .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$message .= "Estimado  Cliente." .$eol;
$message .= "Reciba un cordial saludo de el equipo GRUAS SHL." .$eol;
$message .= "Adjunto envío la cotización solicitada." .$eol;
$message .= "Quedamos a la espera de sus comentarios y confirmación," .$eol;
$message .= "Si tiene alguna duda o consulta favor comunicarse con la Sra. Moira Chávez al número telefónico (507)231-6811/6866." .$eol;
$message .= "--".$separator.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
/*$message .= $html; preview
$message .= $html2;*/
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= "--".$separator.$eol;
$message .= "Content-Type: application/pdf; name=\"".$fileName."\"".$eol;
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment".$eol.$eol;
$message .= $attachment.$eol;
$message .= "--".$separator."--";

if (mail($to, $subject, $message, $headers))
{


  /*$pass="Chicho1787$$$";
  //use PHPMailer\PHPMailer\PHPMailer;
  //use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer/PHPMailer.php';
  require 'PHPMailer/PHPMailer/SMTP.php';

  $mail = new PHPMailer(true);
  try {
      //Server settings
      $mail->SMTPDebug = 1;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'tayron.arrieta@gruasshl.com';
      $mail->Password = $pass;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      //Recipients
      $mail->setFrom('ventas@gruasshl.com', 'Ventas SHL');
      //$mail->addCC('tayronperez17@gmail.com', 'Cliente');     // Add a recipient
      $mail->addAddress($email, 'Cliente');
      //$mail->addCC('osalerno@gruasshl.com', 'Omar Salerno');
      //$mail->addCC('luis.hernandez@gruasshl.com', 'Luis Hernandez');
      //$mail->addAddress('moira.chavez@gruasshl.com', 'Moira Chavez');          // Name is optional
      //$mail->addReplyTo('ventas@gruasshl.com', 'Ventas');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Gruas SHL Mensaje de Confirmacion';
      $mail->Body    = 'Si este mensaje le ha llegado <b>La cotizacion '.$nomrbe_archivo.' !</b> ha llegado a su destino';
      $mail->AltBody = 'Esto es un email automatico, No responsa este correo.';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }

*/
  if(isset($_GET['locat_page'])){
    header("Location: quotations.php?enviado=1");
  }elseif ($_GET['locat_view']){
    header("Location: view_quotations.php?enviado=1&id=".$id_tikete);
  }elseif ($_GET['locat_view_detail']){
    header("Location: view_quotations_detail.php?enviado=1&id=".$_GET['id']);
  }elseif($_GET['locat_page_send_aproval']){
    header("Location: quotations.php?enviado=1");
  }
}else{
//echo "Email failed";
} ?>
