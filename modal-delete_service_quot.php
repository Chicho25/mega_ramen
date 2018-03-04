<?php
    include("include/config.php");
    include("include/defs.php");
    $arrService = GetRecords("SELECT
                              crm_service.*,
                              crm_tpm_service.stat as sstat,
                              crm_tpm_service.id as id_tmp
                              from
                              crm_service inner join crm_tpm_service on crm_service.id = crm_tpm_service.Id_service
                              where
                              crm_service.stat = 1
                              and
                              crm_tpm_service.stat = 1
                              and
                              crm_tpm_service.id =".$_REQUEST['id_tmp']); ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Eliminar Servicio </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <p style="color:red;">Esta seguro que quiere eliminar este servicio de la lista</p>
            <b>Producto: <?php echo $arrService[0]['name_service']; ?></b>
			    </div>
			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button onclick="delet_service(<?php echo $arrService[0]['id_tmp']?>,1)" type="button" class="btn btn-danger glyphicon glyphicon-trash" data-dismiss="modal"/></button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
