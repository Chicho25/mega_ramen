<?php
    ob_start();
    session_start();
    $userclass="class='active'";
    $userlistclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']) || $_SESSION['MR_USER_ROLE'] != 1)
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitUsuario'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrUser = array("user_name"=>$_POST['user'],
                        "real_name"=>$_POST['name'],
                        "last_name"=>$_POST['last_name'],
                        "type_user"=>$_POST['roll'],
                        "stat"=>$stat,
                        "email"=>$_POST['email']);

       UpdateRec("users", "id = ".$_POST['id'], $arrUser);

       if(isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != "")
       {
           $target_dir = "image_users/";
           $target_file = $target_dir . basename($_FILES["photo"]["name"]);
           $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
           $filename = $target_dir . $_POST['id'].".".$imageFileType;
           $filenameThumb = $target_dir . $_POST['id']."_thumb.".$imageFileType;
           if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filename))
           {
               makeThumbnailsWithGivenWidthHeight($target_dir, $imageFileType, $_POST['id'], 200, 200);

               UpdateRec("users", "id = ".$_POST['id'], array("photo" => $filenameThumb));
           }
       }

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 4,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado al usuario: ".$_POST['name']." ".$_POST['last_name'].".",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);
       /*  Fin Log Seguimiento */

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Usuario Modificado</strong>
                   </div>';
     }

     if(isset($_POST['submitpass'])){

       $arrPass = array("pass"=>encryptIt($_POST['pass']));

       UpdateRec("users", "id = ".$_POST['id'], $arrPass);

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 4,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado el password de : ".$_POST['name']." ".$_POST['last_name'].".",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);
       /*  Fin Log Seguimiento */

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> El Password fue cambiado!</strong>
                   </div>';
     }

    $where = "where (1=1)";

     if(isset($_POST['name_f']) && $_POST['name_f'] != "")
     {
        $where.=" and  users.real_name LIKE '%".$_POST['name_f']."%'";
        $name = $_POST['name_f'];
     }
     if(isset($_POST['lname_f']) && $_POST['lname_f'] != "")
     {
        $where.=" and  users.last_name LIKE '%".$_POST['lname_f']."%'";
        $lname = $_POST['lname_f'];
     }
     if(isset($_POST['user_f']) && $_POST['user_f'] != "")
     {
        $where.=" and  users.user_name LIKE '%".$_POST['user_f']."%'";
        $user = $_POST['user_f'];
     }


      $arrUser = GetRecords("SELECT users.*,
                                    type_users.description as name_type_user
                             from users
                             inner join type_users on type_users.id = users.type_user
                             $where
                             order by users.id");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Usuarios</span>
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
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name)){ echo $name;}?>" name="name_f" placeholder="Nombre">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($lname)){ echo $lname;}?>" name="lname_f" placeholder="Apellido">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($user)){ echo $user;}?>" name="user_f" placeholder="Usuario">
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
                              <th>APELLIDO</th>
                              <th>EMAIL</th>
                              <th>TIPO DE USUARIO</th>
                              <th>ESTATUS</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrUser as $key => $value) {

                              $status = ($value['stat'] == 1) ? 'Activo' : 'Inactivo';
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['id']?> </td>
                              <td class="tbdata"> <?php echo $value['real_name']?> </td>
                              <td class="tbdata"> <?php echo $value['last_name']?> </td>
                              <td class="tbdata"> <?php echo $value['email']?> </td>
                              <td class="tbdata"> <?php echo $value['name_type_user']?> </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                                <a href="modal-usuario.php?id=<?php echo $value['id']?>" title="Editar usuario" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
                                <a href="modal-pass.php?id=<?php echo $value['id']?>" title="Cambiar password" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-danger"><i class="glyphicon glyphicon-sort"></i></a>
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
