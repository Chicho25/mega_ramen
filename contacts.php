<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $Contactlistclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitContact'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrCont = array("id_customer"=>$_POST['id_customer'],
                        "name_contact"=>$_POST['name_contact'],
                        "last_name"=>$_POST['last_name'],
                        "email"=>$_POST['email'],
                        "charge"=>$_POST['charge'],
                        "phone_1"=>$_POST['phone_1'],
                        "phone_2"=>$_POST['phone_2'],
                        "phone_3"=>$_POST['phone_3'],
                        "stat"=>$stat,
                        "extention"=>$_POST['extention']);

       UpdateRec("crm_contact", "id = ".$_POST['id'], $arrCont);

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 9,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado al Contacto: ".$_POST['name_contact']." ".$_POST['last_name'].".",
                       "id_user" => $_SESSION['MR_USER_ID'],
                       "log_time" => date("Y-m-d H:i:s")
                      );

       $nId = InsertRec("log_tracing", $arrVal);
       /*  Fin Log Seguimiento */

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Contacto Modificado</strong>
                   </div>';
     }

    $where = "where (1=1)";

     if(isset($_POST['id_customer']) && $_POST['id_customer'] != "")
     {
        $where.=" and  crm_contact.id_customer = ".$_POST['id_customer']." ";
        $id_customer = $_POST['id_customer'];
     }
     if(isset($_POST['name_contact']) && $_POST['name_contact'] != "")
     {
        $where.=" and  crm_contact.name_contact LIKE '%".$_POST['name_contact']."%'";
        $name_c = $_POST['name_contact'];
     }
     if(isset($_POST['last_name']) && $_POST['last_name'] != "")
     {
        $where.=" and crm_contact.last_name LIKE '%".$_POST['last_name']."%'";
        $lname_c = $_POST['last_name'];
     }


      $arrCont = GetRecords("SELECT crm_contact.*,
                                    crm_customers.legal_name
                             from crm_contact
                             inner join crm_customers on crm_contact.id_customer = crm_customers.id
                             $where");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de contactos</span>
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
                              <select class="chosen-select form-control" name="id_customer">
                                <option value="">Seleccionar Nombre comercial</option>
                                <?PHP
                                $arrKindMeetings = GetRecords("Select * from crm_customers where stat = 1");
                                foreach ($arrKindMeetings as $key => $value) {
                                  $kinId = $value['id'];
                                  $kinDesc = $value['legal_name'];
                                ?>
                                <option value="<?php echo $kinId?>" <?php if(isset($id_customer) && $id_customer = $kinId){ echo 'selected';} ?>><?php echo $kinDesc?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name_c)){ echo $name_c;}?>" name="name_contact" placeholder="Nombre">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($lname_c)){ echo $lname_c;}?>" name="last_name" placeholder="Apellido">
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
                              <th>NOMBRE COMERCIAL</th>
                              <th>NOMBRE</th>
                              <th>APELLIDO</th>
                              <th>EMAIL</th>
                              <th>TELEFONO</th>
                              <th>ESTATUS</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCont as $key => $value) {

                              $status = ($value['stat'] == 1) ? 'Activo' : 'Inactivo';
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['id']?> </td>
                              <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                              <td class="tbdata"> <?php echo $value['name_contact']?> </td>
                              <td class="tbdata"> <?php echo $value['last_name']?> </td>
                              <td class="tbdata"> <?php echo $value['email']?> </td>
                              <td class="tbdata"> <?php echo $value['phone_1']?> </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                                <a href="modal-contact.php?id=<?php echo $value['id']?>" title="Editar usuario" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
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
