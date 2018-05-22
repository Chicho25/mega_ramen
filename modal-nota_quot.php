<?php
include("include/config.php");
include("include/defs.php");

/*if (isset($_GET['id_nota'])) {
  $registro_nota = GetRecords("SELECT * FROM crm_notes WHERE id =".$_GET['id_nota']);
}*/

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
            <textarea class="form-control" name="note_quot" rows="8" cols="80" placeholder="Nota / Recordatorio"></textarea>
			    </div>
          <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <label class="col-lg-4 text-right control-label font-bold">Fecha de Recordatorio
            <input type="date" name="fecha_nota" placeholder="Fecha de Recordatorio"></label>
            <label class="col-lg-4 text-right control-label font-bold">Hora de Recordatorio
            <input type="time" name="hora" placeholder="Fecha de Recordatorio"></label>
          </div>
          <br>
          <br>
          <br>
          <div class="form form-horizontal col-lg-5" style="padding:10px; margin:10px;">
            <select class="chosen-select form-control" name="type_note">

              <option value="">--------Tipo de Nota-------</option>
              <option value="1">Nota</option>
              <option value="2">Llamada</option>
              <option value="3">Recordatorio</option>

            </select>
          </div>
        </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary" name="note">Guardar</button>
        <input type="hidden" name="id_entry_nota" value="<?php echo $_GET['id']?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- Bootstrap -->
