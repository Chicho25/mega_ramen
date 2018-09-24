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
    $id_type_craner = $arrUser[0]['id_type_craner'];

       }
?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Editar Grua </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Nombre</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="name_craner" value="<?php echo $name_craner; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Marca</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="brand" value="<?php echo $brand; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Modelo</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="model" value="<?php echo $model; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Numero Serie</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="serial" value="<?php echo $serie; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Tipo de capacidad</label>
              <div class="col-lg-7">
                <select class="form-control" name="type_craner">
                  <option value="">Seleccionar</option>
                  <?php
                        $arrCraner = GetRecords("SELECT * from type_craner where stat = 1");
                        foreach ($arrCraner as $key => $value) { ?>
                          <option value="<?php echo $value['id']?>" <?php if($id_type_craner == $value['id']){ echo 'selected'; } ?> ><?php echo utf8_encode($value['descriptions']); ?></option>
                      <?php  } ?>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Capacidad Tn(Toneladas)</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="capacity" value="<?php echo $capacity; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Pluma</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="feather" value="<?php echo $feather; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Hora $</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="price_hour" value="<?php echo $price_hour; ?>">
              </div>
            </div>
			      <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Dia $</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="price_day" value="<?php echo $price_day; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Semana $</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="price_week" value="<?php echo $price_week; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Mes $</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="price_mon" value="<?php echo $price_mon; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Precio Por Año $</label>
              <div class="col-lg-7">
                <input type="number" step="any" class="form-control" name="price_year" value="<?php echo $price_year; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Imagen</label>
              <div class="col-lg-7">
                <img src="<?php echo $photo; ?>" alt="">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Cambiar Imagen</label>
                <div class="col-lg-7">
                  <input type="file" name="photo">
                </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Fecha de creacion</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly name="creation_date" value="<?php echo $create_date; ?>">
              </div>
            </div>
              <div class="form-group">
                <label class="col-sm-3 text-right control-label">Estado</label>
                <div class="col-sm-7">
                  <label class="switch">
                    <input type="checkbox" <?php if($stat==1){ echo 'checked';} ?> value="1" name="stat">
                    <span></span>
                  </label>
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
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
