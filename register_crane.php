<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $registerCranerclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']) || $_SESSION['MR_USER_ROLE'] != 1)
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitUser']))
     {
        $name_craner = $_POST['name_craner'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $capacity =$_POST['capacity'];
        $feather = $_POST['feather'];
        $price_hour = $_POST['price_hour'];
        $price_day = $_POST['price_day'];
        $price_week = $_POST['price_week'];
        $price_mon = $_POST['price_mon'];
        $price_year = $_POST['price_year'];

        $ifUserExist = RecCount("crm_craner", "name_craner = '".$name_craner."'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Esta grua ya fue registrada!</strong>
                        </div>';
        }
        else
        {
            $arrVal = array(
                          "name_craner" => $name_craner,
                          "brand" => $brand,
                          "model" => $model,
                          "capacity" => $capacity,
                          "feather" => $feather,
                          "price_hour" => $price_hour,
                          "price_day" => $price_day,
                          "price_week" => $price_week,
                          "price_mon" => $price_mon,
                          "price_year" => $price_year,
                          "stat" => 1,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("crm_craner", $arrVal);

          if($nId > 0)
          {

              if(isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "")
              {
                  $target_dir = "image_craner/";
                  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                  $filename = $target_dir . $nId.".".$imageFileType;
                  $filenameThumb = $target_dir . $nId."_thumb.".$imageFileType;
                  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filename))
                  {
                      makeThumbnailsWithGivenWidthHeight($target_dir, $imageFileType, $nId, 200, 200);

                      UpdateRec("crm_craner", "id = ".$nId, array("photo" => $filenameThumb));
                  }
              }

              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Grua Registrada</strong>
                          </div>';
              }

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 10,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado La grua : ".$name_craner.".",
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
                	<form class="form-horizontal" data-validate="parsley" method="post" enctype="multipart/form-data">
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <span class="h4">Registro de Grua</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre" name="name_craner" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Marca</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Marca" name="brand" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Modelo</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Modelo" name="model" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Capacidad Tn(Toneladas)</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Capacidad" name="capacity" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Pluma</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Pluma" name="feather" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio Por Hora $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio Por Hora" name="price_hour" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio Por Dia $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio Por Dia" name="price_day" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio Por Semana $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio Por Semana" name="price_week" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio Por Mes $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio por Mes" name="price_mon" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Precio Por Año $</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Precio Por Año" name="price_year" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 text-right control-label font-bold">Imagen</label>
                            <div class="col-lg-4">
                                <div style="width:204px;
                                            height:154px;
                                            background-color: #cccccc;
                                            border: solid 2px gray;
                                            margin: 5px;">
                                    <img id="img" src="#" style='width:200px; height:150px;display: none;' alt="your image" />
                                </div>
                                <label class="btn yellow btn-default">
                                  Cargar Foto <input type="file" name="photo" style="display: none;" onchange="readURL(this);">
                                </label>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitUser" class="btn btn-primary btn-s-xs">Registrar</button>
                        </footer>
                      </section>
                    </form>
                  </div>
                </div>
            </section>
        </section>
    </section>
    <script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
<?php
	include("footer.php");
?>
