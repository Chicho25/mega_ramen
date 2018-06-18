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
	      <h4 class="modal-title">Nota de cambio cambio de equipo </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <?php $arQuots = GetRecords("SELECT * FROM crm_quot WHERE id =".$_GET['id']); ?>
            <textarea class="form-control" name="note_switch" rows="8" cols="80" placeholder="Describir la razon por la cual se esta cambiando de equipo"><?php echo $arQuots[0]['comentary_last_craner']; ?></textarea>
			    </div>
          <br>
          <div class="form form-horizontal col-lg-5" style="padding:10px; margin:10px;">
            <select class="chosen-select form-control" name="id_craner">
              <option value="">--------Seleccionar Equipo-------</option>
              <?php $arrContact = GetRecords("Select * from crm_craner where stat = 1");
              foreach ($arrContact as $key => $value) {
                $kinId = $value['id'];
                $name_contact = $value['name_craner'];?>
              <option value="<?php echo $kinId?>" <?php if ($_GET['id_grua'] == $kinId){ echo 'selected'; } ?>><?php echo $name_contact?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary" name="switch">Guardar</button>
        <input type="hidden" name="id_quot" value="<?php echo $_GET['id']?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- Bootstrap -->
