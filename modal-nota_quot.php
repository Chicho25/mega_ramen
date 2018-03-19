<?php
include("include/config.php");
include("include/defs.php");

if (isset($_GET['id_nota'])) {
  $registro_nota = GetRecords("SELECT * FROM crm_notes WHERE id =".$_GET['id_nota']);
}

 ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar Nota Para esta Cotizacion </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <textarea class="form-control" name="note_quot" rows="8" cols="80">
              <?php
                if (isset($_GET['id_nota'])) {
                    echo $registro_nota[0]['conten_note'];
                }
               ?>
            </textarea>
			    </div>
			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <?php if(!isset($_GET['id_nota'])){ ?>
        <button type="submit" class="btn btn-primary" name="note">Guardar</button>
        <?php } ?>
        <input type="hidden" name="id_entry" value="<?php echo $_GET['id']?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
