<?php
    include("include/config.php");
    include("include/defs.php");
    $Entry = GetRecords("SELECT * from crm_entry where id =".$_REQUEST['id']); ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title" style="color:red;">Descartar el ingreso </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <p>El ingreso <b><?php echo $Entry[0]['number_tickets']; ?></b> Con todas sus cotizaciones se descartara del sistema, indique el porque esta descartado</p>
            <textarea class="form-control" name="delete_system" rows="8" cols="80"></textarea>

          </div>

			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" name="delete" class="btn btn-primary">Ok</button>
        <input type="hidden" name="id_entry" value="<?php echo $Entry[0]['id'];?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
