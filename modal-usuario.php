<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrUser = GetRecords("SELECT * from users where id = '".$_GET['id']."'");
    $user = $arrUser[0]['user_name'];
    $name = $arrUser[0]['real_name'];
    $last_name = $arrUser[0]['last_name'];
    $id_roll_user = $arrUser[0]['type_user'];
    $image = $arrUser[0]['photo'];
    $stat = $arrUser[0]['stat'];
    $create_date = $arrUser[0]['log_time'];
    $email = $arrUser[0]['email'];

       }
?>

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
			      <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Usuario</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="user" value="<?php echo $user; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Nombre</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Apellido</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Imagen</label>
              <div class="col-lg-7">
                <img src="<?php echo $image; ?>" alt="">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Cambiar Imagen</label>
                <div class="col-lg-7">
                  <input type="file" name="photo">
                </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Rol</label>
              <div class="col-lg-7">
                <select class="chosen-select form-control" name="roll" required="required">
                  <option value="">Seleccionar</option>
                  <?PHP
                      $arrKindMeetings = GetRecords("Select * from type_users where stat = 1");
                      foreach ($arrKindMeetings as $key => $value) {
                        $kinId = $value['id'];
                        $kinDesc = $value['description'];
                      ?>
                      <option value="<?php echo $kinId?>" <?php if(isset($id_roll_user) && $id_roll_user==$kinId){ echo "selected";} ?>><?php echo $kinDesc?></option>
                      <?php
                      }
                      ?>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-lg-3 text-right control-label">Email</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
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
	      <button type="submit" name="submitUsuario" class="btn btn-primary">Ok</button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
