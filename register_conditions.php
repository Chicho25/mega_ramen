<?php
    ob_start();
    session_start();
    $conditionclass="class='active'";
    $regconditionclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitService']))
     {
        $descriptions = $_POST['description'];

        $ifUserExist = RecCount("crm_condition_terms", "description like '%".$descriptions."%'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Esta Condiciones ya fue registrada!</strong>
                        </div>';
        }
        else
        {
            $arrVal = array(
                          "description" => $descriptions,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("crm_condition_terms", $arrVal);

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 23,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado terminos y condiciones".$nId,
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Condiciones Registrada</strong>
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
                          <span class="h4">Registro de Condiciones</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Descripcion</label>
                            <div class="col-lg-4">
                              <textarea class="form-control" placeholder="Descripcion" name="description" required></textarea>
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
