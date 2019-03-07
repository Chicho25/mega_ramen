<?php
    ob_start();
    session_start();
    $cataloge="class='active'";
    $editCntclass="class='active'";

    //include("include/config.php");
    //include("include/defs.php");
    include("include/functions_tayron.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitEditCus'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }
       if(isset($_POST['debt'])){ $debt = 1; }else{ $debt= 0; }

       $arrEditCus = array("trade_name"=>$_POST['trade_name'],
                          "legal_name"=>$_POST['legal_name'],
                          "ruc"=>$_POST['ruc'],
                          "dv"=>$_POST['dv'],
                          "address_1"=>$_POST['address_1'],
                          "address_2"=>$_POST['address_2'],
                          "phone_1"=>$_POST['phone_1'],
                          "phone_2"=>$_POST['phone_2'],
                          "email"=>$_POST['email'],
                          "type_industry"=>$_POST['type_industry'],
                          "country"=>$_POST['country'],
                          "province"=>$_POST['province'],
                          "city"=>$_POST['city'],
                          "stat"=>$stat,
                          "debt"=>$debt);

       UpdateRec("crm_customers", "id = ".$_POST['id'], $arrEditCus);

       /* Log Seguimiento */
       $arrVal = array(
                       "id_module" => 7,
                       "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Actualizado al Cliente: ".$_POST['trade_name']." ".$_POST['legal_name'].".",
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

    $where = "where (1=1)";

     if(isset($_POST['trade_name_f']) && $_POST['trade_name_f'] != "")
     {
        $where.=" and  customers.trade_name LIKE '%".$_POST['trade_name_f']."%'";
        $name_trade = $_POST['trade_name_f'];
     }
     if(isset($_POST['ruc_f']) && $_POST['ruc_f'] != "")
     {
        $where.=" and  customers.ruc LIKE '%".$_POST['ruc_f']."%'";
        $ruc = $_POST['ruc_f'];
     }
     if(isset($_POST['phone_f']) && $_POST['phone_f'] != "")
     {
        $where.=" and  customers.phone_1 LIKE '%".$_POST['phone_f']."%'";
        $phone = $_POST['phone_f'];
     }


      $arrCus = GetRecords("SELECT * FROm crm_customers
                             $where");?>
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
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name)){ echo $name;}?>" name="trade_name_f" placeholder="Nombre Comercial">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($lname)){ echo $lname;}?>" name="ruc_f" placeholder="RUC">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($user)){ echo $user;}?>" name="phone_f" placeholder="Telefono">
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
                              <th>NOMBRE LEGAL</th>
                              <th>RUC</th>
                              <th>TIPO DE INDUSTRIA</th>
                              <th>ESTATUS</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCus as $key => $value) {

                              $status = ($value['stat'] == 1) ? 'Activo' : 'Inactivo';
                            ?>
                          <tr <?php if($value['debt']==1){ ?>style="color: red;"
                          <?php } ?> >
                              <td class="tbdata"> <?php echo $value['id']?> </td>
                              <td class="tbdata"> <?php echo $value['trade_name']?> </td>
                              <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                              <td class="tbdata"> <?php echo $value['ruc']?> </td>
                              <td class="tbdata"> <?php echo $value['type_industry']?> </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                                <a href="modal-customer.php?id=<?php echo $value['id']?>" title="Editar Cliente" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
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
