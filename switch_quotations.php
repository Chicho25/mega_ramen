<?php
    ob_start();
    session_start();
    $quotclass ="class='active'";
    $canquotclass ="class='active'";

    if (isset($_SESSION['contact_name']) || isset($_SESSION['id_contact']) || isset($_SESSION['cliente_name']) || isset($_SESSION['id_cliente'])) {
        unset($_SESSION['contact_name']);
        unset($_SESSION['id_contact']);
        unset($_SESSION['cliente_name']);
        unset($_SESSION['id_cliente']);
    }

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

     if (isset($_POST['id_entry'], $_POST['billing'])){

       $arrStatus = array("stat"=>6);

       UpdateRec("crm_entry", "id=".$_POST['id_entry'], $arrStatus);

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> Se paso a facturacion!</strong>
                   </div>';
     }

     if (isset($_POST['id_entry'], $_POST['delete'])){

       $arrStatus = array("stat"=>7);

       UpdateRec("crm_entry", "id=".$_POST['id_entry'], $arrStatus);

       $message = '<div class="alert alert-danger">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> Se elimino del sistema!</strong>
                   </div>';
     }

     if (isset($_POST['id_entry'], $_POST['approb'])){

       $arrStatus = array("stat"=>8);

       UpdateRec("crm_entry", "id=".$_POST['id_entry'], $arrStatus);

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>El ingreso fue aprobado!</strong>
                   </div>';
     }

    //$where = "where (1=1)";

    // condiciones segun el tipo de rol de usuario

    $where = "where (1=1)
              and crm_quot.id_last_craner <> 0 ";

     if(isset($_POST['id_status']) && $_POST['id_status'] != "")
     {
        $where.=" and crm_entry.stat = ".$_POST['id_status']." ";
        $id_status = $_POST['id_status'];
     }
     if(isset($_POST['id_seller']) && $_POST['id_seller'] != "")
     {
        $where.=" and  crm_entry.log_user_register = '".$_POST['id_seller']."'";
        $id_seller = $_POST['id_seller'];
     }
     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where.=" and crm_entry.date_form >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and crm_entry.date_form <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }

    if(isset($_POST['n_tiquete']) && $_POST['n_tiquete'] != "")
    {
       $where.=" and crm_entry.number_tickets = ".$_POST['n_tiquete']."";
       $n_tiquete = $_POST['n_tiquete'];
    }

    if(isset($_POST['name_proyect']) && $_POST['name_proyect'] != "")
    {
       $where.=" and crm_entry.proyect_name like '%".$_POST['name_proyect']."%'";
       $name_proyect = $_POST['name_proyect'];
    }

       $arrEntry = GetRecords("Select
                               crm_entry.id,
                               crm_entry.number_tickets,
                               crm_entry.proyect_name,
                               crm_customers.legal_name,
                               crm_contact.name_contact,
                               crm_contact.last_name,
                               users.real_name,
                               users.last_name as apellido,
                               master_stat.description,
                               crm_entry.log_time,
                               crm_entry.stat
                               from
                               crm_entry inner join crm_customers on crm_entry.id_customer = crm_customers.id
                                         inner join crm_contact on crm_entry.id_contact = crm_contact.id
                                         inner join users on crm_entry.log_user_register = users.id
                                         inner join master_stat on crm_entry.stat = master_stat.id_stat
                                         inner join crm_quot on crm_quot.id_entry = crm_entry.id
                              $where
                              group by
                              crm_entry.id,
                              crm_entry.number_tickets,
                              crm_entry.proyect_name,
                              crm_customers.legal_name,
                              crm_contact.name_contact,
                              crm_contact.last_name,
                              users.real_name,
                              users.last_name,
                              master_stat.description,
                              crm_entry.log_time,
                              crm_entry.stat"); ?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de cambio de equipo <?php //echo $_POST['fecha_nota'].' '.$_POST['hora']; ?></span>
                </header>
                <div class="panel-body">
                  <?php

                  if(isset($_GET['enviado'])){
                    $message = '<div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>Cotizacion Enviada</strong>
                                </div>';
                              }

                        if(isset($message) && $message !=""){
                            echo $message;
                          }
                  ?>
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                              <select class="chosen-select form-control" name="id_status">
                                <option value="">--------Status-------</option>
                                <?PHP
                                $arrStat = GetRecords("select * from master_stat where stat = 1 and id_stat not in(1,2,6,7)");
                                foreach ($arrStat as $key => $value) {
                                  $kinId = $value['id_stat'];
                                  $kinDesc = $value['description'];
                                ?>
                                <option value="<?php echo $kinId?>" <?php if(isset($id_status) && $id_status == $kinId){ echo 'selected';} ?>><?php echo utf8_encode($kinDesc)?></option>
                                <?php
                              }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-2 m-b-xs">
                            <div class="input-group">
                                <select class="chosen-select form-control" name="id_seller">
                                  <option value="">--------Vendedor-------</option>
                                  <option value="">Seleccionar</option>
                                  <?PHP
                                  $arrSell = GetRecords("select * from users where stat = 1 and type_user = 3");
                                  foreach ($arrSell as $key => $value) {
                                    $kinId = $value['id'];
                                    $name = $value['real_name'];
                                    $last_name = $value['last_name'];
                                  ?>
                                  <option value="<?php echo $kinId?>" <?php if(isset($id_seller) && $id_seller == $kinId){ echo 'selected';} ?>><?php echo $name.' '.$last_name;?></option>
                                  <?php
                                }
                                  ?>
                                </select>
                              </div>
                            </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" class="input-s input-sm form-control" value="<?php if(isset($n_tiquete)){ echo $n_tiquete;}?>" name="n_tiquete" placeholder="# Tiquete">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name_proyect)){ echo $name_proyect;}?>" name="name_proyect" placeholder="Proyecto">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                            </div>
                          </div>
                      </div>
                    </form>
                    <div class="table-responsive">
                      <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th># TIQUETE</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>NOMBRE CLIENTE</th>
                              <th>NOMBRE CONTACTO</th>
                              <th>VENDEDOR</th>
                              <th>FECHA CREACION</th>
                              <th>ESTATUS</th>
                              <th>ACIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            foreach ($arrEntry as $key => $value) {
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['number_tickets']?> </td>
                              <td class="tbdata"> <?php echo $value['proyect_name']?> </td>
                              <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                              <td class="tbdata"> <?php echo $value['name_contact'].' '.$value['last_name']?> </td>
                              <td class="tbdata"> <?php echo $value['real_name'].' '.$value['apellido']?> </td>
                              <td class="tbdata"> <?php echo $value['log_time']?> </td>
                              <td class="tbdata"> <?php echo utf8_encode($value['description'])?> </td>
                              <td>
                                <a href="modal-nota_quot.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" title="Agregar nota" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                                <a href="ver_notas.php?id=<?php echo $value['id']?>" title="Ver notas" class="btn btn-sm btn-icon btn-info"><i class="glyphicon glyphicon-pushpin"></i></a>
                                <a href="view_quot_switch.php?id=<?php echo $value['id']?>" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                              </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
              </section>
            </section>
        </section>
    </section>

<?php
	include("footer.php");
?>
