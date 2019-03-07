<?php
    ob_start();
    session_start();
    $collaclass="class='active'";
    $registercollaclass="class='active'";

    include("include/functions_tayron.php");
    //include("include/config.php");
    //include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitUser']))
     {
        $FIRSTNAME = $_POST['name'];
        $LASTNAME = $_POST['lastname'];

        $ifUserExist = RecCount("collaborator", "firs_name = '".$FIRSTNAME."' and last_name = '".$LASTNAME."'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>El colaborador ya existe!</strong>
                        </div>';
        }
        else
        {
            $arrVal = array(
                          "firs_name" => $FIRSTNAME,
                          "last_name" => $LASTNAME,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("collaborator", $arrVal);

          $message = '<div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Registrado!</strong>
                        </div>';

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 25,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado al usuario: ".$FIRSTNAME." ".$LASTNAME.".",
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

          }
     }
?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="row">
                <div class="col-sm-12">
                	<form class="form-horizontal" data-validate="parsley" method="post"   enctype="multipart/form-data">
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <span class="h4">Registro de Colaborador</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre" name="name" data-required="true">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Apellido</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Apellido" name="lastname" data-required="true">
                            </div>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitUser" class="btn btn-primary btn-s-xs">Registrar</button>
                        </footer>
                      </section>
                    </form>
                  </div>
            </section>
        </section>
  </section>
<?php
	include("footer.php");
?>
