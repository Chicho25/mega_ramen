<?php
    include("include/config.php");
    include("include/defs.php");
    $Entry = GetRecords("SELECT * from crm_entry where id =".$_REQUEST['id']); ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title" style="color:red;">Ingreso Perdido </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal" style="padding:10px; margin:10px;">
            <p>El ingreso <b><?php echo $Entry[0]['number_tickets']; ?></b> Con todas sus cotizaciones se descartara del sistema, seleccione el motivo e indique el porque esta perdido</p>

            <div class="form-group required">
              <label class="col-lg-3 text-right control-label font-bold">Motivo</label>
              <div class="col-lg-9">
                <select class="form-control" name="id_lost" id="customer">
                  <option value="">Seleccionar</option>
                  <?PHP
                  $arrKindMeetings = GetRecords("Select * from master_stat where stat = 1 and id_stat in(13,14)");
                  foreach ($arrKindMeetings as $key => $value) {
                    $kinId = $value['id'];
                    $description = $value['description'];
                  ?>
                  <option value="<?php echo $kinId?>"><?php echo $description?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label font-bold">Descripcion</label>
              <div class="col-lg-9">
                <textarea class="form-control" name="lost_system" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>

			  </div>
      </div>
	    <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" name="lost" class="btn btn-primary">Ok</button>
        <input type="hidden" name="id_entry" value="<?php echo $Entry[0]['id'];?>">
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
