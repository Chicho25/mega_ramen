<?php

    ob_start();
    $fleetclass="class='active'";
    $registerMasterFuelclass="class='active'";

    include("include/config.php");
    include("include/defs.php");
    $loggdUType = current_user_type();

    include("header.php");

    if(!isset($_SESSION['USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitUser']))
     {

          $arrVal = array(
                        "fecha" => $date,
                        "nombre" => $nombre,
                        "stat" => 1,
                        "createdOn" => date("Y-m-d h:i:s")
                       );

          $nId = InsertRec("master_fuel", $arrVal);

          $message = '<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Registro Realizado</strong>
                </div>';
      }

      $bcName = "Register Fuel Entry";
      include("breadcrumb.php") ;
    ?>
	<div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Register Fuel Entry</h5>
                    </div>
                    <div class="ibox-content">
                	<form class="form-horizontal" id="DDD" data-validate="parsley" method="post"   enctype="multipart/form-data">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required" id="data_1">
                            <label class="col-lg-3 text-right control-label font-bold">Fecha</label>
                            <div class="col-lg-4">
                              <div class="input-group date">
                                  <input type="text" required="" autocomplete="off" class="form-control" name="date" id="date">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Hora</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">llenado Hasta</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Parcialmente llenado</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Total</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Parcialmente llenado hasta</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Precio</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Acumulado total</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-3 text-right control-label font-bold">Suplidor</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" autocomplete="off" required="" name="nombre">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button class="btn btn-primary" name="submitUser" type="submit">Gruardar</button>
                                <button class="btn btn-white" type="button" onclick="window.location='home.php'">Cancel</button>
                            </div>
                          </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>

<?php
	include("footer.php");
?>
