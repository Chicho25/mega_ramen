<?php

    include("include/config.php");
    include("include/defs.php");

    $arrProduct = GetRecords("SELECT * from crm_service where stat = 1"); ?>

<div class="modal-dialog" style="width:80%">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar Servivios </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <table class="table table-striped b-t b-light" data-ride="datatables">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>PRECIO</th>
                  <th>FLAG</th>
                  <th>AGREGAR</th>
                </tr>
              </thead>
              <tbody>
              <?PHP
                $i=1;
                foreach ($arrProduct as $key => $value) { ?>
              <tr>
                  <td class="tbdata"> <?php echo $value['id']?> </td>
                  <td class="tbdata"> <?php echo $value['name_service']?> </td>
                  <td class="tbdata"> <?php echo $value['price']?> </td>
                  <td class="tbdata"> <?php echo $value['flag']?> </td>
                  <td>
                    <button onclick="service(<?php echo $value['id']?>,1)" type="button" class="btn btn-icon btn-sm btn-primary glyphicon glyphicon-plus"/></button>
                  </td>
              </tr>
              <?php
              }
              ?>
              </tbody>
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

<script src="js/datatables/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.buttons.min.js"></script>
<script src="js/datatables/buttons.html5.min.js"></script>
<script src="js/datatables/buttons.print.min.js"></script>
<script src="js/datatables/demo.js"></script>
<script src="js/app.plugin.js"></script>
<script src="js/main.js"></script>
