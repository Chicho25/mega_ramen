<?php
    include("include/config.php");
    include("include/defs.php");
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal"  method="post" action="">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Descartar Cotizacion </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <p style="color:red;">Esta seguro que quiere descartar esta cotizacion</p>
			    </div>
			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"/></button>
        <input type="hidden" name="id_quot_discard" value="<?php echo $_GET['id']; ?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
