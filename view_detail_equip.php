<?php

    include("include/config.php");
    include("include/defs.php");

    $arrProduct = GetRecords("select
                              cc.name_craner,
                              tc.descriptions,
                              crd.price_hour,
                              crd.hour_work,
                              (crd.price_hour * crd.hour_work) as result
                              from crm_craner cc inner join type_craner tc on cc.id_type_craner = tc.id
                              				   inner join crm_report_dialy_craners crd on cc.id = crd.id_crane
                              where
                              tc.id = '".$_GET['id_type']."'
                              and
                              crd.insert_date >= '".$_GET['date_from']."'
                              and
                              crd.insert_date <= '".$_GET['date_to']." 23:59:59'"); ?>

<div class="modal-dialog" style="width:80%">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar Productos </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <table class="table table-striped b-t b-light" data-ride="datatables">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>PRECIO POR HORA</th>
                  <th>HORAS TRABAJADAS</th>
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
              <?PHP
                $i=1;
                $total = 0;
                foreach ($arrProduct as $key => $value) { ?>
              <tr>
                  <td class="tbdata"> <?php echo $value['name_craner']?> </td>
                  <td class="tbdata"> <?php echo utf8_encode($value['descriptions'])?> </td>
                  <td class="tbdata"> <?php echo number_format($value['price_hour'], 2, ',', '.')?> </td>
                  <td class="tbdata"> <?php echo $value['hour_work']?> </td>
                  <td class="tbdata"> <?php echo number_format($value['result'], 2, ',', '.')?> </td>
              </tr>
              <?php
              $total +=$value['result'];
              }
              ?>
              </tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total: </b></td>
                <td><b><?php echo number_format($total, 2, ',', '.'); ?></b></td>
              </tr>
            </table>
			    </div>
			  </div>
    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!--
<script src="js/datatables/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.buttons.min.js"></script>
<script src="js/datatables/buttons.html5.min.js"></script>
<script src="js/datatables/buttons.print.min.js"></script>
<script src="js/datatables/demo.js"></script>
<script src="js/app.plugin.js"></script>
<script src="js/main.js"></script>-->
