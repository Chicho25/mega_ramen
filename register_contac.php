<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $registerContactclass="class='active'";

    //include("include/config.php");
    //include("include/defs.php");
    include("include/functions_tayron.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitContact']))
     {
        $id_customer = $_POST['id_customer'];
        $name_contact = $_POST['name_contact'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $charge = $_POST['charge'];
        $phone_1 = $_POST['phone_1'];
        $phone_2 = $_POST['phone_2'];
        $extention = $_POST['extention'];
        $phone_3 = $_POST['phone_3'];

        /*$ifUserExist = RecCount("crm_contact", "email = '".$email."'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>El correo electronico ya existe, intente con otro!</strong>
                        </div>';
        }
        else
        {*/
            $arrVal = array(
                          "id_customer" => $id_customer,
                          "name_contact" => $name_contact,
                          "last_name" => $last_name,
                          "email" => $email,
                          "charge" => $charge,
                          "phone_1" => $phone_1,
                          "phone_2" => $phone_2,
                          "extention" => $extention,
                          "phone_3" => $phone_3,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("crm_contact", $arrVal);

          if($nId > 0)
          {

              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Usuario Creado</strong>
                          </div>';
          }

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 8,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado al contacto: ".$name_contact." ".$last_name.".",
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

          /*}*/
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
                          <span class="h4">Registro de Contacto</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                              <label class="col-lg-4 text-right control-label font-bold">Nombre Comercial</label>
                              <div class="col-lg-4">
                                  <select class="chosen-select form-control" name="id_customer" required="required" onChange="mostrar(this.value);">
                                    <option value="">Seleccionar</option>
                                    <?PHP
                                    $arrKindMeetings = GetRecords("Select * from crm_customers where stat = 1");
                                    foreach ($arrKindMeetings as $key => $value) {
                                      $kinId = $value['id'];
                                      $kinDesc = $value['legal_name'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo $kinDesc?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre" name="name_contact" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Apellido</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Apellido" name="last_name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Email</label>
                            <div class="col-lg-4">
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Cargo</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Cargo" name="charge">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Telefono 1</label>
                            <div class="col-lg-4">
                              <input type="number" class="form-control" placeholder="Telefono 1" name="phone_1" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Telefono 2</label>
                            <div class="col-lg-4">
                              <input type="number" class="form-control" placeholder="Telefono 2" name="phone_2">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Extencion</label>
                            <div class="col-lg-4">
                              <input type="number" class="form-control" placeholder="Extencion" name="extention">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Celular</label>
                            <div class="col-lg-4">
                              <input type="number" class="form-control" placeholder="Celular" name="phone_3">
                            </div>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitContact" class="btn btn-primary btn-s-xs">Registrar</button>
                        </footer>
                      </section>
                    </form>
                  </div>
            </section>
        </section>
    </section>
    <script type="text/javascript">
    /*function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }*/
  </script>
<?php
	include("footer.php");
?>
