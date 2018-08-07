<?php
ob_start();
session_start();
$hideLeft = true;
include("include/config.php");
include("include/defs.php");
$loggdUType = current_user_type();

include("header.php");

  if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     $where=" WHERE (1=1)";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where=" and crm_entry.date_form >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and crm_entry.date_form <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }

     ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Principal</span>
               </header>

               <div class="panel-body">
                 <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
                 <?php
                       if(isset($message) && $message !=""){
                           echo $message;
                         }
                 ?>
                 <div class="row">
                   <form method="post" action="" novalidate>
                     <div class="row wrapper">
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                           <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                         </div>
                       </div>
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                           <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                         </div>
                       </div>
                       <div class="col-sm-3 m-b-xs">
                         <div class="input-group">
                           <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                         </div>
                       </div>
                     </div>
                   </form>
                  <div class="col-sm-12">
                    <?php

                    $arrCreadas = GetRecords("Select
                                            crm_entry.id,
                                            crm_entry.number_tickets,
                                            crm_entry.date_form,
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
                                           $where
                                           and crm_entry.stat in(3,4,5)");

                   $arrFact = GetRecords("Select
                                           crm_entry.id,
                                           crm_entry.number_tickets,
                                           crm_entry.date_form,
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
                                           $where
                                           and crm_entry.stat in(6,8)");

                     ?>
                     <br>
                     <div class="col-md-6 b-b b-r">
                     <span class="h4">COTIZADO</span>
                     <table class="table table-striped b-t b-light" data-ride="datatables">
                         <thead>
                           <tr>
                             <th>FECHA CREACION</th>
                             <th># TIQUETE</th>
                             <th>NOMBRE PROYECTO</th>
                             <th>ACCIONES</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?PHP
                           foreach ($arrCreadas as $key => $value) {
                           ?>
                         <tr>
                             <td class="tbdata"> <?php echo $value['date_form']?> </td>
                             <td class="tbdata"> <?php echo $value['number_tickets']?> </td>
                             <td class="tbdata"> <?php echo $value['proyect_name']?> </td>
                             <td class="tbdata">
                               <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 3){ ?>
                               <a href="register_quolations.php?id=<?php echo $value['id']?>" title="Crear Cotizacion" class="btn btn-sm btn-icon btn-success"><i class="glyphicon glyphicon-plus"></i></a>
                               <a href="modal-status_approval.php?id=<?php echo $value['id']?>" title="Aprobar" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-warning"><i class="glyphicon glyphicon-ok"></i></a>
                               <?php } ?>
                               <a href="modal-nota_quot.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" title="Agregar nota" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-plus"></i></a>

                               <a href="ver_notas.php?id=<?php echo $value['id']?>" title="Ver notas" class="btn btn-sm btn-icon btn-info"><i class="glyphicon glyphicon-pushpin"></i></a>

                               <a href="view_quotations.php?id=<?php echo $value['id']?>" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                               <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 4){ ?>
                               <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $value['stat'] == 8){ ?>
                               <a href="approval_quot.php?id=<?php echo $value['id']?>" title="Ver y modificar Cotizacion" class="btn btn-sm btn-icon btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                               <?php } ?>
                               <a href="modal-status_invoice.php?id=<?php echo $value['id']?>" title="Pasar a facturacion" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-default"><i class="glyphicon glyphicon-ok"></i></a>
                               <?php } ?>
                               <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 3 || $_SESSION['MR_USER_ROLE'] == 4){ ?>
                               <a href="modal-delete-qualition.php?id=<?php echo $value['id']?>" title="Eliminar Ingreso" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                               <?php } ?>
                             </td>
                         </tr>
                         <?php } ?>
                         </tbody>
                       </table>
                  </div>
                  <div class="col-md-6 b-b b-r">
                  <span class="h4">CONCRETADO</span>
                  <table class="table table-striped b-t b-light" data-ride="datatables">
                      <thead>
                        <tr>
                          <th>FECHA CREACION</th>
                          <th># TIQUETE</th>
                          <th>NOMBRE PROYECTO</th>
                          <th>ACCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?PHP
                        foreach ($arrFact as $key => $value) {
                        ?>
                      <tr>
                        <td class="tbdata"> <?php echo $value['date_form']?> </td>
                        <td class="tbdata"> <?php echo $value['number_tickets']?> </td>
                        <td class="tbdata"> <?php echo $value['proyect_name']?> </td>
                        <td class="tbdata">
                          <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 3){ ?>
                          <a href="register_quolations.php?id=<?php echo $value['id']?>" title="Crear Cotizacion" class="btn btn-sm btn-icon btn-success"><i class="glyphicon glyphicon-plus"></i></a>
                          <a href="modal-status_approval.php?id=<?php echo $value['id']?>" title="Aprobar" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-warning"><i class="glyphicon glyphicon-ok"></i></a>
                          <?php } ?>
                          <a href="modal-nota_quot.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" title="Agregar nota" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-plus"></i></a>

                          <a href="ver_notas.php?id=<?php echo $value['id']?>" title="Ver notas" class="btn btn-sm btn-icon btn-info"><i class="glyphicon glyphicon-pushpin"></i></a>

                          <a href="view_quotations.php?id=<?php echo $value['id']?>" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                          <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 4){ ?>
                          <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $value['stat'] == 8){ ?>
                          <a href="approval_quot.php?id=<?php echo $value['id']?>" title="Ver y modificar Cotizacion" class="btn btn-sm btn-icon btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                          <?php } ?>
                          <a href="modal-status_invoice.php?id=<?php echo $value['id']?>" title="Pasar a facturacion" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-default"><i class="glyphicon glyphicon-ok"></i></a>
                          <?php } ?>
                          <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 3 || $_SESSION['MR_USER_ROLE'] == 4){ ?>
                          <a href="modal-delete-qualition.php?id=<?php echo $value['id']?>" title="Eliminar Ingreso" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
               </div>
                  </div>

                </div>
              <?php endif; ?>
               </div>
             </section>
           </section>
       </section>
   </section>

   <script src="js/bootstrap.js"></script>
  <script src="js/app.js"></script>
   <script src="js/datepicker/bootstrap-datepicker.js"></script>
   <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="js/chosen/chosen.jquery.min.js"></script>
   <!-- parsley -->
 <script src="js/parsley/parsley.min.js"></script>
 <script src="js/parsley/parsley.extend.js"></script>
 <script src="js/datatables/jquery.dataTables.min.js"></script>
 <script src="js/datatables/dataTables.buttons.min.js"></script>
 <script src="js/datatables/buttons.flash.min.js"></script>
 <script src="js/datatables/jszip.min.js"></script>
 <script src="js/datatables/pdfmake.min.js"></script>
 <script src="js/datatables/vfs_fonts.js"></script>
 <script src="js/datatables/buttons.html5.min.js"></script>
 <script src="js/datatables/buttons.print.min.js"></script>
 <script src="js/datatables/demo.js"></script>
   <script src="js/app.plugin.js"></script>
   <script src="js/main.js"></script>
