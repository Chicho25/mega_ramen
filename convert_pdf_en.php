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
                   <th style="text-align: left;">QUOTATION: </th>
                   <th style="text-align: left;">'.$nomrbe_archivo.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">EMAIL: </th>
                   <th style="text-align: left;">'.$email.'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">DATE: </th>
                   <th style="text-align: left;">'.$date_send.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">PHONE: </th>
                   <th style="text-align: left;">'.$telefono_cliente[0]['phone_1'].'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">CUSTOMER: </th>
                   <th style="text-align: left;">'.$telefono_cliente[0]['legal_name'].'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">MOBILE: </th>
                   <th style="text-align: left;">'.$telefono_contacto[0]['phone_1'].'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">CONTACT: </th>
                   <th style="text-align: left;">'.$telefono_contacto[0]['name_contact'].' '.$telefono_contacto[0]['last_name'].'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">SELLER: </th>
                   <th style="text-align: left;">'.$vendedor_nombre[0]['real_name'].' '.$vendedor_nombre[0]['last_name'].'</th>
                 </tr>
               </table>
             </div>';

             $html .='<div style="border:2px solid black; border-radius:5px; margin:3px;">
               <table width="100%">
                 <tr>
                   <th style="text-align: left;">PROYECT: </th>
                   <th style="text-align: left;">'.$proyect_name.'</th>
                   <th style="text-align: left;"></th>
                   <th style="text-align: left;">CONTACT IN THE PLACE: </th>
                   <th style="text-align: left;">'.$contact_site.'</th>
                 </tr>
                 <tr>
                   <th style="text-align: left;">ADDRESS: </th>
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
                    <div style="border-radius:5px; color:white; width:100%;">DESCRIPTION</div>
                   </th>';
                    if ($id_customer == 104 || $id_customer == 333):
                        $html .= '<th>SERIAL</th>';
                    endif;
                  $html .= ' <th style="text-align: center; background-color:#1e4799;">
                    <div style=" border-radius:5px; color:white; width:100%;">QUANTITY</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;" width="150">
                    <div style="border-radius:5px; color:white; width:100%;">UNITY</div>
                   </th>
                   <th style="text-align: center; background-color:#1e4799;" width="150">
                    <div style="border-radius:5px; color:white; width:100%;">COST</div>
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
                                             crm_craner.serial,
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
                                             '0' as serial,
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
                   <th style="text-align: left; width:200px;">'.$valueProdut['name_product'].'</th>';
                   if ($id_customer == 104 || $id_customer == 333):
                       $html .= '<th tyle="text-align: left;">'.$valueProdut['serial'].'</th>';
                   endif;
                   $html .= '<th style="text-align: left;">'.$valueProdut['quantity'].'</th>
                   <th style="text-align: left;">'.$valueProdut['type_detail'].'</th>
                   <th style="text-align: left;">'.number_format($valueProdut['price'],2,".",",").' USD</th>
                   <th style="text-align: left; width:150px;">'.number_format($total_cantidad,2,".",",").' USD</th>
                   <th style="text-align: left; width:100px;">'.number_format($itbms_for_product,2,".",",").' USD</th>
                   <th style="text-align: right; width:220px;">'.number_format($valueProdut['total'],2,".",",").' USD</th>
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
                     <th>For the accounting purposes, the sending of the Purchase Order approved by the client is required</th>
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
                     <th>Highway Transismica, Milla 8</th>
                   </tr>
                 </table>
               </div>

               <div style="border:2px solid black; border-radius:5px; float:right; width:300px; margin:3px;">
                 <table width="100%">
                   <tr>
                     <th style="text-align: left;">TAXABLE SALE:</th>
                     <th style="text-align: left;">'.number_format($venta_gravable,2,".",",").' USD</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">NON-TAXABLE SALE:</th>
                     <th style="text-align: left;">'.number_format($venta_no_gravable,2,".",",").' USD</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">ITBMS:</th>
                     <th style="text-align: left;">'.number_format($itbms_for_product_sum,2,".",",").' USD</th>
                   </tr>
                   <tr>
                     <th style="text-align: left;">TOTAL:</th>
                     <th style="text-align: left;">'.number_format($total,2,".",",").' USD</th>
                   </tr>
                 </table>
               </div>
             </div>
             <div style="border:2px solid black; border-radius:5px;">
               <table width="100%">
                 <tr>
                   <th style="text-align: left;">COMENTARY: '.$comentary.'</th>
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
              <th style="text-align: left;"><b>Note 1:</b> WE DO NOT WORK BY HOROMETER.</th>
            </tr>
            <tr>
              <th style="text-align: left;">Note 2: The time of assembly, disassembly and relocation of the crane and its accessories counts as working time. </th>
            </tr>
            <tr>
              <th style="text-align: left;">Note 3: Street closure permit for management and customer account. </th>
            </tr>
            <tr>
              <th style="text-align: left;">Note 4: Isolation of the electrical wiring runs by management and customer account. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 5: Client Provides the survey points of the structure.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 6: does not include rigger or signer. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 7: Sundays and holidays will have a minimum charge of 8 consecutive hours and a surcharge of 30%, and will be worked according to the availability of the operator.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 8: We are not responsible for any delay in the project. In case of damage in the crane we will proceed to repair or if possible the replacement of the same, however, the customer may desist from the service in case of considering the time of repair or replacement very extensive. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 9: Our policy has a limit of civil liability and damages to third parties of $ 250,000.00 therefore the client exonerates us of any claim higher than this amount in case of loss. If this clause is not acceptable, the only exclusive remedy is to • give up the service.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 10: If the rain does not allow to work at least 5h, they are billed 5h min.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 11: Stuck or locked time counts as work time.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 12: Changes of start date with 1 business day to info@gruasshl.com, otherwise 5h minimum will be charged. LTM1800 and LR1600 require 6 business days in advance. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 13: The customer must prepare the floor to support the weight of the crane at all times, we are not responsible for cracks or breaks in the floor or pavement. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 14: Fees, charges, inspection or fees required to enter the work site are at the client\'s expense. The client must process, pay, coordinate permissions, areas and security required during and at the end of the work, to keep the crane on site until it can be withdrawn according to the schedules and working days that the transit allows to remove the teams. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 15: All work where the piece has a value of $ 500,000 or more carries a separate quoted insurance and special supervision with a minimum of 24 hours of work. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 16: Shapes: The client accepts to provide a resistant surface free of edges, sharp shapes, high temperatures, etc. That can break or deteriorate the strips. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 17: If the crane can not access the project, it is considered a waiting day. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 18: The client must provide surveillance to the team in case it should remain in the project. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 19: If installation of fixed or folding Jib and additional counterweights is required, it will have an additional cost. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 20: The crane moves without counterweights if the terrain is in optimal conditions and flat, otherwise it will be charged • transportation $ 250 / day </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 21: Monthly • 2% will be charged for delay after 30 days of the invoice issued. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 22: Any commercial or legal Dispute will be • in Panamanian territory under the Panamanian law. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 23: THE HOUR OF THE OPERATOR OF THE MACHINE ARE CONSECUTIVE SINCE THE START OF THE WORKING TURN. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 24: Equipment is subject to availability at the time they are required. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 25: To proceed with the work we require a signed purchase order.</th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 26: Good Friday Closed without commercial operations. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 27: Once the work begins, the only way to break continuity is to comply with the minimum charge and demobilize the equipment.. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 28: Day of Waiting 5h without oper and 8h with oper, without affecting minimum. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 29: Cost per damaged Radio $ 267.50 </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 30: Extension of the rental period is subject to availability. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Note 31: Time for Daily Safety Chat counts as work time. </th>
              </tr>
              <tr>
              <th style="text-align: left;">Payment condition: Cash</th>
              </tr>
              <tr>
              <th style="text-align: left;">Counted Payment Credit: Proceed if the client completes our forms and is approved by SHL. The maximum credit is 30 days and starts from the closing of the SHL invoice and delivery to the client (not at the close of the client\'s accounting month). </th>
            </tr>
           </table>
         </div>

         <div style="margin:3px;">
           <table width="100%">
             <tr>
               <th style="text-align: center; border: 2px solid blue; border-radius:5px;">
               For the accounting purposes, the sending of the Purchase Order approved by the Client is required
                  Tel: (507) 231-6866 o (507) 231-5818 Fax: (507) 231-6811 email: info@gruasshl.com
                  www.Gruasshl.com Apartado 0850-00753. Highway TransÌstmica, Milla 8.1
              </th>
             </tr>
           </table>
         </div>
         </body>
        </html>';

include("pdf/mpdf.php");
$mpdf=new mPDF();
//$mpdf->AddPage('L');
//$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->AddPage();
$mpdf->WriteHTML($html2);
//$content= $mpdf->Output('test.pdf', 'F'); // Saving pdf to attach to email
$mpdf->Output($nomrbe_archivo.".pdf", "I"); ?>
