<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $registerCntclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitCustomer']))
     {
        $trade_name = $_POST['trade_name'];
        $legal_name = $_POST['legal_name'];
        $ruc = $_POST['ruc'];
        $dv = $_POST['dv'];
        $address_1 = $_POST['address_1'];
        $address_2 = $_POST['address_2'];
        $phone_1 = $_POST['phone_1'];
        $phone_2 = $_POST['phone_2'];
        $email = $_POST['email'];
        $type_industry = $_POST['type_industry'];
        $country = $_POST['country'];
        $province = $_POST['province'];
        $city = $_POST['city'];

        /*$ifUserExist = RecCount("crm_customers", "phone_1 = '".$phone_1."' or email = '".$email."'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>El telefono o correo electronico ya existe, Verificar!</strong>
                        </div>';
        }
        else
        {*/
            $arrCus = array(
                          "trade_name" => $trade_name,
                          "legal_name" => $legal_name,
                          "ruc" => $ruc,
                          "dv" => $dv,
                          "address_1" => $address_1,
                          "address_2" => $address_2,
                          "phone_1" => $phone_1,
                          "phone_2" => $phone_2,
                          "email" => $email,
                          "type_industry" => $type_industry,
                          "country" => $country,
                          "province" => $province,
                          "city" => $city,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s"));

          $nId = InsertRec("crm_customers", $arrCus);

          /* Log Seguimiento */
          $arrVal = array(
                          "id_module" => 6,
                          "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado al cliente: ".$legal_name." ".$trade_name.".",
                          "id_user" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("log_tracing", $arrVal);
          /*  Fin Log Seguimiento */

          if($nId > 0)
          {
            $message = '<div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Cliente Registrado</strong>
                        </div>';

              /*if(isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "")
              {
                  $target_dir = "image_users/";
                  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                  $filename = $target_dir . $nId.".".$imageFileType;
                  $filenameThumb = $target_dir . $nId."_thumb.".$imageFileType;
                  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filename))
                  {
                      makeThumbnailsWithGivenWidthHeight($target_dir, $imageFileType, $nId, 100, 100);

                      UpdateRec("customer", "id = ".$nId, array("image" => $filenameThumb));
                  }
                }*/
            /*  } */
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
                          <span class="h4">Registro de Cliente</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if(isset($message) && $message !=""){
                                    echo $message;
                                  }
                          ?>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre Comercial</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre Comercial" name="trade_name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre Legal</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre Legal" name="legal_name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">RUC</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="RUC" name="ruc">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">DV</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="DV" name="dv">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Direccion 1</label>
                            <div class="col-lg-4">
                              <textarea class="form-control" placeholder="Direccion 1" name="address_1"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Direccion 2</label>
                            <div class="col-lg-4">
                              <textarea class="form-control" placeholder="Direccion 1" name="address_2"></textarea>
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
                            <label class="col-lg-4 text-right control-label font-bold">Email</label>
                            <div class="col-lg-4">
                              <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                          </div>
                          <?php /* ?>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Fax</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Fax" name="fax">
                            </div>
                          </div>
                          <?php */ ?>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Tipo de industria</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Tipo de industria" name="type_industry">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Pais</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Pais" name="country">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Estado/Provincia</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Estado/Provincia" name="province">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Ciudad</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Ciudad" name="city">
                            </div>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitCustomer" class="btn btn-primary btn-s-xs">Registrar Cliente</button>
                        </footer>
                      </section>
                    </form>
                  </div>
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
