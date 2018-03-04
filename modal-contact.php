<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrUser = GetRecords("SELECT * from crm_contact where id = '".$_GET['id']."'");

    $id_customer = $arrUser[0]['id_customer'];
    $name_contact = $arrUser[0]['name_contact'];
    $last_name = $arrUser[0]['last_name'];
    $email = $arrUser[0]['email'];
    $charge = $arrUser[0]['charge'];
    $phone_1 = $arrUser[0]['phone_1'];
    $phone_2 = $arrUser[0]['phone_2'];
    $extention = $arrUser[0]['extention'];
    $phone_3 = $arrUser[0]['phone_3'];
    $stat = $arrUser[0]['stat'];
    $log_time = $arrUser[0]['log_time']; } ?>

<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Editar usuario </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Nombre Comercial</label>
              <div class="col-lg-7">
                <select class="chosen-select form-control" name="id_customer" required="required" onChange="mostrar(this.value);">
                  <option value="">Seleccionar</option>
                  <?PHP
                  $arrKindMeetings = GetRecords("Select * from crm_customers where stat = 1");
                  foreach ($arrKindMeetings as $key => $value) {
                    $kinId = $value['id'];
                    $kinDesc = $value['legal_name'];
                  ?>
                  <option value="<?php echo $kinId?>" <?php if($id_customer == $kinId){ echo 'selected';} ?>><?php echo $kinDesc?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Nombre</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="name_contact" value="<?php echo $name_contact; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Apellido</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Email</label>
              <div class="col-lg-7">
              <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Cargo</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="charge" value="<?php echo $charge; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Telefono 1</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="phone_1" value="<?php echo $phone_1; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Telefono 2</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="phone_2" value="<?php echo $phone_2; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Extencion</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="extention" value="<?php echo $extention; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Celular</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="phone_3" value="<?php echo $phone_3; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 text-right control-label">Fecha de creacion</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly name="log_time" value="<?php echo $log_time; ?>">
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
	      <button type="submit" name="submitContact" class="btn btn-primary">Ok</button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
