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
     } ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Principal</span>
               </header>
               <div class="panel-body">
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
                                            	  (select count(*) from crm_entry where stat = 3) as sin_coti,
                                                (select count(*) from crm_entry where stat = 4) as coti_creada,
                                                (select count(*) from crm_entry where stat = 5) as coti_enviada,
                                                (select count(*) from crm_entry where stat = 6) as coti_facturada,
                                                (select count(*) from crm_entry where stat = 8) as coti_aprobada,
                                                (select count(*) from crm_entry where stat = 10) as aprobada_final"); ?>

                          <a href="modal-taza-actual.php?id=<?php /*echo $id; */ ?>" title="Cambiar la taza actual" data-toggle="ajaxModal" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-success hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                                <span class="clear">
                                <span class="h3 block m-t-xs text-success">1000<?php /*echo number_format($value, 2, ',', '.'); */ ?> </span>
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

                              <span class="h3 block m-t-xs text-danger">1000<?php /* echo number_format($sum, 2, ',', '.'); */ ?> </span>
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

                              <span class="h3 block m-t-xs text-danger">1000<?php /*echo number_format($sum, 2, ',', '.');*/ ?> </span>
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
                              <span class="h3 block m-t-xs text-primary">1000<?php /*echo $cust;*/ ?></span>
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
                      </div>
                    </div>
                  </div>
                  <style type="text/css">
                    ${demo.css}
                  </style>
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
                                    ['Firefox',   45.0],
                                    ['IE',       26.8],
                                    {
                                        name: 'Chrome',
                                        y: 12.8,
                                        sliced: true,
                                        selected: true
                                    },
                                    ['Safari',    8.5],
                                    ['Opera',     6.2],
                                    ['Others',   0.7]
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
                                    ['Firefox',   45.0],
                                    ['IE',       26.8],
                                    {
                                        name: 'Chrome',
                                        y: 12.8,
                                        sliced: true,
                                        selected: true
                                    },
                                    ['Safari',    8.5],
                                    ['Opera',     6.2],
                                    ['Others',   0.7]
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
                               text: 'Population (millions)'
                           }
                       },
                       legend: {
                           enabled: false
                       },
                       tooltip: {
                           pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
                       },
                       series: [{
                           name: 'Population',
                           data: [
                               ['Shanghai', 23.7],
                               ['Lagos', 16.1],
                               ['Instanbul', 14.2],
                               ['Karachi', 14.0],
                               ['Mumbai', 12.5],
                               ['Moscow', 12.1],
                               ['São Paulo', 11.8],
                               ['Beijing', 11.7],
                               ['Guangzhou', 11.1],
                               ['Delhi', 11.1],
                               ['Shenzhen', 10.5],
                               ['Seoul', 10.4],
                               ['Jakarta', 10.0],
                               ['Kinshasa', 9.3],
                               ['Tianjin', 9.3],
                               ['Tokyo', 9.0],
                               ['Cairo', 8.9],
                               ['Dhaka', 8.9],
                               ['Mexico City', 8.9],
                               ['Lima', 8.9]
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
                          text: 'Source: WorldClimate.com',
                          x: -20
                      },
                      xAxis: {
                          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                              'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                      },
                      yAxis: {
                          title: {
                              text: 'Temperature (°C)'
                          },
                          plotLines: [{
                              value: 0,
                              width: 1,
                              color: '#808080'
                          }]
                      },
                      tooltip: {
                          valueSuffix: '°C'
                      },
                      legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle',
                          borderWidth: 0
                      },
                      series: [{
                          name: 'Tokyo',
                          data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                      }, {
                          name: 'New York',
                          data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                      }, {
                          name: 'Berlin',
                          data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                      }, {
                          name: 'London',
                          data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                      }]
                  });
                  });
                  </script>

                  <script src="mega_grafict/js/highcharts.js"></script>
                  <script src="mega_grafict/js/modules/exporting.js"></script>
                  <div id="container2" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
                  <div id="container3" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
                  <div id="container4" style="min-width: 500px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
                  <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
                  <div id="container5" style="min-width: 310px; height: 400px; margin-top:600px;"></div>


                </div>
               </div>
             </section>
           </section>
       </section>
   </section>

<?php include("footer.php"); ?>
