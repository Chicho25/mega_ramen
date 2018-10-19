<?php
ob_start();
session_start();
$Reportdclass="class='active'";
$regRebycrdclass="class='active'";
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

     if($_SESSION['MR_USER_ID'] != 1 && $_SESSION['MR_USER_ID'] != 8 && $_SESSION['MR_USER_ID'] != 13 && $_SESSION['MR_USER_ID'] != 15)
        {
             header("Location: index.php");
             exit;
        }

        $where="";

     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where .=" and crd.insert_date >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where .=" and crd.insert_date <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }

     if (isset($_POST['id_craner'])) {
       if ($_POST['id_craner'] == 0) {
           $where .= "";
       }else{
           $where .= " and cc.id = '".$_POST['id_craner']."'";
         }
      }
     ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Reporte Por Grua</span>
               </header>

               <div class="panel-body">
                 <?php if($_SESSION['MR_USER_ROLE'] == 1) : ?>
                 <div class="row">
                   <form method="post" action="" novalidate>
                     <div class="row wrapper">
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                         Desde
                           <input type="text" autocomplete="off" require class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                         </div>
                       </div>
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                         Hasta
                           <input type="text" autocomplete="off" require class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                         </div>
                       </div>
                       <div class="col-sm-4 m-b-xs">
                         <div class="input-group">
                         Gruas
                            <select class="chosen-select form-control" name="id_craner" require>
                                    <option value="">--------Equipo-------</option>
                                    <option value="0">TODOS LOS EQUIPOS</option>
                                    <?PHP
                                    $arrStat = GetRecords("select * from crm_craner where stat = 1 and id not in(34,9,24,29,33,25,27,26,28,42)");
                                    foreach ($arrStat as $key => $value) {
                                    $kinId = $value['id'];
                                    $kinDesc = $value['name_craner'];
                                    ?>
                                    <option value="<?php echo $kinId?>" <?php if(isset($_POST['id_craner']) && $_POST['id_craner'] == $kinId){ echo 'selected';} ?>><?php echo utf8_encode($kinDesc)?></option>
                                    <?php
                                }
                                    ?>
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
                  <span class="h4">Reporte Por Grua</span>
                  <?php
                  $total = 0;
                  $arrProduct = GetRecords("select
                                            crd.id,
                                            cc.name_craner,
                                            tc.descriptions,
                                            crd.price_hour,
                                            crd.hour_work,
                                            crd.insert_date,
                                            crd.term,
                                            (crd.price_hour * crd.hour_work) as result
                                            from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                               inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                            where
                                            (crd.price_hour * crd.hour_work) not in(0)
                                            $where");

                                            foreach ($arrProduct as $key => $value) {
                                              $total +=$value['result'];
                                            }

                    $arrCero = GetRecords("select
                                              crd.id,
                                              cc.name_craner,
                                              tc.descriptions,
                                              crd.price_hour,
                                              crd.hour_work,
                                              crd.insert_date,
                                              (crd.price_hour * crd.hour_work) as result
                                              from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                                 inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                              where
                                              (crd.price_hour * crd.hour_work) in(0)
                                              $where");

                        /* Count */

                $arrCountActive = GetRecords("select count(*) as activas
                                              from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                                 inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                              where
                                              (crd.price_hour * crd.hour_work) not in(0)
                                              $where");

                $arrCountCiro = GetRecords("select
                                                count(*) as cero
                                                from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                                                                   inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                                                where
                                                (crd.price_hour * crd.hour_work) in(0)
                                                $where");

                   ?>
                  <script src="mega_grafict/js/highcharts.js"></script>
                  <script src="mega_grafict/js/modules/exporting.js"></script>
                  <script type="text/javascript">
                      $(function () {
                          $('#container3').highcharts({
                              chart: {
                                  plotBackgroundColor: null,
                                  plotBorderWidth: null,
                                  plotShadow: false
                              },
                              title: {
                                  text: 'TRABAJANDO / DETENIDAS'
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
                                      ['TRABAJANDO', <?php echo $arrCountActive[0]['activas']; ?>],
                                      ['DETENIDAS', <?php echo $arrCountCiro[0]['cero']; ?>]
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
                                      foreach ($arrProduct as $key => $value) { ?>
                                      ['<?php echo utf8_encode($value['name_craner'])?>', <?php echo (($value['result'] * 100) / $total)?>],
                                      <?php  } ?>
                                      ['','']

                                  ]
                              }]
                          });
                      });
                    </script>
                  <div id="container2" style="width: 750px; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>
                  <div id="container3" style="width: 750px; height: 400px; max-width: 100%; margin: 0 auto; float:left;"></div>

                  <table class="table b-t b-light" data-ride="datatables">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NOMBRE EQUIPO </th>
                          <th>TERMINO </th>
                          <th>PRECIO POR HORA</th>
                          <th>HORAS TRABAJADAS</th>
                          <th>TOTAL</th>
                          <th>FECHA</th>
                        </tr>
                      </thead>
                      <?php if(isset($_POST['id_craner'])){ ?>

                      <tbody>
                      <?PHP

                        $total = 0;
                        foreach ($arrProduct as $key => $value) {
                        ?>
                      <tr>
                          <td class="tbdata"> <?php echo $value['id']?> </td>
                          <td class="tbdata"> <?php echo utf8_encode($value['name_craner'])?> </td>
                          <td class="tbdata"> <?php if($value['term'] == 1){ echo 'Largo Termino';}elseif($value['term']==2){ echo 'Taxi';}else{ echo 'No definido';}?> </td>
                          <td class="tbdata"> <?php echo number_format($value['price_hour'], 2, '.', ',')?> </td>
                          <td class="tbdata"> <?php echo $value['hour_work']?> </td>
                          <td class="tbdata"> <?php echo number_format($value['result'], 2, '.', ',')?> $</td>
                          <td class="tbdata"> <?php echo $value['insert_date']?> </td>
                      </tr>
                      <?php
                    $total +=$value['result'];
                    } ?>
                    <?PHP

                      foreach ($arrCero as $key => $value) {
                      ?>
                    <tr style="background-color:#7C7C7C; color:white;">
                        <td class="tbdata"> <?php echo $value['id']?> </td>
                        <td class="tbdata"> <?php echo utf8_encode($value['name_craner'])?> </td>
                        <td class="tbdata"> <?php if($value['term'] == 1){ echo 'Largo Termino';}elseif($value['term']==2){ echo 'Taxi';}else{ echo 'No definido';}?> </td>
                        <td class="tbdata"> <?php echo number_format($value['price_hour'], 2, '.', ',')?> </td>
                        <td class="tbdata"> <?php echo $value['hour_work']?> </td>
                        <td class="tbdata"> <?php echo number_format($value['result'], 2, '.', ',')?> $</td>
                        <td class="tbdata"> <?php echo $value['insert_date']?> </td>
                    </tr>
                    <?php
                        }
                    ?>
                      </tbody>
                          <td class="tbdata">  </td>
                          <td class="tbdata">  </td>
                          <td class="tbdata"> </td>
                          <td class="tbdata"> </td>
                          <td class="tbdata"><b>Total: </b> </td>
                          <td class="tbdata"><b> <?php echo number_format($total, 2, '.', ',')?> $</b> </td>
                          <td class="tbdata"> </td>
                    <?php } ?>
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
