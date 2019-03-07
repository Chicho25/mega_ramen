<?php
    ob_start();
    session_start();
    $userclass="class='active'";
    $userlistclass="class='active'";

    include("include/functions_tayron.php");
    //include("include/config.php");
    //include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']) || $_SESSION['MR_USER_ROLE'] != 1)
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitUsuario'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrVal = array(
                     "firs_name" => $_POST['name'],
                     "last_name" => $_POST['last_name'],
                     "stat" => $stat                    );

       UpdateRec("collaborator", "id = ".$_POST['id'], $arrVal);

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 25,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado al usuario: ".$_POST['name']." ".$_POST['last_name'].".",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);

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


      $arrUser = GetRecords("SELECT *
                             from collaborator
                             $where");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Colaboradores</span>
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
                              <td class="tbdata"> <?php echo $value['firs_name']?> </td>
                              <td class="tbdata"> <?php echo $value['last_name']?> </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                                <a href="modal-collaborator.php?id=<?php echo $value['id']?>" title="Editar colaborador" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
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
<?php
	include("footer.php");
?>
