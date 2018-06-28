<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $Grualistclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitCraner'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrCran = array("name_craner" => $_POST['name_craner'],
                        "brand" => $_POST['brand'],
                        "model" => $_POST['model'],
                        "capacity" => $_POST['capacity'],
                        "feather" => $_POST['feather'],
                        "price_hour" => $_POST['price_hour'],
                        "price_day" => $_POST['price_day'],
                        "price_week" => $_POST['price_week'],
                        "price_mon" => $_POST['price_mon'],
                        "price_year" => $_POST['price_year'],
                        "stat"=>$stat);

       UpdateRec("crm_craner", "id = ".$_POST['id'], $arrCran);

       if(isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "")
       {
           $target_dir = "image_craner/";
           $target_file = $target_dir . basename($_FILES["photo"]["name"]);
           $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
           $filename = $target_dir . $_POST['id'].".".$imageFileType;
           $filenameThumb = $target_dir . $_POST['id']."_thumb.".$imageFileType;
           if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filename))
           {
               makeThumbnailsWithGivenWidthHeight($target_dir, $imageFileType, $_POST['id'], 200, 200);

               UpdateRec("crm_craner", "id = ".$_POST['id'], array("photo" => $filenameThumb));
           }
       }

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 11,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado La grua: ".$_POST['name_craner'].".",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);
       /*  Fin Log Seguimiento */

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Grua Modificada</strong>
                   </div>';
     }

    $where = "where (1=1)";

     if(isset($_POST['name_craner']) && $_POST['name_craner'] != "")
     {
        $where.=" and  name_craner LIKE '%".$_POST['name_craner']."%'";
        $name_cr = $_POST['name_craner'];
     }
     if(isset($_POST['model']) && $_POST['model'] != "")
     {
        $where.=" and model LIKE '%".$_POST['model']."%'";
        $lname_cr = $_POST['model'];
     }


      $arrCran = GetRecords("SELECT * FROM crm_craner
                             $where");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Gruas</span>
                </header>
                <div class="panel-body">
                  <?php
                        if(isset($message) && $message !=""){
                            echo $message;
                          }
                  ?>
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name_cr)){ echo $name_cr;}?>" name="name_craner" placeholder="Nombre">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($lname_cr)){ echo $lname_cr;}?>" name="model" placeholder="Modelo">
                          </div>
                        </div>
                        <div class="col-sm-3 m-b-xs">
                          <div class="input-group">
                            <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>NOMBRE</th>
                              <th>MODELO</th>
                              <th>MARCA</th>
                              <th>CAPACIDAD</th>
                              <th>PRECIO POR HORA</th>
                              <th>ESTATUS</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCran as $key => $value) {

                              $status = ($value['stat'] == 1) ? 'Activo' : 'Inactivo';
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['id']?> </td>
                              <td class="tbdata"> <?php echo $value['name_craner']?> </td>
                              <td class="tbdata"> <?php echo $value['brand']?> </td>
                              <td class="tbdata"> <?php echo $value['model']?> </td>
                              <td class="tbdata"> <?php echo $value['capacity']?> Tn</td>
                              <td class="tbdata"> <?php echo $value['price_hour']?> $ </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td><?php if ($value['id'] == 9) {

                              }else{ ?>
                                <a href="modal-craner.php?id=<?php echo $value['id']?>" title="Editar Grua" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
                              <?php } ?>
                              </td>
                          </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                        </table>
                    </div>
                </div>
              </section>
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
