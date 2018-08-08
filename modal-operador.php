<?php
include("include/config.php");
include("include/defs.php"); ?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Agregar Operador </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
          <div class="form form-horizontal col-lg-5" style="padding:10px; margin:10px;">
            <select class="chosen-select form-control" name="operator">
              <option value="">-------Operador-----</option>
              <?PHP
              $arrCust = GetRecords("Select * from collaborator where stat = 1");
              foreach ($arrCust as $key => $value) {
                $kinId = $value['id'];
                $real_name = $value['firs_name'];
                $last_name = $value['last_name'];
              ?>
              <option value="<?php echo $kinId?>"><?php echo $real_name.' '.$last_name;?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form form-horizontal col-lg-5" style="padding:10px; margin:10px;">
            <select class="chosen-select form-control" name="craner_service">
              <option value="">--Grua / Servicio--</option>
              <?PHP
              $arrCust = GetRecords("Select * from crm_craner where stat = 1 and id not in(9)");
              foreach ($arrCust as $key => $value) {
                $kinId = $value['id'];
                $real_name = $value['name_craner'];
                $last_name = $value['model'];
              ?>
              <option value="<?php echo $kinId?>"><?php echo $real_name.' '.$last_name;?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form form-horizontal col-lg-5" style="padding:10px; margin:10px;">
            <input type="text" class="form-control" name="hour_operator" value="" placeholder="Horas trabajadas">
          </div>
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <textarea class="form-control" name="note_operator" rows="4" cols="80" placeholder="Nota"></textarea>
			    </div>
        </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary" name="operador_modal">Guardar</button>
        <input type="hidden" name="id_entry" value="<?php echo $_GET['id_entry']?>">
        <input type="hidden" name="id_coti" value="<?php echo $_GET['id_coti']?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- Bootstrap -->
