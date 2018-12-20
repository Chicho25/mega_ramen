<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrUser = GetRecords("select
                            cc.id,
                            cc.name_craner,
                            cc.model,
                            cr.price_hour,
                            cr.hour_work,
                            cr.total_day,
                            cr.stat,
                            cr.descriptions_event,
                            cr.event,
                            cr.term,
                            cr.insert_date
                            from crm_craner cc left join crm_report_dialy_craners cr on cc.id = cr.id_crane
                                               left join crm_events ce on cr.event = ce.id
                            where
                            cc.id not in(34, 9)
                            and
                            cr.id = '".$_GET['id']."'");

    $name_craner = $arrUser[0]['name_craner'];
    $model = $arrUser[0]['model'];
    $price_hour = $arrUser[0]['price_hour'];
    $hour_work = $arrUser[0]['hour_work'];
    $total_day = $arrUser[0]['total_day'];
    $stat = $arrUser[0]['stat'];
    $descriptions = $arrUser[0]['descriptions_event'];
    $event = $arrUser[0]['event'];
    $term = $arrUser[0]['term'];
    $insert_date = $arrUser[0]['insert_date'];

       }
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form" action="" method="post">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title" style="color:red;">Emilinar</h4>
        <p style="color:red;">Esta seguro que desea eliminar este registro?</p>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id_report_delete" value="<?php echo $_GET['id'];?>">
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Fecha</label>
              <div class="col-lg-7">
                  <?php
                    $fecha = $insert_date;
                   ?>
                  <input type="date" readonly autocomplete="off" class="form-control" value="<?php if(isset($date_from)){ echo $date_from;}else{ echo date("Y-m-d",strtotime($fecha)); }?>" name="insert_date" required placeholder="Fecha">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Termino</label>
              <div class="col-lg-7">
                <label class="radio-inline"><input readonly type="radio" name="term" value="1" <?php if($term == 1){ echo 'checked'; } ?> required>Largo Termino</label>
                <label class="radio-inline"><input readonly type="radio" name="term" value="2" <?php if($term == 2){ echo 'checked'; } ?> required>Taxi</label>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Nombre</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly value="<?php echo $name_craner; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Modelo</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly value="<?php echo $model; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Hora $</label>
              <div class="col-lg-7">
                <input id="price_hour" readonly autocomplete="off" onkeyup="total_facturado_diario()" type="number" step="any" class="form-control" name="price_hour" value="<?php echo $price_hour;?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Horas Trabajadas</label>
              <div class="col-lg-7">
                <input id="hour_work" readonly autocomplete="off" onkeyup="total_facturado_diario()" type="number" step="any" class="form-control" name="hour_work" value="<?php echo $hour_work; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Total por Dia</label>
              <div class="col-lg-7">
                <input id="total_day" readonly type="number" step="any" readonly class="form-control" name="total_day" value="<?php echo $total_day; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Evento</label>
              <div class="col-lg-7">
                <select class="chosen-select form-control" name="event" readonly>
                  <option value="">Seleccionar</option>
                  <?PHP
                  $arrKindMeetings = GetRecords("Select * from crm_events where stat = 1");
                  foreach ($arrKindMeetings as $key => $value) {
                    $kinId = $value['id'];
                    $kinDesc = utf8_encode($value['descriptions']);
                    $event_select = $event;
                  ?>
                  <option value="<?php echo $kinId?>" <?php if ($kinId == $event_select) { echo 'selected'; } ?>><?php echo $kinDesc?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Descripcion de Evento</label>
                <div class="col-lg-7">
                  <textarea readonly name="descriptions_event" class="form-control" rows="8" cols="80"><?php echo $descriptions; ?></textarea>
                </div>
            </div>
			    </div>
			  </div>
    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	      <button type="submit" name="deleteCraner" class="btn btn-primary">Ok</button>
	    </div>
    </form>
    <script type="text/javascript">
        function total_facturado_diario(){

          var horas_trabajadas = document.querySelector("#hour_work").value;
          var precio_hora = document.querySelector("#price_hour").value;
          document.querySelector("#total_day").value = horas_trabajadas * precio_hora;

        }
    </script>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
