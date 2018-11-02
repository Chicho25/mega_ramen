<?php
    ob_start();
    session_start();
    $quotclass="class='active'";
    $regquotclass="class='active'";
    include("include/config.php");
    include("include/defs.php");
    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     $message="";

     /* descartar cotizacion */

     if(isset($_POST['id_quot_discard'])){

       $arrDiscard = array(
          "stat"=>7,
          "date_cancel" => date("Y-m-d H:i:s")
       );

       $arrEntry = array(
          "stat"=>3
       );

       $id_session = session_id();

       UpdateRec("crm_quot", "id=".$_POST['id_quot_discard'], $arrDiscard);

       UpdateRec("crm_entry", "id=".$_GET['id'], $arrEntry);

       UpdateRec("crm_tmp_product", "id_session='".$id_session."'", $arrEntry);

       UpdateRec("crm_quot_producs", "id_quot=".$_POST['id_quot_discard'], $arrEntry);

       $message = '<div class="alert alert-danger">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong>Cotizacion descartada!</strong>
                     </div>';

     }

     /*  casos para el status de la cotizacion e ingreso  */

     $stat_general = GetRecords("select stat from crm_entry where id = '".$_GET['id']."'");

     switch($stat_general[0]['stat']):
        case 3:
          $sin_cotizacion = 1;
          break;
        case 4:
          $cotizacion_creada = 1;
          break;
        case 5:
          $cotizacion_enviada = 1;
          break;
        case 6:
          $cotizacion_Archivada = 1;
          break;
     endswitch;

     /* ################################################ */

     /* Registros de Notas */
     if(isset($_POST['note_call'])){

       $arrNotCall = array(
                     "type_note" => 2,
                     "conten_note" => $_POST['note_call_quot'],
                     "stat" => 1,
                     "log_user_register" => $_SESSION['MR_USER_ID'],
                     "log_time" => date("Y-m-d H:i:s"),
                     "id_entry" => $_POST['id_entry']
                    );

     $noteId = InsertRec("crm_notes", $arrNotCall);

       if(isset($noteId)){
         $message = '<div class="alert alert-success">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>La nota de llamada fue agregada!</strong>
                       </div>';

         /* Log Seguimiento */
         $arrVal = array(
                         "id_module" => 20,
                         "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado una nota de llamada en una cotizacion .",
                         "id_user" => $_SESSION['MR_USER_ID'],
                         "log_time" => date("Y-m-d H:i:s")
                        );

         $nId = InsertRec("log_tracing", $arrVal);
         /*  Fin Log Seguimiento */
       }

     }elseif(isset($_POST['note'], $_POST['id_entry_nota'])){

            $arrNot = array(
                            "type_note" => $_POST['type_note'],
                            "conten_note" => $_POST['note_quot'],
                            "stat" => 1,
                            "log_user_register" => $_SESSION['MR_USER_ID'],
                            "log_time" => date("Y-m-d H:i:s"),
                            "id_entry" => $_POST['id_entry_nota'],
                            "remember_date" => $_POST['fecha_nota'].' '.$_POST['hora']
                         );

          $noteId = InsertRec("crm_notes", $arrNot);

            if(isset($noteId)){
              $message = '<div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>La nota fue agregada!</strong>
                            </div>';
            }
            /* Log Seguimiento */
            $arrVal = array(
                            "id_module" => 19,
                            "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado una nota en una cotizacion .",
                            "id_user" => $_SESSION['MR_USER_ID'],
                            "log_time" => date("Y-m-d H:i:s")
                           );

            $nId = InsertRec("log_tracing", $arrVal);
            /*  Fin Log Seguimiento */

          }

     /* Fin notas */

    if(isset($_POST['save'], $cotizacion_creada)){

        /* guardar cotizacion creada */

          $id_customer = $_POST['id_customer'];
          $id_contact = $_POST['id_contact'];
          $id_entry = $_POST['id_entry'];
          $proyect_name =$_POST['proyect_name'];
          $proyect_locate = $_POST['proyect_locate'];
          $proyect_contact = $_POST['proyect_contact'];
          $description_charge = $_POST['description_charge'];
          $dimensions = $_POST['dimensions'];
          $turning_radius = $_POST['turning_radius'];
          $height = $_POST['height'];
          $weight_max = $_POST['weight_max'];
          $email = $_POST['email'];
          $perceptions_value_work = $_POST['perceptions_value_work'];
          $id_seller = $_POST['id_seller'];
          $service_customer = $_POST['service_customer'];
          $comentary = $_POST['comentary'];
          $sale_gravable =$_POST['sale_gravable'];
          $sale_no_gravable = $_POST['sale_no_gravable'];
          $itbms = $_POST['itbms'];
          $total = $_POST['total'];
          $limit_quot = $_POST['limit_quot'];
          $lenguaje = $_POST['id_lenguage'];

          $arrQuot_Update = array(
                        "id_customer" => $id_customer,
                        "id_entry" => $id_entry,
                        "proyect_name" => $proyect_name,
                        "adress_proyect" => $proyect_locate,
                        "contact_site" => $proyect_contact,
                        "description_charge" => $description_charge,
                        "dimensions" => $dimensions,
                        "radio_giro" => $turning_radius,
                        "height" => $height,
                        "weight_max" => $weight_max,
                        "email" => $email,
                        "perception_value_work" => $perceptions_value_work,
                        "id_seller" => $id_seller,
                        "customer_service_agreement" => $service_customer,
                        "comentary" => $comentary,
                        "taxable_sale" => $sale_gravable,
                        "non_taxable_sale" => $sale_no_gravable,
                        "itbms" => $itbms,
                        "total" => $total,
                        "date_send"=>date("Y-m-d H:i:s"),
                        "id_user_finish" => $_SESSION['MR_USER_ID'],
                        "id_contact" => $id_contact,
                        "limit_quot" => $limit_quot,
                        "id_lenguage" => $lenguaje);

          UpdateRec("crm_quot", "id='".$_POST['id_coti_creada']."'", $arrQuot_Update);

          /* Update de productos */
          if(isset($_POST['id_product'])) {

          foreach ($_POST['id_product_detail_tmp'] as $key => $value) {

          $arrProductUpdate = array(
                              "type"=>str_replace(",","",$_POST['price_type'][$key]),
                              "price"=>str_replace(",","",$_POST['price'][$key]),
                              "quantity"=>$_POST['canti'][$key],
                              "itbms"=>str_replace(",","",$_POST['itbms']),
                              "total"=>str_replace(",","",$_POST['total_prod'][$key]),
                              "comentary"=>$_POST['des_pro'][$key],
                              "id_user_finish"=>$_SESSION['MR_USER_ID'],
                              "date_finish"=>date("Y-m-d H:i:s"),
                              "itbms_product"=>str_replace(",","",$_POST['itbms_product'][$key]),
                              "type_detail"=>$_POST['detail_type'][$key]);

           UpdateRec("crm_quot_producs", "id=".$_POST['id_product_detail_tmp'][$key], $arrProductUpdate);

              }

            }

        $message = '<div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Los cambios fueron realizados</strong>
                    </div>';

        // al realizar los cambios se borran los registros temporales
        $session_id = session_id();
        DeleteRec("crm_tmp_product", "id_session ='".$session_id."'");

    }

    /* Envia Cotizacion */
    if(isset($_POST['send_quot'], $cotizacion_creada)){

      $id_customer = $_POST['id_customer'];
      $id_contact = $_POST['id_contact'];
      $id_entry = $_POST['id_entry'];
      $proyect_name =$_POST['proyect_name'];
      $proyect_locate = $_POST['proyect_locate'];
      $proyect_contact = $_POST['proyect_contact'];
      $description_charge = $_POST['description_charge'];
      $dimensions = $_POST['dimensions'];
      $turning_radius = $_POST['turning_radius'];
      $height = $_POST['height'];
      $weight_max = $_POST['weight_max'];
      $email = $_POST['email'];
      $perceptions_value_work = $_POST['perceptions_value_work'];
      $id_seller = $_POST['id_seller'];
      $service_customer = $_POST['service_customer'];
      $comentary = $_POST['comentary'];
      $sale_gravable =$_POST['sale_gravable'];
      $sale_no_gravable = $_POST['sale_no_gravable'];
      $itbms = $_POST['itbms'];
      $total = $_POST['total'];
      $limit_quot = $_POST['limit_quot'];
      $lenguaje = $_POST['id_lenguage'];


      $arrQuot_Update = array(
                    "id_customer" => $id_customer,
                    "id_entry" => $id_entry,
                    "proyect_name" => $proyect_name,
                    "adress_proyect" => $proyect_locate,
                    "contact_site" => $proyect_contact,
                    "description_charge" => $description_charge,
                    "dimensions" => $dimensions,
                    "radio_giro" => $turning_radius,
                    "height" => $height,
                    "weight_max" => $weight_max,
                    "email" => $email,
                    "perception_value_work" => $perceptions_value_work,
                    "id_seller" => $id_seller,
                    "customer_service_agreement" => $service_customer,
                    "comentary" => $comentary,
                    "taxable_sale" => $sale_gravable,
                    "non_taxable_sale" => $sale_no_gravable,
                    "itbms" => $itbms,
                    "total" => $total,
                    "stat" => 5,
                    "date_send"=>date("Y-m-d H:i:s"),
                    "id_user_finish" => $_SESSION['MR_USER_ID'],
                    "id_contact" => $id_contact,
                    "limit_quot" => $limit_quot,
                    "id_lenguage" => $lenguaje);

      UpdateRec("crm_quot", "id='".$_POST['id_coti_creada']."'", $arrQuot_Update);

      /* Update de productos */
      if(isset($_POST['id_product'])) {

      foreach ($_POST['id_product_detail_tmp'] as $key => $value) {

      $arrProductUpdate = array(
                          "type"=>$_POST['price_type'][$key],
                          "price"=>$_POST['price'][$key],
                          "quantity"=>$_POST['canti'][$key],
                          "itbms"=>$_POST['itbms'],
                          "total"=>$_POST['total_prod'][$key],
                          "comentary"=>$_POST['des_pro'][$key],
                          "stat"=>2,
                          "id_user_finish"=>$_SESSION['MR_USER_ID'],
                          "date_finish"=>date("Y-m-d H:i:s"),
                          "itbms_product"=>$_POST['itbms_product'][$key],
                          "type_detail"=>$_POST['detail_type'][$key]);

      UpdateRec("crm_quot_producs", "id=".$_POST['id_product_detail_tmp'][$key], $arrProductUpdate);

      }

      }

      /* Update de Servicios */
      if(isset($_POST['id_service'])) {

      foreach ($_POST['id_service'] as $key => $value) {

      $arrServiceUpdate = array(
              "quantity"=>$_POST['cantidad'][$key],
              "price"=>$_POST['price_serv'][$key],
              "total"=>$_POST['total_sercq'][$key],
              "stat"=>2,
              "des_ser"=>$_POST['des_ser'][$key],
              "id_user_finish"=>$_SESSION['MR_USER_ID'],
              "date_finish"=>date("Y-m-d H:i:s"));

        UpdateRec("crm_quot_service", "id='".$_POST['id_service'][$key]."'", $arrServiceUpdate);

      }

      }
      /* Cambiar de status la entrada */

      $arrEntry = array(
         "stat"=>5
      );

      UpdateRec("crm_entry", "id=".$_POST['id_entry'], $arrEntry);

      /* Log Seguimiento */
      $arrSend = array(
                      "id_module" => 22,
                      "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Enviado una cotizacion ID: ".$_POST['id_coti_creada'].".",
                      "id_user" => $_SESSION['MR_USER_ID'],
                      "log_time" => date("Y-m-d H:i:s")
                     );

      $nId = InsertRec("log_tracing", $arrSend);
      /*  Fin Log Seguimiento */

      // Envio de correo electronico
      $rq = 1;
      // al enviar los cambios se borran los registros temporales
      $session_id = session_id();
      DeleteRec("crm_tmp_product", "id_session ='".$session_id."'");
      /////////////////////////////////////////////////////////////
      header("Location: mail.php?id=".$_POST['id_coti_creada']."&locat_page=".$rq);

      /*  casos para el status de la cotizacion e ingreso  */

      $stat_general = GetRecords("select stat from crm_entry where id = '".$_GET['id']."'");

      unset($cotizacion_creada); /* se destruye la variable, para que no este en memoria */

      switch($stat_general[0]['stat']):
         case 3:
           $sin_cotizacion = 1;
           break;
         case 4:
           $cotizacion_creada = 1;
           break;
         case 5:
           //$cotizacion_enviada = 1;
           $sin_cotizacion = 1;
           break;
         case 6:
           $cotizacion_Archivada = 1;
           break;
      endswitch;

      /* ################################################ */

    }

    if(isset($sin_cotizacion)){

    if(isset($_POST['save']))
     {
        $id_customer = $_POST['id_customer'];
        $id_contact = $_POST['id_contact'];
        $id_entry = $_POST['id_entry'];
        $proyect_name =$_POST['proyect_name'];
        $proyect_locate = $_POST['proyect_locate'];
        $proyect_contact = $_POST['proyect_contact'];
        $description_charge = $_POST['description_charge'];
        $dimensions = $_POST['dimensions'];
        $turning_radius = $_POST['turning_radius'];
        $height = $_POST['height'];
        $weight_max = $_POST['weight_max'];
        $email = $_POST['email'];
        $perceptions_value_work = $_POST['perceptions_value_work'];
        $id_seller = $_POST['id_seller'];
        $service_customer = $_POST['service_customer'];
        $comentary = $_POST['comentary'];
        $sale_gravable =$_POST['sale_gravable'];
        $sale_no_gravable = $_POST['sale_no_gravable'];
        $itbms = $_POST['itbms'];
        $total = $_POST['total'];
        $number_tickets = $_POST['number_tickets'];
        $limit_quot = $_POST['limit_quot'];
        $lenguaje = $_POST['id_lenguage'];

        /* Cuerpo de la Cotizacion */

        /* Contar la cantidad de contizaciones */

        $n_version = RecCountUltimaCotizacion("crm_quot", "id_entry=".$id_entry);
        $n_version = $n_version + 1;

            $arrQuot = array(
                          "id_customer" => $id_customer,
                          "id_entry" => $id_entry,
                          "proyect_name" => $proyect_name,
                          "adress_proyect" => $proyect_locate,
                          "contact_site" => $proyect_contact,
                          "description_charge" => $description_charge,
                          "dimensions" => $dimensions,
                          "radio_giro" => $turning_radius,
                          "height" => $height,
                          "weight_max" => $weight_max,
                          "email" => $email,
                          "perception_value_work" => $perceptions_value_work,
                          "id_seller" => $id_seller,
                          "customer_service_agreement" => $service_customer,
                          "comentary" => $comentary,
                          "taxable_sale" => $sale_gravable,
                          "non_taxable_sale" => $sale_no_gravable,
                          "itbms" => $itbms,
                          "total" => $total,
                          "stat" => 4,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s"),
                          "date_save" => date("Y-m-d H:i:s"),
                          "id_contact" => $id_contact,
                          "version" => $n_version,
                          "number_tickets"=>$number_tickets,
                          "limit_quot" => $limit_quot,
                          "id_lenguage" => $lenguaje);

          $nIdQuot = InsertRec("crm_quot", $arrQuot);

          /* Registro de productos */
          if(isset($_POST['id_product'])) {

          foreach ($_POST['id_product'] as $key => $value) {

          $arrProduct = array(
                  "id_quot"=>$nIdQuot,
                  "id_produc"=>$_POST['id_product'][$key],
                  "type"=>str_replace(",","",$_POST['price_type'][$key]),
                  "price"=>str_replace(",","",$_POST['price'][$key]),
                  "quantity"=>$_POST['canti'][$key],
                  "itbms"=>$_POST['itbms'],
                  "total"=>str_replace(",","",$_POST['total_prod'][$key]),
                  "comentary"=>$_POST['des_pro'][$key],
                  "stat"=>1,
                  "log_user_register"=>$_SESSION['MR_USER_ID'],
                  "log_time"=>date("Y-m-d H:i:s"),
                  "id_tmp"=>$_POST['id_product_detail_tmp'][$key],
                  "type_product"=>$_POST['type_product'][$key],
                  "itbms_product"=>$_POST['itbms_product'][$key],
                  "type_detail"=>$_POST['detail_type'][$key]);

            $nIdPro = InsertRec("crm_quot_producs", $arrProduct);

          }

          }

          /* Registro de Servicios */
          if(isset($_POST['id_service'])) {

          foreach ($_POST['id_service'] as $key => $value) {

          $arrService = array(
                  "id_quot"=>$nIdQuot,
                  "id_service"=>$_POST['id_service'][$key],
                  "quantity"=>$_POST['cantidad'][$key],
                  "price"=>str_replace(",","",$_POST['price_serv'][$key]),
                  "total"=>str_replace(",","",$_POST['total_sercq'][$key]),
                  "stat"=>1,
                  "des_ser"=>$_POST['des_ser'][$key],
                  "log_user_register"=>$_SESSION['MR_USER_ID'],
                  "log_time"=>date("Y-m-d H:i:s"),
                  "id_tmp_ser"=>$_POST['id_tmp_serv'][$key]);

            $nIdServ = InsertRec("crm_quot_service", $arrService);

          }

          }

          if($nIdQuot > 0)
          {
              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cotizacion Registrada</strong>
                          </div>';

              /* Actualizar el ingreso */

              $arrUpentry = array(
                 "stat"=>4
              );

              UpdateRec("crm_entry", "id=".$id_entry, $arrUpentry);

              /*  casos para el status de la cotizacion e ingreso  */

              $stat_general = GetRecords("select stat from crm_entry where id = '".$_GET['id']."'");

              unset($sin_cotizacion); /* se destruye la variable, para que no este en memoria */

              switch($stat_general[0]['stat']):
                 case 3:
                   $sin_cotizacion = 1;
                   break;
                 case 4:
                   $cotizacion_creada = 1;
                   break;
                 case 5:
                   $cotizacion_enviada = 1;
                   break;
                 case 6:
                   $cotizacion_Archivada = 1;
                   break;
              endswitch;

              /* ################################################ */

              /* Actualizar de status los productos / servicios de las tablas temporales */

              $arrTmp = array(
                 "stat"=>2
              );

              $session_id = session_id();

              UpdateRec("crm_tmp_craner", "id_session='".$session_id."'", $arrTmp);
              UpdateRec("crm_tpm_service", "id_session='".$session_id."'", $arrTmp);

          }

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 21,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado una cotizacion ID: ".$nIdQuot.".",
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

          }

     $arrQuol = GetRecords("Select
                             crm_entry.id,
                             crm_entry.id_customer,
                             crm_entry.id_contact,
                             crm_entry.proyect_name,
                             crm_entry.proyect_locate,
                             crm_customers.legal_name,
                             crm_contact.name_contact,
                             crm_contact.last_name,
                             crm_contact.email,
                             users.real_name,
                             users.last_name as apellido,
                             master_stat.description,
                             crm_entry.log_time,
                             crm_entry.log_user_register,
                             crm_entry.number_tickets
                             from
                             crm_entry inner join crm_customers on crm_entry.id_customer = crm_customers.id
                                       inner join crm_contact on crm_entry.id_contact = crm_contact.id
                                       inner join users on crm_entry.log_user_register = users.id
                                       inner join master_stat on crm_entry.stat = master_stat.id_stat
                            where
                            crm_entry.id =".$_GET['id']);

      }

        if(isset($cotizacion_creada)){

        $arrQuotCrate = GetRecords("select * from crm_quot where id_entry = '".$_GET['id']."' and stat = 4");

    }

/* Variables segun el status */

    if (isset($cotizacion_creada)){

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
      $number_tickets = $arrQuotCrate[0]['number_tickets'];
      $limit_quot = $arrQuotCrate[0]['limit_quot'];
      $lenguaje = $arrQuotCrate[0]['id_lenguage'];

      }elseif(isset($sin_cotizacion)){

      $id_customer = $arrQuol[0]['id_customer'];
      $id_seller = $arrQuol[0]['log_user_register'];
      $id_contact = $arrQuol[0]['id_contact'];
      $id_tikete = $arrQuol[0]['id'];
      $proyect_name = $arrQuol[0]['proyect_name'];
      $proyect_locate = $arrQuol[0]['proyect_locate'];
      $number_tickets = $arrQuol[0]['number_tickets'];
      $contact_site = "";
      $description_charge = "";
      $dimensions = "";
      $radio_giro = "";
      $height = "";
      $weight_max = "";
      $email = $arrQuol[0]['email'];
      $perception_value_work = "";
      $id_seller = $arrQuol[0]['log_user_register'];
      $service_customer = "";
      $id_entry = $arrQuol[0]['id'];
      $comentary = "";
      $venta_gravable = "";
      $venta_no_gravable = "";
      $itbms = "";
      $total = "";
      $limit_quot = "";
      $lenguaje = "";}
      ####################################################
      ?>

	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="row">
                <div class="col-sm-12">
                	<form class="form-horizontal" data-validate="parsley" method="post" enctype="multipart/form-data">
                      <?php /* Fecha de creacion en el formulario */ ?>
                      <input type="hidden" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" name="date_form" readonly>
                      <?php //////////////////////////////////////// ?>
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <?php // Contar cotizaciones y registrar la version ?>
                          <?php  ?>
                          <?php $number_version = RecCount("crm_quot", "stat = 5 and id_entry =".$id_tikete); ?>
                          <span class="h4">Registro de Cotizacion - Version: <?php echo $number_version+1; ?> </span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                              <label class="col-lg-2 text-right control-label font-bold">Idioma</label>
                              <div class="col-lg-3">
                                  <select class="form-control" name="id_lenguage" required="required">
                                    <option value="">Español</option>
                                    <?PHP
                                    $arrCust = GetRecords("Select * from language where stat = 1");
                                    foreach ($arrCust as $key => $value) {
                                      $kinId = $value['id'];
                                      $legal_name = $value['name'];
                                    ?>
                                    <option value="<?php echo $kinId?>" <?php if($lenguaje == $kinId){ echo 'selected'; } ?> ><?php echo $legal_name?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group required">
                              <label class="col-lg-2 text-right control-label font-bold">Cliente</label>
                              <div class="col-lg-3">
                                  <select class="form-control" name="" disabled required="required">

                                    <?PHP
                                    $arrCust = GetRecords("Select * from crm_customers where stat = 1 and id=".$id_customer);
                                    foreach ($arrCust as $key => $value) {
                                      $kinId = $value['id'];
                                      $legal_name = $value['legal_name'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo $legal_name?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <input type="hidden" name="id_customer" value="<?php echo $id_customer;?>">
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Contacto</label>
                              <div class="col-lg-3">
                                  <select class="form-control" name="id_contact" disabled required="required">

                                    <?PHP
                                    $arrCust = GetRecords("Select * from crm_contact where stat = 1 and id=".$id_contact);
                                    foreach ($arrCust as $key => $value) {
                                      $kinId = $value['id'];
                                      $name_contact = $value['name_contact'];
                                      $last_name = $value['last_name'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo $name_contact.' '.$last_name;?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <input type="hidden" name="id_contact" value="<?php echo $id_contact;?>">
                              </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Tiquete</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $number_tickets; ?>" name="number_tickets" readonly>
                              <input type="hidden" class="form-control" value="<?php echo $id_tikete; ?>" name="id_entry" readonly>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Proyecto</label>
                            <div class="col-lg-3">

                              <input type="text" class="form-control" value="<?php echo $proyect_name; ?>" name="proyect_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Direccion del Proyecto</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" placeholder="Direccion del Proyecto" name="proyect_locate"><?php echo $proyect_locate; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Contacto en el Sitio</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" placeholder="Contacto en el Sitio" name="proyect_contact" value="<?php echo $contact_site;?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Descripcion de la carga</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" placeholder="Descripcion de la carga" name="description_charge"><?php echo $description_charge; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Dimensiones Mts(Metros)</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" placeholder="Dimenciones" name="dimensions" value="<?php echo $dimensions; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Radio de giro</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" placeholder="Radio de giro" name="turning_radius" value="<?php echo $radio_giro; ?>">
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Altura Mts(Metros)</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" placeholder="Altura" name="height" value="<?php echo $height; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Peso Maximo kg(Kilogramos)</label>

                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" placeholder="Peso Maximo" name="weight_max" value="<?php echo $weight_max;?>">
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Email</label>

                            <div class="col-lg-3">
                              <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Percepcion del valor del trabajo $ </label>
                            <div class="col-lg-3">

                              <textarea class="form-control" placeholder="Ubicacion del proyecto" name="perceptions_value_work"><?php echo $perception_value_work; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Vendedor</label>
                            <div class="col-lg-3">
                              <select class="form-control" name="id_seller" disabled required="required">

                                <?PHP
                                $arrCust = GetRecords("Select * from users where stat = 1 and id=".$id_seller);
                                foreach ($arrCust as $key => $value) {
                                  $kinId = $value['id'];
                                  $real_name = $value['real_name'];
                                  $last_name = $value['last_name'];
                                ?>
                                <option value="<?php echo $kinId?>"><?php echo $real_name.' '.$last_name;?></option>
                                <?php
                                }
                                ?>
                              </select>
                              <input type="hidden" name="id_seller" value="<?php echo $id_seller;?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Acuerdo de servicio al cliente</label>

                            <div class="col-lg-3">
                              <textarea class="form-control" placeholder="Acuerdo de servicio al cliente" name="service_customer"><?php echo $service_customer; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Limitada ?</label>
                            <div class="col-lg-3">
                              <label class="radio-inline"><input type="radio" <?php if($limit_quot == 1){ echo 'checked';} ?> name="limit_quot" value="1" >Si</label>
                              <label class="radio-inline"><input type="radio" <?php if($limit_quot == 2){ echo 'checked';} ?> name="limit_quot" value="2" >No</label>
                            </div>
                          </div>

                          <?php if(isset($sin_cotizacion)){ ?>
                          <a href="modal-product_quot.php" title=" Agregar Producto" data-toggle="ajaxModal" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar Productos</a>
                          <a href="modal-service_quot.php" title=" Agregar Servicio" data-toggle="ajaxModal" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar Servicios</a>
                          <?php } ?>
                          <?php if(isset($cotizacion_creada)){ ?>
                          <a href="moda-discar_quot.php?id=<?php echo $id?>" title=" Descartar Cotizacion" data-toggle="ajaxModal" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Descartar Cotizacion</a>
                          <?php } ?>
                          <!--<a href="modal-nota_call.php?id=<?php echo $id_entry?>" title=" Agregar Nota de llamada" data-toggle="ajaxModal" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-earphone"></i> Agregar Nota Llamada</a>-->
                          <a href="modal-nota_quot.php?id=<?php echo $id_entry?>" title=" Agregar Nota" data-toggle="ajaxModal" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pushpin"></i> Agregar Nota</a>
                          <a href="ver_notas.php?id=<?php echo $id_entry?>" class="btn btn-danger glyphicon glyphicon-pushpin"> Ver Notas</a>
                          <button name="save" type="submit" class="btn btn-sm btn-primary glyphicon glyphicon-floppy-disk" name="save"> Guardar</button>
                          <?php if (isset($cotizacion_creada)): ?>
                          <?php $id_coti_creada = $arrQuotCrate[0]['id']; ?>
                          <a href="convert_pdf.php?id=<?php echo $id_coti_creada;?>" target="_blank" title="PDF" class="btn btn-sm btn-primary"><i class="fa fa-file-pdf-o"></i> PDF</a>
                          <?php endif; ?>
                          <?php if(isset($cotizacion_creada)){ ?>

                          <?php include('include_product.php'); ?>
                          <?php //include('include_service.php'); ?>
                          <?php }elseif(isset($sin_cotizacion)){ ?>
                            <div id="miselector"></div>
                            <div id="servicios"></div>
                          <?php } ?>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold"></label>
                            <div class="col-lg-3">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Comentarios</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" style="height:150px" placeholder="Comentarios" name="comentary"><?php echo $comentary; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 text-right control-label font-bold">Venta Gravable $</label>
                              <div class="col-lg-3">
                                <input id="productos_total" readonly name="sale_gravable" value="<?php echo $venta_gravable; ?>" class="form-control" style="margin:5px;" Width="70px" onkeyup="agregar_numero();format(this)" onchange="format(this)"/>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Venta no gravable $</label>
                              <div class="col-lg-3">
                                <input id="total_serv_hidden" readonly name="sale_no_gravable" value="<?php echo $venta_no_gravable;?>" class="form-control" style="margin:5px;" Width="70px" onkeyup="agregar_numero();format(this)" onchange="format(this)"/>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">itbms $</label>
                              <div class="col-lg-3">
                                <input id="itbms_total_final" readonly name="itbms" class="form-control" value="<?php echo $itbms; ?>" style="margin:5px;" Width="70px" onkeyup="agregar_numero();format(this)" onchange="format(this)"/>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Total $</label>
                              <div class="col-lg-3">
                                <input id="txt4" class="form-control" type="hidden" style="margin:5px;" Width="70px" onkeyup="format(this)"/>
                                <input id="total_coti" name="total" readonly class="form-control" value="<?php echo $total; ?>" style="margin:5px;" Width="70px" onkeyup="format(this)"/>
                              </div>
                            </div>
                          </div>
                          <script type="text/javascript">
                            function format(input) {
                            var num = input.value.replace(/\,/g, '');
                            var decimales = "";
                            if (num.indexOf(".") >= 0) {
                              decimales = "." + num.split(".")[1].substring(0,2); // sólo nos quedamos con los dos primeros decimales
                              num = Math.floor(num); // redondeamos hacia abajo para quedarnos con la parte entera
                            }
                            if (!isNaN(num)) {
                              num = num.toString().split('').reverse().join('').replace(/(?=\d*\,?)(\d{3})/g, '$1,');
                              // añadir los decimales al final!
                              num = num.split('').reverse().join('').replace(/^[\,]/, '') + decimales;
                              input.value = num;
                            }else{
                              alert('Solo se permiten numeros');
                              input.value = input.value.replace(/[^\d\,\.]*/g, '');
                            }
                            document.getElementById("total_coti").value = ((parseFloat(document.getElementById("productos_total").value.replace(/,/g, '')) || 0) +
                                                                          (parseFloat(document.getElementById("total_serv_hidden").value.replace(/,/g, '')) || 0) +
                                                                          (parseFloat(document.getElementById("itbms_total_final").value.replace(/,/g, '')) || 0)).toFixed(2);;
                            }
                          </script>
                          <script language="javascript" src="http://code.jquery.com/jquery-1.2.6.min.js"></script>
                          <?php //////////////////// productos ////////////////// ?>
                          <script language="javascript">
                          function cargar(id, is_product){
                            $("#miselector").load("products_quolations.php", { id: id,
                                                                               is_product: is_product});
                          }
                          </script>
                          <script language="javascript">
                          function service(id, is_service){
                            $("#miselector").load("products_quolations.php", { id: id,
                                                                               is_service: is_service});
                          }
                          </script>
                          <script language="javascript">
                          function delet(id,delet){
                            $("#miselector").load("products_quolations.php", { id: id,
                                                                               delet : delet });
                          }
                          </script>
                          <?php  /////////////////// servicios /////////////////// ?>
                          <script language="javascript">
                          function cargar_service(id){
                            $("#servicios").load("services_quolations.php", { id: id });
                          }
                          </script>
                          <script language="javascript">
                          function delet_service(id,service){
                            $("#servicios").load("services_quolations.php", { id: id,
                                                                               service : service });
                          }
                          </script>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <?php if (isset($cotizacion_creada)): ?>
                          <button type="submit" name="send_quot" class="btn btn-success btn-s-xs glyphicon glyphicon-send"> Enviar Cotizacion</button>
                          <input type="hidden" name="id_coti_creada" value="<?php echo $id_coti_creada;?>">
                          <?php endif; ?>
                        </footer>
                      </section>
                    </form>
                  </div>
                </div>
            </section>
        </section>
    </section>
<?php
	include("footer.php");
?>
