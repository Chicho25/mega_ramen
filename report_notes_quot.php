<?php
ob_start();
session_start();
$hideLeft = true;
include("include/config.php");
include("include/defs.php");
$loggdUType = current_user_type();
$Reportclass ="class='active'";
$regReportnotes ="class='active'";

include("header.php");

  if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     $where="and cn.log_time >= CURDATE()";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where=" and cn.log_time >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }else {
       $date_from = date('Y-m-d');
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and cn.log_time <= '".$_POST['date_to']." 23:59:59'";
        //$where_cdc.=" and cqp.date_lost <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }else {
       $date_to = date('Y-m-d');
     }

     ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Perdidas de Notas.</span>
               </header>

               <div class="panel-body">
                 <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
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
                       <?php /* ?>
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                             <select class="chosen-select form-control" name="id_stat" require>
                                    <option value="">--- Tipo Nota ---</option>
                                    <option value="0">TODOS</option>
                                    <?PHP
                                    $arrStat = GetRecords("select * from master_stat where stat = 1 and id in(13,14)");
                                    foreach ($arrStat as $key => $value) {
                                    $kinId = $value['id'];
                                    $kinDesc = $value['description'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo utf8_encode($kinDesc)?></option>
                                    <?php } ?>
                           </select>
                         </div>
                       </div>
                       */ ?>
                       <div class="col-sm-3 m-b-xs">
                         <div class="input-group">
                           <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                         </div>
                       </div>
                     </div>
                   </form>
               <span class="h4">Notas</span>
               <div class="col-sm-12">
                 <div class="col-md-12 b-b b-r">
                  <table class="table table-striped b-t b-light" data-ride="datatables">
                      <thead>
                        <tr>
                          <th>N# COTIZACION</th>
                          <th>CLIENTE</th>
                          <th>NOMBRE PROYECTO</th>
                          <th>TRABAJO REALIZAR</th>
                          <th>NOTA</th>
                          <th>FECHA</th>
                          <th>USUARIO</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?PHP
                      $arrIncidencias = GetRecords("select
                                                    ce.number_tickets,
                                                    ce.proyect_name,
                                                    ce.work_do,
                                                    cn.conten_note,
                                                    cn.log_time,
                                                    cc.legal_name,
                                                    u.real_name,
                                                    u.last_name
                                                    from crm_notes cn inner join crm_entry ce on cn.id_entry = ce.id
                                                    				          inner join users u on cn.log_user_register = u.id
                                                                      inner join crm_customers cc on cc.id = ce.id_customer
                                                                      where (1=1)
                                                                      $where");

                        foreach ($arrIncidencias as $key => $value) {
                        ?>
                      <tr>
                          <td class="tbdata"> <?php echo utf8_encode($value['number_tickets'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['legal_name'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['proyect_name'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['work_do'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['conten_note'])?> </td>
                          <td class="tbdata"> <?php echo $value['log_time']?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['real_name'].' '.$value['last_name'])?> </td>
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
