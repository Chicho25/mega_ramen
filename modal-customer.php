<?php

    include("include/config.php");
    include("include/defs.php");

    if(isset($_GET['id'])){

    $arrCus = GetRecords("SELECT * from crm_customers where id = '".$_GET['id']."'");

    $trade_name = $arrCus[0]['trade_name'];
    $legal_name = $arrCus[0]['legal_name'];
    $ruc = $arrCus[0]['ruc'];
    $dv = $arrCus[0]['dv'];
    $address_1 = $arrCus[0]['address_1'];
    $address_2 = $arrCus[0]['address_2'];
    $phone_1 = $arrCus[0]['phone_1'];
    $phone_2 = $arrCus[0]['phone_2'];
    $email = $arrCus[0]['email'];
    $fax = $arrCus[0]['fax'];
    $type_industry = $arrCus[0]['type_industry'];
    $country = $arrCus[0]['country'];
    $province = $arrCus[0]['province'];
    $city = $arrCus[0]['city'];
    $stat = $arrCus[0]['stat'];
    $log_time = $arrCus[0]['log_time'];
  } ?>
<div class="modal-dialog">
  <div class="modal-content">
  	<form role="form" class="form-horizontal" id="role-form"  method="post" action="" enctype="multipart/form-data">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Editar Cliente </h4>
	    </div>
	    <div class="modal-body">
	      <div class="row">
		      <div class="form form-horizontal">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Nombre Comercial</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="trade_name" value="<?php echo $trade_name; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Nombre Legal</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="legal_name" value="<?php echo $legal_name; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">RUC</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="ruc" value="<?php echo $ruc; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">DV</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="dv" value="<?php echo $dv; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Direccion 1</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="address_1" value="<?php echo $address_1; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Direccion 2</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" readonly name="address_2" value="<?php echo $address_2; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Telefono 1</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="phone_1" value="<?php echo $phone_1; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Telefono 2</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="phone_2" value="<?php echo $phone_2; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Email</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Fax</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="fax" value="<?php echo $fax; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Tipo de industria</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="type_industry" value="<?php echo $type_industry; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Pais</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="country" value="<?php echo $country; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Estado/Provincia</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="province" value="<?php echo $province; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Ciudad</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="city" value="<?php echo $city; ?>">
              </div>
            </div>
            <div class="form-group ">
              <label class="col-lg-3 text-right control-label">Fehca de Registro</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="name_edit" readonly value="<?php echo $log_time; ?>">
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
	      <button type="submit" name="submitEditCus" class="btn btn-primary">Ok</button>
	    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
