<?php
    ob_start();
    session_start();
    $conditionclass="class='active'";
    $viewconditionclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitConditions'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrServ = array("description" => $_POST['description'],
                        "stat"=>$stat);

       UpdateRec("crm_condition_terms", "id = ".$_POST['id'], $arrServ);

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 24,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado el servicio][los terminos y condiciones",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);
       /*  Fin Log Seguimiento */

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Terminos y condiciones actualizado</strong>
                   </div>';
     }

    $where = "where (1=1)";

     if(isset($_POST['name_service_f']) && $_POST['name_service_f'] != "")
     {
        $where.=" and  name_service LIKE '%".$_POST['name_service_f']."%'";
        $name_cr = $_POST['name_service_f'];
     }


      $arrCran = GetRecords("SELECT * FROM crm_condition_terms
                             $where");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de terminos y condiciones</span>
                </header>
                <div class="panel-body">
                  <?php
                        if(isset($message) && $message !=""){
                            echo $message;
                          }
                  ?>
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">

                      </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>DESCRIPCION</th>
                              <th>STATUS</th>
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
                              <td class="tbdata"> <?php echo $value['description']?> </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                                <a href="modal-condition_services.php?id=<?php echo $value['id']?>" title="Editar Servicio" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
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
