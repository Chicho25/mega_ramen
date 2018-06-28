<?php
    ob_start();
    session_start();
    $conditionclass="class='active'";
    $regconditionclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']) || $_SESSION['MR_USER_ROLE'] != 1)
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitService']))
     {
        $name_service = $_POST['name_service'];
        $price = $_POST['price'];
        $flag = $_POST['flag'];

        $ifUserExist = RecCount("crm_service", "name_service like '%".$name_service."%'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Este servicio ya fue registrado!</strong>
                        </div>';
        }
        else
        {
            $arrVal = array(
                          "name_service" => $name_service,
                          "price" => $price,
                          "flag" => $flag,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("crm_service", $arrVal);

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 10,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado el Servicio : ".$name_service.".",
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Servicio Registrado</strong>
                          </div>';

          }
     }
?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">

              <div class="row">
                <div class="col-sm-12">
                	<form class="form-horizontal" data-validate="parsley" method="post" enctype="multipart/form-data">
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <span class="h4">Registro de Servicio</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre" name="name_service" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio" name="price" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Flag $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Flag" name="flag" required>
                            </div>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitService" class="btn btn-primary btn-s-xs">Registrar</button>
                        </footer>
                      </section>
                    </form>
                  </div>
                </div>
            </section>
        </section>
    </section>
<?php
	include("footer.php");
?>
