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
     if($_SESSION['MR_USER_ID'] != 1 && $_SESSION['MR_USER_ID'] != 8 && $_SESSION['MR_USER_ID'] != 13)
        {
             header("Location: index.php");
             exit;
        }

     $where="insert_date = CURDATE()";
     $where_cdc="cdc.insert_date = CURDATE()";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where="insert_date >= '".$_POST['date_from']."'";
        $where_cdc="cdc.insert_date >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and insert_date <= '".$_POST['date_to']." 23:59:59'";
        $where_cdc.=" and cdc.insert_date <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }

     ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">DASHBOARD</span>
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
                                              tc.descriptions,
                                              sum(cdc.total_day) as monto,
                                              ((sum(cdc.total_day) * 100 ) / (select sum(total_day) from crm_report_dialy_craners where $where)) as monto_porcentaje,
                                              count(cdc.id) as equipos,
                                              ((count(cdc.id) * 100) / (select count(*) from crm_report_dialy_craners where $where)) as cantidad_porcentaje
                                              from crm_report_dialy_craners cdc inner join crm_craner cc on cdc.id_crane = cc.id
                                              								                  inner join type_craner tc on cc.id_type_craner = tc.id
                                              where
                                              $where_cdc
                                              group by tc.descriptions");

                     ?>
                     <br>
                     <div class="col-md-12 b-b b-r">
                     <span class="h4">TIPO DE GRUAS</span>
                     <table class="table table-striped b-t b-light" data-ride="datatables">
                         <thead>
                           <tr>
                             <th>TIPO</th>
                             <th>MONTOS</th>
                             <th>PORCENTAJES</th>
                             <th>CANTIDAD DE EQUIPOS</th>
                             <th>PORCENTAJES DE EQUIPOS</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?PHP
                           foreach ($arrEntry as $key => $value) {
                           ?>
                         <tr>
                             <td class="tbdata"> <?php echo utf8_encode($value['descriptions'])?> </td>
                             <td class="tbdata"> <?php echo number_format($value['monto'], 2, '.', '')?> $</td>
                             <td class="tbdata"> <?php echo number_format($value['monto_porcentaje'], 2, '.', '')?> %</td>
                             <td class="tbdata"> <?php echo $value['equipos']?> </td>
                             <td class="tbdata"> <?php echo number_format($value['cantidad_porcentaje'], 2, '.', '')?> %</td>
                         </tr>
                         <?php } ?>
                         </tbody>
                       </table>
                       <script src="mega_grafict/js/highcharts.js"></script>
                       <script src="mega_grafict/js/modules/exporting.js"></script>
                       <script type="text/javascript">
                           $(function () {
                               $('#container2').highcharts({
                                   chart: {
                                       plotBackgroundColor: null,
                                       plotBorderWidth: null,
                                       plotShadow: false
                                   },
                                   title: {
                                       text: 'Montos'
                                   },
                                   tooltip: {
                                       pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                   },
                                   plotOptions: {
                                       pie: {
                                           allowPointSelect: true,
                                           cursor: 'pointer',
                                           dataLabels: {
                                               enabled: true,
                                               format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                               style: {
                                                   color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                               }
                                           }
                                       }
                                   },
                                   series: [{
                                       type: 'pie',
                                       name: 'Browser share',
                                       data: [
                                         <?PHP $i = 0;
                                           foreach ($arrEntry as $key => $value) { ?>
                                          <?php $description = $value['descriptions']; ?>
                                          <?php $monto_porcentaje = $value['monto_porcentaje']; ?>
                                          <?php if ($i == 3) {
                                                    continue;
                                                  } $i++; ?>
                                           ['<?php echo utf8_encode($value['descriptions'])?>',  <?php echo number_format($value['monto_porcentaje'], 2, '.', '')?>],

                                           <?php  } ?>
                                           ['<?php echo $description; ?>', <?php echo $monto_porcentaje; ?> ]

                                       ]
                                   }]
                               });
                           });
                         </script>
                         <script type="text/javascript">
                             $(function () {
                                 $('#container3').highcharts({
                                     chart: {
                                         plotBackgroundColor: null,
                                         plotBorderWidth: null,
                                         plotShadow: false
                                     },
                                     title: {
                                         text: 'Equipos'
                                     },
                                     tooltip: {
                                         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                     },
                                     plotOptions: {
                                         pie: {
                                             allowPointSelect: true,
                                             cursor: 'pointer',
                                             dataLabels: {
                                                 enabled: true,
                                                 format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                 style: {
                                                     color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                 }
                                             }
                                         }
                                     },
                                     series: [{
                                         type: 'pie',
                                         name: 'Browser share',
                                         data: [
                                           <?PHP $i = 0;
                                             foreach ($arrEntry as $key => $value) { ?>
                                            <?php $description = $value['descriptions']; ?>
                                            <?php $monto_cantidad = $value['cantidad_porcentaje']; ?>
                                            <?php if ($i == 3) {
                                                      continue;
                                                    } $i++; ?>
                                             ['<?php echo utf8_encode($value['descriptions'])?>',  <?php echo number_format($value['cantidad_porcentaje'], 2, '.', '')?>],

                                             <?php  } ?>
                                             ['<?php echo $description; ?>', <?php echo $monto_cantidad; ?> ]

                                         ]
                                     }]
                                 });
                             });
                           </script>
                           <script type="text/javascript">
                         $(function () {
                            $('#container').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Monto Generado por Equipo'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    type: 'category',
                                    labels: {
                                        rotation: -45,
                                        style: {
                                            fontSize: '13px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Numero de Cotizaciones'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                tooltip: {
                                    pointFormat: 'Monto por Equipo: <b>{point.y:.1f} </b>'
                                },
                                series: [{
                                    name: 'Population',
                                    <?php $registro_gruas = GetRecords("select
                                                                          cc.name_craner,
                                                                          tc.descriptions,
                                                                          sum(cdc.total_day) as suma
                                                                          from crm_report_dialy_craners cdc inner join crm_craner cc on cdc.id_crane = cc.id
                                                                          								  inner join type_craner tc on cc.id_type_craner = tc.id
                                                                          where
                                                                          $where_cdc
                                                                          group by
                                                                          cc.name_craner,
                                                                          tc.descriptions"); ?>
                                    data: [
                                      <?php foreach ($registro_gruas as $key => $value):
                                             //if($value['id']==9){ continue; }
                                         ?>
                                             ['<?php echo $value['name_craner'].' // '.utf8_encode($value['descriptions'])?>', <?php echo number_format($value['suma'], 2, '.', '')?>],
                                      <?php endforeach; ?>
                                             ['', 0]
                                    ],
                                    dataLabels: {
                                        enabled: true,
                                        rotation: -90,
                                        color: '#FFFFFF',
                                        align: 'right',
                                        format: '{point.y:.1f}', // one decimal
                                        y: 10, // 10 pixels down from the top
                                        style: {
                                            fontSize: '13px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    }
                                }]
                            });
                         });
                           </script>

                  </div>
                  <div id="container2" style="width: 750px; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  <div id="container3" style="width: 750px; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  <div id="container" style="width: 100%; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  </div>
                  <span class="h4">Indidencias</span>
                  <table class="table table-striped b-t b-light" data-ride="datatables">
                      <thead>
                        <tr>
                          <th>EVENTO</th>
                          <th>NOMBRE DE EQUIPO</th>
                          <th>DESCRIPCION DEL EVENTO</th>
                          <th>FECHA</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?PHP
                      $arrIncidencias = GetRecords("select
                                                    ce.descriptions,
                                                    cc.name_craner,
                                                    cdc.descriptions_event,
                                                    cdc.insert_date
                                                    from
                                                    crm_report_dialy_craners cdc inner join crm_events ce on cdc.event = ce.id
                                                    							               inner join crm_craner cc on cdc.id_crane = cc.id
                                                    where
                                                    $where_cdc
                                                    and
                                                    cdc.event not in(0)");
                        foreach ($arrIncidencias as $key => $value) {
                        ?>
                      <tr>
                          <td class="tbdata"> <?php echo utf8_encode($value['descriptions'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['name_craner'])?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['descriptions_event'])?> </td>
                          <td class="tbdata"> <?php echo $value['insert_date']?> </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
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
