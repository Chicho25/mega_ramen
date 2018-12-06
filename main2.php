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
     if($_SESSION['MR_USER_ID'] != 1 && $_SESSION['MR_USER_ID'] != 8 && $_SESSION['MR_USER_ID'] != 13 && $_SESSION['MR_USER_ID'] != 17)
        {
             header("Location: index.php");
             exit;
        }

     $where="insert_date = CURDATE()";
     $where_cdc=" and crd.insert_date = CURDATE()";
     $where_cdc_sub = " and crdd.insert_date = CURDATE()";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where="insert_date >= '".$_POST['date_from']."'";
        $where_cdc=" and crd.insert_date >= '".$_POST['date_from']."'";
        $where_cdc_sub = " and crdd.insert_date >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and insert_date <= '".$_POST['date_to']." 23:59:59'";
        $where_cdc.=" and crd.insert_date <= '".$_POST['date_to']." 23:59:59'";
        $where_cdc_sub .= " and crdd.insert_date <= '".$_POST['date_to']." 23:59:59'";
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
                                              tc.id,
                                              tc.descriptions,
                                              sum((crd.price_hour * crd.hour_work)) as monto,
                                              count(tc.descriptions) as cantidad_equipo,
                                              (select
                                                count(crdd.id_crane) as cantidad_equipo
                                                from crm_craner ccc inner join type_craner tcc on ccc.id_type_craner = tcc.id
                                              					  inner join crm_report_dialy_craners crdd on ccc.id = crdd.id_crane
                                                where (1=1)
                                                $where_cdc_sub
                                                and
                                                (crdd.price_hour * crdd.hour_work) in(0)
                                                and
                                                ccc.id_type_craner = cc.id_type_craner
                                                group by
                                                tcc.id) as no_trabajado
                                              from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                              				           inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                              where (1=1)
                                              $where_cdc
                                               and
                                              (crd.price_hour * crd.hour_work) not in(0)
                                              group by
                                              tc.descriptions,
                                              tc.id");


                    $total_montos = GetRecords("select
                                                sum((crd.price_hour * crd.hour_work)) as result
                                                from
                                                  crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                				        inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                                                where (1=1)
                                                                $where_cdc");

                    $total_equipo = GetRecords("select
                                                count(tc.descriptions) as total_cantidad_equipo
                                                from
                                                  crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                				        inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                                                where (1=1)
                                                                and
                                                                (crd.price_hour * crd.hour_work) not in(0)
                                                                $where_cdc");

                    $arrLongTaxi = GetRecords("select (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 0) as no_fefinido,
                                                      (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 1) as largo_termino,
                                                      (select count(*) from crm_report_dialy_craners crd where (1=1) $where_cdc and term = 2) as taxi");

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
                             <th>CANTIDAD DE EQUIPOS USADOS</th>
                             <th>CANTIDAD DE EQUIPOS NO USADOS</th>
                             <th>PORCENTAJES DE EQUIPOS</th>
                             <th>DETALLES</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?PHP
                           $monto = 0;
                           $monto_porcentaje = 0;
                           $equipos = 0;
                           $equipos_no_usados = 0;
                           $cantidad_porcentaje = 0;
                           foreach ($arrEntry as $key => $value) {
                           ?>
                         <tr>
                             <td class="tbdata"> <?php echo utf8_encode($value['descriptions'])?> </td>
                             <td class="tbdata"> <?php echo number_format($value['monto'], 2, '.', ',')?> $</td>
                             <td class="tbdata"> <?php echo number_format((($value['monto']*100)/$total_montos[0]['result']), 1, '.', ',')?> %</td>
                             <td class="tbdata"> <?php echo $value['cantidad_equipo']?> </td>
                             <td class="tbdata"> <?php echo $value['no_trabajado']?> </td>
                             <td class="tbdata"> <?php echo number_format((($value['cantidad_equipo']*100)/$total_equipo[0]['total_cantidad_equipo']), 1, '.', ',')?> %</td>
                             <td class="tbdata"> <a href="view_detail_equip.php?id_type=<?php echo $value['id']?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_to?>" data-toggle="ajaxModal" title="Equipos" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> </td>
                         </tr>
                         <?php $monto += $value['monto']; ?>
                         <?php $monto_porcentaje += (($value['monto']*100)/$total_montos[0]['result']); ?>
                         <?php $equipos += $value['cantidad_equipo']; ?>
                         <?php $cantidad_porcentaje += (($value['cantidad_equipo']*100)/$total_equipo[0]['total_cantidad_equipo']); ?>
                         <?php $equipos_no_usados += $value['no_trabajado']; ?>
                         <?php } ?>

                         </tbody>
                         <tr>
                           <th><b>Total</b></th>
                           <th><b><?php echo number_format($monto, 2, '.', ','); ?> $</b></th>
                           <th><b><?php echo number_format($monto_porcentaje, 2, '.', ','); ?> %</b></th>
                           <th><b><?php echo $equipos; ?></b></th>
                           <th><b><?php echo $equipos_no_usados; ?></b></th>
                           <th><b><?php echo number_format($cantidad_porcentaje, 2, '.', ','); ?> %</b></th>
                         </tr>
                       </table>
                       <script src="mega_grafict/js/highcharts.js"></script>
                       <script src="mega_grafict/js/modules/exporting.js"></script>
                       <script type="text/javascript">
                           $(function () {
                               $('#longTaxi').highcharts({
                                   chart: {
                                       plotBackgroundColor: null,
                                       plotBorderWidth: null,
                                       plotShadow: false
                                   },
                                   title: {
                                       text: 'Largo Termino & Taxi'
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
                                           foreach ($arrLongTaxi as $key => $value) { ?>
                                           ['<?php echo utf8_encode('No definido')?>', <?php echo $value['no_fefinido']?>],
                                           ['<?php echo utf8_encode('Largo Termino')?>', <?php echo $value['largo_termino']?>],
                                           ['<?php echo utf8_encode('Taxi')?>', <?php echo $value['taxi']?>]
                                           <?php  } ?>

                                       ]
                                   }]
                               });
                           });
                         </script>
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
                                           ['<?php echo utf8_encode($value['descriptions'])?>', <?php echo number_format((($value['monto']*100)/$total_montos[0]['result']), 2, '.', ',')?>],
                                           <?php  } ?>
                                           ['','']

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
                                             ['<?php echo utf8_encode($value['descriptions'])?>',  <?php echo number_format((($value['cantidad_equipo']*100)/$total_equipo[0]['total_cantidad_equipo']), 2, '.', ',')?>],
                                           <?php } ?>
                                             ['','']
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
                                                                          sum(crd.total_day) as suma
                                                                          from crm_report_dialy_craners crd inner join crm_craner cc on crd.id_crane = cc.id
                                                                          								  inner join type_craner tc on cc.id_type_craner = tc.id
                                                                          where (1=1)
                                                                          $where_cdc
                                                                          group by
                                                                          cc.name_craner,
                                                                          tc.descriptions"); ?>
                                    data: [
                                      <?php foreach ($registro_gruas as $key => $value): ?>
                                      <?php if($value['suma'] ==0){ continue; } ?>
                                      ['<?php echo $value['name_craner'].' // '.utf8_encode($value['descriptions']);?>', <?php echo $value['suma']; ?>],
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
                  <div id="longTaxi" style="width: 750px; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  <div id="container" style="width: 100%; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  </div>
                  <span class="h4">Incidencias</span>
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
                                                    crd.descriptions_event,
                                                    crd.insert_date
                                                    from
                                                    crm_report_dialy_craners crd inner join crm_events ce on crd.event = ce.id
                                                    							               inner join crm_craner cc on crd.id_crane = cc.id
                                                    where (1=1)
                                                    $where_cdc
                                                    and
                                                    crd.event not in(0)");
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
