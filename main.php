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

     $where=" AND LEFT(crm_entry.date_form, 10) = CURDATE()";
     $whereprin = "";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where=" and crm_entry.date_form >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];

        $whereprin=" and crm_entry.date_form >= '".$_POST['date_from']."'";
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and crm_entry.date_form <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];

        $whereprin.=" and crm_entry.date_form <= '".$_POST['date_to']." 23:59:59'";
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
                 <?php if($_SESSION['MR_USER_ID'] == 1 || $_SESSION['MR_USER_ID'] == 8 || $_SESSION['MR_USER_ID'] == 13) : ?>
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
                    <div class="panel b-a">
                      <div class="row m-n">
                        <div class="col-md-3 b-b b-r">
                          <?php
                          $arrContar = GetRecords("select
                                            	  (select count(*) from crm_entry where stat = 3 $whereprin) as sin_coti,
                                                (select count(*) from crm_entry where stat = 4 $whereprin) as coti_creada,
                                                (select count(*) from crm_entry where stat = 5 $whereprin) as coti_enviada,
                                                (select count(*) from crm_entry where stat = 6 $whereprin) as coti_facturada,
                                                (select count(*) from crm_entry where stat = 8 $whereprin) as coti_aprobada,
                                                (select count(*) from crm_entry where stat = 7 $whereprin) as coti_descartada,
                                                (select count(*) from crm_entry where stat = 10 $whereprin) as aprobada_final"); ?>

                          <a href="modal-taza-actual.php?id=<?php /*echo $id; */ ?>" title="Cambiar la taza actual" data-toggle="ajaxModal" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-success hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                                <span class="clear">
                                <span class="h3 block m-t-xs text-success"><?php

                                $arrayFac = GetRecords("select
                                                        sum(crm_quot.total) as total_fact
                                                        from
                                                        crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                                        where
                                                        crm_entry.stat = 6
                                                        and
                                                        crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)
                                                        $whereprin");

                                                        echo number_format($arrayFac[0]['total_fact'], 2, ',', '.');
                                 ?> </span>
                                <small class="text-muted text-u-c">Facturación</small>
                                </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger-lt hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*
                              $arrSum = GetRecords("SELECT sum(remaining) as sum_remaining from transaction where stat in(1, 2)");

                              $sum = $arrSum[0]['sum_remaining']/$value; */ ?>

                              <span class="h3 block m-t-xs text-danger"><?php

                                                    $arrayCre = GetRecords("select
                                                      sum(crm_quot.total) as total_cre
                                                      from
                                                      crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                                      where
                                                      crm_entry.stat = 4
                                                      and
                                                      crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)
                                                      $whereprin");

                                                      echo number_format($arrayCre[0]['total_cre'], 2, ',', '.');
                               ?> </span>
                              <small class="text-muted text-u-c">Creadas</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger-lt hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*
                              $arrSum = GetRecords("SELECT sum(remaining) as sum_remaining from transaction where stat in(1, 2)");

                              $sum = $arrSum[0]['sum_remaining'];*/ ?>

                              <span class="h3 block m-t-xs text-danger"><?php

                                                    $arrayEnv = GetRecords("select
                                                      sum(crm_quot.total) as total_env
                                                      from
                                                      crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                                      where
                                                      crm_entry.stat = 5
                                                      and
                                                      crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)
                                                      $whereprin");

                                                      echo number_format($arrayEnv[0]['total_env'], 2, ',', '.');
                               ?></span>
                              <small class="text-muted text-u-c">Enviadas</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCus = GetRecords("SELECT count(*) as con_customer from customer where stat = 1");

                                    $cust = $arrCus[0]['con_customer']; */ ?>
                              <span class="h3 block m-t-xs text-primary"><?php

                                                    $arrayApr = GetRecords("select
                                                      sum(crm_quot.total) as total_apro
                                                      from
                                                      crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                                      where
                                                      crm_entry.stat = 8
                                                      and
                                                      crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)
                                                      $whereprin");

                                                      echo number_format($arrayApr[0]['total_apro'], 2, ',', '.');
                               ?></span>
                              <small class="text-muted text-u-c">Aprobadas</small>
                            </span>
                          </a>
                        </div>

                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction where stat in(1, 2)");

                                    $con = $arrCon[0]['con_trans']; */ ?>
                              <span class="h3 block m-t-xs text-warning"><?php echo $arrContar[0]['coti_facturada']; ?><span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Cantidad en Facturación</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction");

                                    $con = $arrCon[0]['con_trans'];*/ ?>
                              <span class="h3 block m-t-xs text-warning"><?php echo $arrContar[0]['coti_creada']; ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Cantidad Creadas </small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction where date_time >= '".date("Y-m-d")."' and date_time <= '".date("Y-m-d")." 23:59:59"."'");

                                    $con = $arrCon[0]['con_trans'];*/ ?>
                              <span class="h3 block m-t-xs text-warning"><?php echo $arrContar[0]['coti_enviada']; ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Cantidad Enviadas</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <span class="h3 block m-t-xs text-warning"><?php echo $arrContar[0]['coti_aprobada']; ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Cantidad Aprobadas  </small>
                            </span>
                          </a>
                        </div>

                        <div class="col-md-3 b-b">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                            <span class="clear">
                              <span class="h3 block m-t-xs text-danger"><?php
                                $arrayApr = GetRecords("select
                                  sum(crm_quot.total) as total_apro
                                  from
                                  crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                  where
                                  crm_entry.stat = 7
                                  and
                                  crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)
                                  $whereprin");

                                  echo number_format($arrayApr[0]['total_apro'], 2, ',', '.');
                               ?></span>
                              <small class="text-muted text-u-c">Monto Descartadas</small>
                            </span>
                          </a>
                        </div>

                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <span class="h3 block m-t-xs text-danger"><?php echo $arrContar[0]['coti_descartada']; ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Cantidad Descartadas </small>
                            </span>
                          </a>
                        </div>

                      </div>
                    </div>
                    <?php

                    $arrEntry = GetRecords("Select
                                            crm_entry.date_form,
                                            crm_customers.legal_name,
                                            crm_contact.name_contact,
                                            crm_contact.last_name,
                                            crm_type_media.description
                                            from
                                            crm_entry inner join crm_customers on crm_entry.id_customer = crm_customers.id
                                                      inner join crm_contact on crm_entry.id_contact = crm_contact.id
                                                      inner join crm_type_media on crm_entry.id_type_media = crm_type_media.id
                                           where (1=1)
                                           $where");

                     ?>
                     <br>
                     <div class="col-md-12 b-b b-r">
                     <span class="h4">CUADRO DE LLAMADAS POR DIA</span>
                     <table class="table table-striped b-t b-light" data-ride="datatables">
                         <thead>
                           <tr>
                             <th>FECHA CREACION</th>
                             <th>NOMBRE CLIENTE</th>
                             <th>NOMBRE CONTACTO</th>
                             <th>MEDIO</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?PHP
                           foreach ($arrEntry as $key => $value) {
                           ?>
                         <tr>
                             <td class="tbdata"> <?php echo $value['date_form']?> </td>
                             <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                             <td class="tbdata"> <?php echo $value['name_contact'].' '.$value['last_name']?> </td>
                             <td class="tbdata"> <?php echo $value['description']?> </td>
                         </tr>
                         <?php } ?>
                         </tbody>
                       </table>
                  </div>
                  </div>
                  <style type="text/css">
                    ${demo.css}
                  </style>
                  <?php

                  $arrayMon = GetRecords("select
                                          sum(crm_quot.total) as total_mon
                                          from
                                          crm_entry inner join crm_quot on crm_entry.id = crm_quot.id_entry
                                          where
                                          crm_entry.stat = 3
                                          and
                                          crm_quot.id = (select max(id) from crm_quot where id_entry = crm_entry.id)");

                  $arraySwitch = GetRecords("select (select count(*) from crm_quot where id_last_craner = 0) as sin_cambio,
                                                    (select count(*) from crm_quot where id_last_craner <> 0) as con_cambio");

                                          $sin_coti = $arrayMon[0]['total_mon'];
                                          $coti_creada = $arrayCre[0]['total_cre'];
                                          $coti_envi = $arrayEnv[0]['total_env'];
                                          $coti_fact = $arrayFac[0]['total_fact'];
                                          $coti_apro = $arrayApr[0]['total_apro'];

                                          $_100 = $sin_coti + $coti_creada + $coti_envi + $coti_fact + $coti_apro;

                                          $sincoti = 100 * $sin_coti / $_100;
                                          $coticrea = 100 * $coti_creada / $_100;
                                          $cotienvi = 100 * $coti_envi / $_100;
                                          $cotifac = 100 * $coti_fact / $_100;
                                          $cotiapro = 100 * $coti_apro / $_100;

                   ?>
                        <script type="text/javascript">
                    $(function () {
                        $('#container2').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false
                            },
                            title: {
                                text: 'Resumen Monetario'
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
                                    ['Sin Cotizacion',  <?php echo $sincoti; ?>],
                                    ['Creada',   <?php echo $coticrea; ?>],
                                    ['Enviada',    <?php echo $cotienvi; ?>],
                                    ['Facturada',    <?php echo $cotifac; ?>],
                                    ['Aprobada',   <?php echo $cotiapro; ?>]
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
                                text: 'Resumen de Cantidades'
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
                                    ['Facturación',   <?php echo $arrContar[0]['coti_facturada']; ?>],
                                    ['Creadas',       <?php echo $arrContar[0]['coti_creada']; ?>],
                                    ['Enviadas',    <?php echo $arrContar[0]['coti_enviada']; ?>],
                                    ['Aprobadas',     <?php echo $arrContar[0]['coti_aprobada']; ?>]
                                ]
                            }]
                        });
                    });
                  </script>

                        <script type="text/javascript">
                    $(function () {
                        $('#container4').highcharts({
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false
                            },
                            title: {
                                text: 'Resumen de Cambios de Equipo'
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
                                    ['Sin camnio de Equipo',   <?php echo $arraySwitch[0]['sin_cambio']; ?>],
                                    ['<a href="report_switch_crener.php" target="_blank">Cambio de Equipo</a>',   <?php echo $arraySwitch[0]['con_cambio']; ?>]
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
                           text: 'Resumen de uso de Equipo'
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
                           pointFormat: 'Cotizaciones en la que aparece: <b>{point.y:.1f} </b>'
                       },
                       series: [{
                           name: 'Population',
                           <?php $registro_gruas = GetRecords("select
                                                                id,
                                                                name_craner,
                                                                (select count(*) from crm_quot_producs where id_produc = crm_craner.id) as contar
                                                                from crm_craner "); ?>
                           data: [
                             <?php foreach ($registro_gruas as $key => $value):
                                    //if($value['id']==9){ continue; }
                                ?>
                                    ['<?php echo $value['name_craner']?>', <?php echo $value['contar']?>],
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

                  <script type="text/javascript">
                  $(function () {
                  $('#container5').highcharts({
                      title: {
                          text: 'Linea de tiempo por año',
                          x: -20 //center
                      },
                      subtitle: {
                          text: 'Mega Ramen',
                          x: -20
                      },
                      xAxis: {
                          categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                              'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                      },
                      yAxis: {
                          title: {
                              text: 'Cantidad'
                          },
                          plotLines: [{
                              value: 0,
                              width: 1,
                              color: '#808080'
                          }]
                      },
                      tooltip: {
                          valueSuffix: ''
                      },
                      legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle',
                          borderWidth: 0
                      },
                      series: [{
                          name: 'Ingresos Creados',
                          <?php $ingresos = GetRecords("select
                                                        (select count(*) from crm_entry where MONTH(date_form) = 01 ) as ene,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 02 ) as feb,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 03 ) as mar,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 04 ) as abr,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 05 ) as may,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 06 ) as jun,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 07 ) as jul,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 08 ) as ago,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 09 ) as sep,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 010 ) as oct,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 011 ) as nov,
                                                        (select count(*) from crm_entry where MONTH(date_form) = 012 ) as dic "); ?>

                          <?php foreach($ingresos as $key => $value){ ?>
                          data: [<?php echo $value['ene']; ?>, <?php echo $value['feb']; ?>, <?php echo $value['mar']; ?>,
                          <?php echo $value['abr']; ?>, <?php echo $value['may']; ?>, <?php echo $value['jun']; ?>,
                          <?php echo $value['jul']; ?>, <?php echo $value['ago']; ?>, <?php echo $value['sep']; ?>,
                          <?php echo $value['oct']; ?>, <?php echo $value['nov']; ?>, <?php echo $value['dic']; ?>]
                          <?php } ?>
                      }]
                  });
                  });
                  </script>

                  <script src="mega_grafict/js/highcharts.js"></script>
                  <script src="mega_grafict/js/modules/exporting.js"></script>
                  <div id="container2" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
                  <div id="container3" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
                  <div id="container4" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>

                  <div id="container5" style="min-width: 310px; height: 400px; margin-top:600px;"></div>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <br><br>
                  <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>

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
