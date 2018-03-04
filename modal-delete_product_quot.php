<?php
    include("include/config.php");
    include("include/defs.php");
    $arrProduct = GetRecords("(select
                                crm_craner.name_craner as name_product,
                                crm_craner.price_hour,
                                crm_craner.price_day,
                                crm_craner.price_week,
                                crm_craner.price_mon,
                                crm_craner.price_year,
                                0 as price,
                                crm_tmp_product.id as id_tmp,
                                crm_tmp_product.log_time,
                                crm_tmp_product.type_product
                                from
                                crm_craner inner join crm_tmp_product on crm_tmp_product.id_product = crm_craner.id
                                where
                                crm_tmp_product.stat = 1
                                and
                                crm_tmp_product.type_product = 0
                                and
                                crm_tmp_product.id = '".$_REQUEST['id_tmp']."')
                                union
                                (select
                                crm_service.name_service as name_product,
                                0 as price_hour,
                                0 as price_day,
                                0 as price_week,
                                0 as price_mon,
                                0 as price_year,
                                crm_service.price,
                                crm_tmp_product.id as id_tmp,
                                crm_tmp_product.log_time,
                                crm_tmp_product.type_product
                                from
                                crm_service inner join crm_tmp_product on crm_tmp_product.id_product = crm_service.id
                                where
                                crm_tmp_product.stat = 1
                                and
                                crm_tmp_product.type_product = 1
                                and
                                crm_tmp_product.id = '".$_REQUEST['id_tmp']."')
                                order by 8 asc"); ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Eliminar Producto </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <p style="color:red;">Esta seguro que quiere eliminar este producto de la lista</p>
            <b>Producto: <?php echo $arrProduct[0]['name_product']; ?></b>
			    </div>
			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button onclick="delet(<?php echo $arrProduct[0]['id_tmp']?>,1)" type="button" class="btn btn-danger glyphicon glyphicon-trash" data-dismiss="modal"/></button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
