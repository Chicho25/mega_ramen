<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrUser = GetRecords("SELECT * from crm_condition_terms where id = '".$_GET['id']."'");

    $name_service = $arrUser[0]['description'];
    $stat = $arrUser[0]['stat'];

       }
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Editar Condiciones y terminos </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Descripcion</label>
              <div class="col-lg-7">
                <textarea class="form-control" name="description"><?php echo $name_service; ?></textarea>
              </div>
            </div>
            </div>
              <div class="form-group">
                <label class="col-sm-3 text-right control-label">Estado</label>
                <div class="col-sm-7">
                  <label class="switch">
                    <input type="checkbox" <?php if($stat==1){ echo 'checked';} ?> value="1" name="stat">
                    <span></span>
                  </label>
                </div>
              </div>
			      </div>
			  </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	      <button type="submit" name="submitConditions" class="btn btn-primary">Ok</button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
