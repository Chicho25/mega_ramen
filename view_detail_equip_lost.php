<?php

    include("include/config.php");
    include("include/defs.php");

    $arrProduct = GetRecords("select
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
                                  and
                                  tc.id = '".$_GET['id_type']."'
                                  and
                                  cqp.date_lost >= '".$_GET['date_from']."'
                                  and
                                  cqp.date_lost <= '".$_GET['date_to']." 23:59:59'");?>

<div class="modal-dialog" style="width:80%">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Detalle </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <table class="table table-striped b-t b-light" data-ride="datatables">
              <thead>
                <tr>
                  <th>GRUA</th>
                  <th>CLIENTE</th>
                  <th>RAZON DE PERDIDA</th>
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
                  <td class="tbdata"> <?php echo utf8_encode($value['legal_name'])?> </td>
                  <td class="tbdata"> <?php echo utf8_encode($value['why_lost'])?> </td>
                  <td class="tbdata"> <?php echo number_format($value['total'], 2, '.', ',')?> </td>
              </tr>
              <?php
              $total +=$value['total'];
              }
              ?>
              </tbody>
              <tr>
                <td></td>
                <td></td>
                <td><b>Total: </b></td>
                <td><b><?php echo number_format($total, 2, '.', ','); ?></b></td>
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
