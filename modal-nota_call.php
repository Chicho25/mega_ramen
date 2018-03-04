<?php ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar Nota de llamada </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <textarea class="form-control" name="note_call_quot" rows="8" cols="80"></textarea>
			    </div>
			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary" name="note_call">Guardar</button>
        <input type="hidden" name="id_entry" value="<?php echo $_GET['id']?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
