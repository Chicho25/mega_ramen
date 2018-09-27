<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrUser = GetRecords("SELECT * from crm_craner where id = '".$_GET['id']."'");

    $name_craner = $arrUser[0]['name_craner'];
    $brand = $arrUser[0]['brand'];
    $model = $arrUser[0]['model'];
    $capacity = $arrUser[0]['capacity'];
    $feather = $arrUser[0]['feather'];
    $price_hour = $arrUser[0]['price_hour'];
    $price_day = $arrUser[0]['price_day'];
    $price_week = $arrUser[0]['price_week'];
    $price_mon = $arrUser[0]['price_mon'];
    $price_year = $arrUser[0]['price_year'];
    $photo = $arrUser[0]['photo'];
    $stat = $arrUser[0]['stat'];
    $create_date = $arrUser[0]['log_time'];
    $serie = $arrUser[0]['serial'];

       }
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Actividad Diaria</h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id_crane" value="<?php echo $_GET['id'];?>">
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Fecha</label>
              <div class="col-lg-7">
                  <?php
                    $fecha = date("Y-m-d");
                   ?>
                  <input type="date" autocomplete="off" class="form-control" value="<?php if(isset($date_from)){ echo $date_from;}else{ echo date("Y-m-d",strtotime($fecha."- 1 days")); }?>" name="insert_date" required placeholder="Fecha">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Nombre</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly value="<?php echo $name_craner; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Marca</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly value="<?php echo $brand; ?>">
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
                <input id="price_hour" autocomplete="off" onkeyup="total_facturado_diario()" type="number" step="any" class="form-control" name="price_hour" value="">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Horas Trabajadas</label>
              <div class="col-lg-7">
                <input id="hour_work" autocomplete="off" onkeyup="total_facturado_diario()" type="number" step="any" class="form-control" name="hour_work" value="">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Total por Dia</label>
              <div class="col-lg-7">
                <input id="total_day" type="number" step="any" readonly class="form-control" name="total_day" value="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Evento</label>
              <div class="col-lg-7">
                <select class="chosen-select form-control" name="event">
                  <option value="">Seleccionar</option>
                  <?PHP
                  $arrKindMeetings = GetRecords("Select * from crm_events where stat = 1");
                  foreach ($arrKindMeetings as $key => $value) {
                    $kinId = $value['id'];
                    $kinDesc = utf8_encode($value['descriptions']);
                  ?>
                  <option value="<?php echo $kinId?>"><?php echo $kinDesc?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Descripcion de Evento</label>
                <div class="col-lg-7">
                  <textarea name="descriptions_event" class="form-control" rows="8" cols="80"></textarea>
                </div>
            </div>
			    </div>
			  </div>
    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
	      <button type="submit" name="submitCraner" class="btn btn-primary">Ok</button>
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
