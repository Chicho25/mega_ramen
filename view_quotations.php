<?php
    ob_start();
    session_start();
    $quotclass ="class='active'";
    $regquotclass ="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['note'], $_POST['id_entry_nota'])){

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

     if (isset($_POST['switch'])) {

       $array_switch = array("id_last_craner" => $_POST['id_craner'],
                             "comentary_last_craner" => $_POST['note_switch']);

       $update_number = UpdateRec("crm_quot", "id=".$_POST['id_quot'], $array_switch);

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Cambio Realizado con exito</strong>
                   </div>';


     }

     if (isset($_POST['n_factura'])) {

       $array_n_invoice = array("n_invoice" => $_POST['n_factura']);

       $update_number = UpdateRec("crm_quot", "id=".$_POST['id'], $array_n_invoice);

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Numero de cotizacion registrado</strong>
                   </div>';

     }

      $arrEntry = GetRecords("Select * from crm_entry where id =".$_GET['id']);?>

	    <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                  <span class="h4">Ingreso / Cotizaciones</span>
                </header>
                <div class="panel-body form-horizontal">
                    <?php if(isset($_GET['enviado'])){
                          $message = '<div class="alert alert-success">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Cotizacion Enviada</strong>
                                      </div>';
                          }elseif (isset($_GET['guardado'])){
                          $message = '<div class="alert alert-success">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Cotizacion Cambios Realizados</strong>
                                      </div>';
                          }

                              if(isset($message) && $message !=""){
                                  echo $message;
                                }?>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold"># Ticket</label>
                        <div class="col-lg-4">
                          <input type="text" class="form-control" value="<?php echo $arrEntry[0]['number_tickets']; ?>" name="date_form" readonly>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Termino</label>
                        <div class="col-lg-4">
                          <label class="radio-inline"><input disabled type="radio" <?php if($arrEntry[0]['term'] == 1){ echo 'checked';} ?> name="term" value="1" >Largo Termino</label>
                          <label class="radio-inline"><input disabled type="radio" <?php if($arrEntry[0]['term'] == 2){ echo 'checked';} ?> name="term" value="2" >Taxi</label>
                        </div>
                      </div>
                      <div class="form-group required">
                          <label class="col-lg-4 text-right control-label font-bold">Medio de Comunicacion</label>
                          <div class="col-lg-4">
                              <select class="form-control" name="id_type_media" disabled>
                                <option value="">Seleccionar</option>
                                <?PHP
                                $arrKindMeetings = GetRecords("Select * from crm_type_media where stat = 1");
                                foreach ($arrKindMeetings as $key => $value) {
                                  $kinId = $value['id'];
                                  $kinDesc = $value['description'];
                                ?>
                                <option value="<?php echo $kinId?>" <?php if ($arrEntry[0]['id_type_media'] == $kinId){ echo 'selected'; } ?> ><?php echo $kinDesc?></option>
                                <?php
                                }
                                ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group required">
                          <label class="col-lg-4 text-right control-label font-bold">Pais</label>
                          <div class="col-lg-4">
                              <select class="form-control" name="id_country" disabled>
                                <option value="">Seleccionar</option>
                                <?PHP
                                $arrKindMeetings = GetRecords("Select * from country where stat = 1");
                                foreach ($arrKindMeetings as $key => $value) {
                                  $kinId = $value['id'];
                                  $kinDesc = $value['description'];
                                ?>
                                <option value="<?php echo $kinId?>" <?php if ($arrEntry[0]['id_country'] == $kinId){ echo 'selected'; } ?> ><?php echo $kinDesc?></option>
                                <?php
                                }
                                ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Fecha</label>
                        <div class="col-lg-4">
                          <input type="text" class="form-control" value="<?php echo $arrEntry[0]['date_form']; ?>" name="date_form" readonly>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Cliente</label>
                        <div class="col-lg-4">
                          <select class="form-control" name="id_customer" disabled>
                            <option value="">Seleccionar</option>
                            <?PHP
                            $arrKindMeetings = GetRecords("Select * from crm_customers where stat = 1");
                            foreach ($arrKindMeetings as $key => $value) {
                              $kinId = $value['id'];
                              $trade_name = $value['trade_name'];
                              $legal_name = $value['legal_name'];
                            ?>
                            <option value="<?php echo $kinId?>" <?php if ($arrEntry[0]['id_customer'] == $kinId){ echo 'selected'; } ?>><?php echo $trade_name.' '.$legal_name?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Contacto</label>
                        <div class="col-lg-4">
                          <select class="form-control" name="" disabled>
                            <?php $arrContact = GetRecords("Select * from crm_contact where stat = 1");
                            foreach ($arrContact as $key => $value) {
                              $kinId = $value['id'];
                              $name_contact = $value['name_contact'];
                              $last_name = $value['last_name'];?>
                            <option value="<?php echo $kinId?>" <?php if ($arrEntry[0]['id_contact'] == $kinId){ echo 'selected'; } ?>><?php echo $name_contact.' '.$last_name?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Nombre del Proyecto</label>
                        <div class="col-lg-4">
                          <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="proyect_name" readonly value="<?php echo $arrEntry[0]['proyect_name']; ?>">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Trabajo a Realizar</label>
                        <div class="col-lg-4">
                          <textarea class="form-control" placeholder="Trabajo a Realizar" name="work_do" readonly><?php echo $arrEntry[0]['work_do']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Distancia Horizontal Aproximada</label>
                        <div class="col-lg-4">
                          <input type="number" class="form-control" name="width_aprox" readonly value="<?php echo $arrEntry[0]['width_aprox']; ?>">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Altura Aproximada</label>
                        <div class="col-lg-4">
                          <input type="number" step="any" class="form-control" readonly value="<?php echo $arrEntry[0]['height_aprox']; ?>">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Peso</label>
                        <div class="col-lg-4">
                          <input type="number" step="any" class="form-control" readonly value="<?php echo $arrEntry[0]['weight_aprox']; ?>">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Ubicacion del proyecto</label>
                        <div class="col-lg-4">
                          <textarea class="form-control" readonly ><?php echo $arrEntry[0]['proyect_locate']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Tipo de trabajo</label>
                        <div class="col-lg-4">
                          <label class="radio-inline"><input disabled type="radio" name="id_type_work" value="1" <?php if($arrEntry[0]['id_type_work'] == 1){ echo 'checked';} ?> >Por Hora</label>
                          <label class="radio-inline"><input disabled type="radio" name="id_type_work" value="2" <?php if($arrEntry[0]['id_type_work'] == 2){ echo 'checked';} ?>>Por proyecto</label>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Se puede inspeccionar?</label>
                        <div class="col-lg-4">
                          <label class="radio-inline"><input disabled type="radio" name="inspection" value="1" <?php if($arrEntry[0]['inspection'] == 1){ echo 'checked';} ?>>Si</label>
                          <label class="radio-inline"><input disabled type="radio" name="inspection" value="0" <?php if($arrEntry[0]['inspection'] == 0){ echo 'checked';} ?>>No</label>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-lg-4 text-right control-label font-bold">Notas</label>
                        <div class="col-lg-4">
                          <a href="modal-nota_quot.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" class="btn btn-primary glyphicon glyphicon-pushpin"> Agregar Nota</a>
                          <a href="ver_notas.php?id=<?php echo $value['id']?>" class="btn btn-danger glyphicon glyphicon-pushpin"> Ver Notas</a>

                        </div>
                      </div>
                    </div>
                    <footer class="panel-footer text-right bg-light lter">
                      <div style="text-align: left;">
                        <h2>Cotizaciones</h2>
                      </div>
                      <?php $arQuots = GetRecords("SELECT * FROM crm_quot WHERE id_entry =".$_GET['id']); ?>
                      <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>FECHA DE ENVIO</th>
                              <th>VERSION</th>
                              <th>TOTAL</th>
                              <th>VENDEDOR</th>
                              <th>ESTATUS</th>
                              <th>ACIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            foreach ($arQuots as $key => $value) {
                            ?>
                          <tr>
                              <td style="text-align: left;"> <?php echo $value['date_send']?> </td>
                              <td style="text-align: left;"> <?php echo $arrEntry[0]['number_tickets'].' V-'.$value['version']?> </td>
                              <td style="text-align: left;"> <?php echo $value['total']?> </td>
                              <td style="text-align: left;">
                                <?php
                                $arrCust = GetRecords("Select * from users where stat = 1 and id=".$value['id_seller']);
                                foreach ($arrCust as $key => $valueUser) {
                                 echo utf8_encode($valueUser['real_name']).' '.utf8_encode($valueUser['last_name']);?>
                                <?php } ?>
                              </td>
                              <td style="text-align: left;">
                                <?php
                                $arrStat = GetRecords("Select * from master_stat where stat = 1 and id=".$value['stat']);
                                foreach ($arrStat as $key => $valueStat) {
                                 echo utf8_encode($valueStat['description']);?>
                                <?php } ?>
                              </td>
                              <td style="text-align: left;">
                                <a href="view_quotations_detail.php?id=<?php echo $value['id']?>" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <?php if ($value['stat'] != 11){ ?>
                                <a href="edit_quot.php?id=<?php echo $_GET['id']?>&id_quot=<?php echo $value['id']?>" title="Editar Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                <?php } ?>
                                <?php if ($value['id_lenguage']==1) { ?>
                                <a href="convert_pdf_en.php?id=<?php echo $value['id']?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-pdf-o"></i> PDF</a>                                
                                <?php }else{ ?>
                                <a href="convert_pdf.php?id=<?php echo $value['id']?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                <?php } ?>
                                <?php if ($value['stat'] != 11){ ?>
                                <?php if ($value['id_lenguage']==1) { ?>
                                <a href="mail_en.php?id=<?php echo $value['id']?>&locat_view=1" class="btn btn-success btn-s-xs glyphicon glyphicon-send"> Enviar</a>                                
                                <?php }else{ ?>
                                <a href="mail.php?id=<?php echo $value['id']?>&locat_view=1" class="btn btn-success btn-s-xs glyphicon glyphicon-send"> Enviar</a>
                                <?php } ?>
                                <?php }  ?>
                                <a href="modal_n_factura.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" class="btn btn-warning btn-s-xs fa fa-asterisk"> N# Factura</a>
                                <?php if ($value['stat'] != 11){ ?>
                                <a href="modal-swich.php?id=<?php echo $value['id']?>&id_grua=<?php echo $value['id_last_craner'];?>" data-toggle="ajaxModal" class="btn btn-danger btn-s-xs glyphicon glyphicon-random"> Cambio</a>
                                <a href="closed_quot.php?id=<?php echo $_GET['id']?>&id_quot=<?php echo $value['id']?>" title="Cerrar Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-lock"></i></a>

                                <?php } ?>
                              </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                  </footer>
              </section>
            </section>
        </section>
    </section>
<?php
	include("footer.php");
?>
