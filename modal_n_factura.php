<?php
    ob_start();
    session_start();
    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

      $numero_factura = GetRecords("SELECT * FROM crm_quot WHERE id =".$_GET['id']);

       }
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar/Editar Numero de Factura</h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			      <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Numero de Factura</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="n_factura" value="<?php echo $numero_factura[0]['n_invoice'];?>"
                <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 5){  }else{ echo 'readonly'; }?>
                >
              </div>
            </div>
			      </div>
			  </div>
    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <?php if( $_SESSION['MR_USER_ROLE'] == 1 ||  $_SESSION['MR_USER_ROLE'] == 5){ ?>
	      <button type="submit" name="submitUsuario" class="btn btn-primary">Ok</button>
        <?php }else{ } ?>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
