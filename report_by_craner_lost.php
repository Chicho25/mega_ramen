<?php
ob_start();
session_start();
$hideLeft = true;
include("include/config.php");
include("include/defs.php");
$loggdUType = current_user_type();
$Reportclass ="class='active'";
$perdidadeporcraclass ="class='active'";

include("header.php");

  if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     if($_SESSION['MR_USER_ID'] != 1 && $_SESSION['MR_USER_ID'] != 8 && $_SESSION['MR_USER_ID'] != 13 && $_SESSION['MR_USER_ID'] != 17)
        {
             header("Location: index.php");
             exit;
        }

     $where="and cqp.date_lost >= CURDATE()";
     //$where_cdc=" and crd.insert_date = CURDATE()";
     $where_craner="";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where="and cqp.date_lost >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and cqp.date_lost <= '".$_POST['date_to']." 23:59:59'";
        //$where_cdc.=" and cqp.date_lost <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }
     if (isset($_POST['id_craner']) && $_POST['id_craner'] != "") {

        $where_craner=" and cc.id = '".$_POST['id_craner']."'";
     }


     ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Perdidas por gruas.</span>
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
                       <div class="col-sm-4 m-b-xs">
                         <div class="input-group">
                             <select class="chosen-select form-control" name="id_craner" require>
                                    <option value="">-------- Gruas -------</option>
                                    <option value="0">TODOS LOS EQUIPOS</option>
                                    <?PHP
                                    $arrStat = GetRecords("select * from crm_craner where stat = 1 and id not in(34,9,24,29,33,25,27,26,28,42)");
                                    foreach ($arrStat as $key => $value) {
                                    $kinId = $value['id'];
                                    $kinDesc = $value['name_craner'];
                                    ?>
                                    <option value="<?php echo $kinId?>" <?php if(isset($_POST['id_craner']) && $_POST['id_craner'] == $kinId){ echo 'selected';} ?>><?php echo utf8_encode($kinDesc)?></option>
                                    <?php } ?>
                           </select>
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

                    $arrEntry = GetRecords("select
                                            tc.id,
                                            tc.descriptions,
                                            sum((cqp.total)) as monto,
                                            count(tc.descriptions) as cantidad_equipo
                                            from
                                            crm_quot_producs cqp inner join crm_quot cq on cqp.id_quot = cq.id
                                                                 inner join crm_craner cc on cqp.id_produc = cc.id
                                                                 inner join type_craner tc on cc.id_type_craner = tc.id
                                                                 inner join crm_entry ce on ce.id = cq.id_entry
                                            where
                                            cqp.stat = 12
                                            and
                                            cq.id = (select max(id) from crm_quot where id_entry = ce.id)
                                            $where
                                            $where_craner
                                            group by
                                            tc.descriptions,
                                            tc.id");

                    $total_montos = GetRecords("select
                                                sum((cqp.total)) as result
                                                from
                                                crm_quot_producs cqp inner join crm_quot cq on cqp.id_quot = cq.id
                                                                     inner join crm_craner cc on cqp.id_produc = cc.id
                                                                     inner join type_craner tc on cc.id_type_craner = tc.id
                                                                     inner join crm_entry ce on ce.id = cq.id_entry
                                                where
                                                cqp.stat = 12
                                                and
                                                cq.id = (select max(id) from crm_quot where id_entry = ce.id)
                                                $where
                                                $where_craner");

                    $total_equipo = GetRecords("select
                                                count(tc.descriptions) as total_cantidad_equipo
                                                from
                                                crm_quot_producs cqp inner join crm_quot cq on cqp.id_quot = cq.id
                                                                     inner join crm_craner cc on cqp.id_produc = cc.id
                                                                     inner join type_craner tc on cc.id_type_craner = tc.id
                                                                     inner join crm_entry ce on ce.id = cq.id_entry
                                                where
                                                cqp.stat = 12
                                                and
                                                cq.id = (select max(id) from crm_quot where id_entry = ce.id)
                                                $where
                                                $where_craner");

                    /*$arrLongTaxi = GetRecords("select (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 0) as no_fefinido,
                                                      (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 1) as largo_termino,
                                                      (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 2) as taxi");*/

                     ?>
                     <br>
                     <div class="col-md-12 b-b b-r">
                     <span class="h4">POR SEGMENTOS</span>
                     <table class="table table-striped b-t b-light" data-ride="datatables">
                         <thead>
                           <tr>
                             <th>SEGMENTO</th>
                             <th>MONTOS</th>
                             <th>PORCENTAJES</th>
                             <th>CANTIDAD DE EQUIPOS</th>
                             <th>PORCENTAJES DE EQUIPOS</th>
                             <th>DETALLES</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?PHP
                           $monto = 0;
                           $monto_porcentaje = 0;
                           $equipos = 0;
                           $cantidad_porcentaje = 0;
                           foreach ($arrEntry as $key => $value) { ?>
                         <tr>
                             <td class="tbdata"> <?php echo utf8_encode($value['descriptions'])?> </td>
                             <td class="tbdata"> <?php echo number_format($value['monto'], 2, '.', ',')?> $</td>
                             <td class="tbdata"> <?php echo number_format((($value['monto']*100)/$total_montos[0]['result']), 1, '.', ',')?> %</td>
                             <td class="tbdata"> <?php echo $value['cantidad_equipo']?> </td>
                             <td class="tbdata"> <?php echo number_format((($value['cantidad_equipo']*100)/$total_equipo[0]['total_cantidad_equipo']), 1, '.', ',')?> %</td>
                             <td class="tbdata"> <a href="view_detail_equip_lost.php?id_type=<?php echo $value['id']?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_to?>" data-toggle="ajaxModal" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> </td>
                         </tr>
                         <?php $monto += $value['monto']; ?>
                         <?php $monto_porcentaje += (($value['monto']*100)/$total_montos[0]['result']); ?>
                         <?php $equipos += $value['cantidad_equipo']; ?>
                         <?php $cantidad_porcentaje += (($value['cantidad_equipo']*100)/$total_equipo[0]['total_cantidad_equipo']); ?>
                         <?php } ?>

                         </tbody>
                         <tr>
                           <th><b>Total</b></th>
                           <th><b><?php echo number_format($monto, 2, '.', ','); ?> $</b></th>
                           <th><b><?php echo number_format($monto_porcentaje, 2, '.', ','); ?> %</b></th>
                           <th><b><?php echo $equipos; ?></b></th>
                           <th><b><?php echo number_format($cantidad_porcentaje, 2, '.', ','); ?> %</b></th>
                           <th></th>
                         </tr>
                       </table>
                  </div>
               </div>
               <span class="h4">POR GRUAS</span>
               <div class="col-sm-12">
                 <div class="col-md-12 b-b b-r">
                  <table class="table table-striped b-t b-light" data-ride="datatables">
                      <thead>
                        <tr>
                          <th>NOMBRE DE EQUIPO</th>
                          <th>COTIZACION</th>
                          <th>CLIENTE</th>
                          <th>PROYECTO</th>
                          <th>MONTO</th>
                          <th>CANTIDAD HORAS</th>
                          <th>ITBMS</th>
                          <th>TOTAL</th>
                          <th>DESCRIPCION PERDIDA</th>
                          <th>STATUS</th>
                          <th>FECHA PERDIDA</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?PHP
                      $arrIncidencias = GetRecords("select
                                                    ce.id,
                                                    cq.id as id_qu,
                                                    cc.name_craner,
                                                    cq.number_tickets,
                                                    cq.proyect_name,
                                                    ccu.legal_name,
                                                    cqp.why_lost,
                                                    cqp.sub_stat,
                                                    cqp.date_lost,
                                                    cqp.price,
                                                    cqp.quantity,
                                                    cqp.itbms,
                                                    cqp.total
                                                    from
                                                    crm_quot_producs cqp inner join crm_quot cq on cqp.id_quot = cq.id
                                                    					 inner join crm_craner cc on  cqp.id_produc = cc.id
                                                    					 inner join crm_customers ccu on ccu.id = cq.id_customer
                                                               inner join crm_entry ce on ce.id = cq.id_entry
                                                               inner join type_craner tc on cc.id_type_craner = tc.id
                                                    where
                                                    cq.id = (select max(id) from crm_quot where id_entry = ce.id)
                                                    and
                                                    cq.stat = 12
                                                    $where
                                                    $where_craner");
                        $precio = 0;
                        $cantidad = 0;
                        $itbms = 0;
                        $total = 0;
                        foreach ($arrIncidencias as $key => $value) {
                        ?>
                      <tr>
                          <td class="tbdata"> <?php echo utf8_encode($value['name_craner'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['number_tickets'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['legal_name'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['proyect_name'])?> </td>
                          <td class="tbdata"> <?php echo number_format($value['price'], 2, '.', ',');?> </td>
                          <td class="tbdata"> <?php echo number_format($value['quantity'], 2, '.', ',');?> </td>
                          <td class="tbdata"> <?php echo number_format($value['itbms'], 2, '.', ',');?> </td>
                          <td class="tbdata"> <?php echo number_format($value['total'], 2, '.', ',');?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['why_lost'])?> </td>
                          <td class="tbdata"> <?php if($value['sub_stat']==13){ echo 'Perdida por precio';}elseif($value['sub_stat']==14){ echo 'Perdida por disponibilidad'; } ?> </td>
                          <td class="tbdata"> <?php echo $value['date_lost']?> </td>
                      </tr>
                      <?php
                      $precio += $value['price'];
                      $cantidad += $value['quantity'];
                      $itbms += $value['itbms'];
                      $total += $value['total'];

                    } ?>

                      </tbody>
                      <tr>
                          <td class="tbdata">  </td>
                          <td class="tbdata"> </td>
                          <td class="tbdata"> </td>
                          <td class="tbdata"> <b>Total: </b> </td>
                          <td class="tbdata"> <b><?php echo number_format($precio, 2, '.', ',');?> $</b></td>
                          <td class="tbdata"> <b><?php echo number_format($cantidad, 2, '.', ',');?> Hrs</b></td>
                          <td class="tbdata"> <b><?php echo number_format($itbms, 2, '.', ',');?> $</b></td>
                          <td class="tbdata"> <b><?php echo number_format($total, 2, '.', ',');?> $</b></td>
                          <td class="tbdata">  </td>
                          <td class="tbdata">  </td>
                          <td class="tbdata"> </td>
                      </tr>
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
